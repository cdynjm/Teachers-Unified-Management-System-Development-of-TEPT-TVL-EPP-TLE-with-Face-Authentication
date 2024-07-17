<?php

namespace App\Repositories\Logic;

use Hash;
use Session;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;

//CIPHER:
use App\Http\Controllers\AESCipher;

//INTERFACE:
use App\Repositories\Interfaces\SchoolInterface;

//MODELS:
use App\Models\User;
use App\Models\Information\ElementarySubjects;
use App\Models\Information\HighSchoolSubjects;
use App\Models\Information\SeniorHighSchoolSubjects;
use App\Models\Information\TLETVESubjects;
use App\Models\Information\Strands;
use App\Models\Information\HighSchools;
use App\Models\Information\ElementarySchools;
use App\Models\Information\Teachers;
use App\Models\Data\ElementarySubjectsData;
use App\Models\Data\HighSchoolSubjectsData;
use App\Models\Data\SeniorHighSchoolSubjectsData;
use App\Models\SchoolYear;

class SchoolLogic implements SchoolInterface {

    protected $aes;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function __construct(AESCipher $aes) {
        $this->aes = $aes;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSchoolYear() {
        return SchoolYear::get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getLatestSchoolYear() {
        return SchoolYear::orderBy('fromYear', 'DESC')->first();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchool($year) {
        return ElementarySubjectsData::where('schoolID', Auth::user()->ElementarySchools->id)
                ->where('year', $year)
                ->orderBy('yearLevel', 'ASC')
                ->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateElementarySubjectMPS($request) {
        $id = $this->aes->decrypt($request->id);
        ElementarySubjectsData::where('id', $id)->update([
            'first' => $request->first,
            'second' => $request->second,
            'third' => $request->third,
            'fourth' => $request->fourth
        ]);

        $qtr = ElementarySubjectsData::where('id', $id)->first();
        $nonEmptyCount = 0;

        if (!empty($qtr->first))
            $nonEmptyCount++;
        if (!empty($qtr->second))
            $nonEmptyCount++;
        if (!empty($qtr->third))
            $nonEmptyCount++;
        if (!empty($qtr->fourth))
            $nonEmptyCount++;

        if($nonEmptyCount == 0) {
            ElementarySubjectsData::where('id', $id)->update(['mps' => null]);
        }
        else {
            $mps = ($qtr->first + $qtr->second + $qtr->third + $qtr->fourth) / $nonEmptyCount;
            ElementarySubjectsData::where('id', $id)->update(['mps' => $mps]);
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchHighSchool($year) {
        return HighSchoolSubjectsData::where('schoolID', Auth::user()->HighSchools->id)
                ->where('year', $year)
                ->orderBy('yearLevel', 'ASC')
                ->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateHighSchoolSubjectMPS($request) {
        $id = $this->aes->decrypt($request->id);
        HighSchoolSubjectsData::where('id', $id)->update([
            'first' => $request->first,
            'second' => $request->second,
            'third' => $request->third,
            'fourth' => $request->fourth
        ]);

        $qtr = HighSchoolSubjectsData::where('id', $id)->first();
        $nonEmptyCount = 0;

        if (!empty($qtr->first))
            $nonEmptyCount++;
        if (!empty($qtr->second))
            $nonEmptyCount++;
        if (!empty($qtr->third))
            $nonEmptyCount++;
        if (!empty($qtr->fourth))
            $nonEmptyCount++;

        if($nonEmptyCount == 0) {
            HighSchoolSubjectsData::where('id', $id)->update(['mps' => null]);
        }
        else {
            $mps = ($qtr->first + $qtr->second + $qtr->third + $qtr->fourth) / $nonEmptyCount;
            HighSchoolSubjectsData::where('id', $id)->update(['mps' => $mps]);
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchSeniorHighSchool($year) {
        return SeniorHighSchoolSubjectsData::where('schoolID', Auth::user()->HighSchools->id)
                ->where('year', $year)
                ->orderBy('yearLevel', 'ASC')
                ->get();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSeniorHighSchoolSubjectMPS($request) {
        $id = $this->aes->decrypt($request->id);
        if($request->semester == 1) {
            SeniorHighSchoolSubjectsData::where('id', $id)->update([
                'first' => $request->first,
                'second' => $request->second
            ]);
        }
        if($request->semester == 2) {
            SeniorHighSchoolSubjectsData::where('id', $id)->update([
                'third' => $request->third,
                'fourth' => $request->fourth
            ]);
        }

        $qtr = SeniorHighSchoolSubjectsData::where('id', $id)->first();
        $nonEmptyCount = 0;

        if (!empty($qtr->first))
            $nonEmptyCount++;
        if (!empty($qtr->second))
            $nonEmptyCount++;
        if (!empty($qtr->third))
            $nonEmptyCount++;
        if (!empty($qtr->fourth))
            $nonEmptyCount++;

        if($nonEmptyCount == 0) {
            SeniorHighSchoolSubjectsData::where('id', $id)->update(['mps' => null]);
        }
        else {
            $mps = ($qtr->first + $qtr->second + $qtr->third + $qtr->fourth) / $nonEmptyCount;
            SeniorHighSchoolSubjectsData::where('id', $id)->update(['mps' => $mps]);
        }
        
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateElemTotalStudents($request) {
        $id = $this->aes->decrypt($request->schoolID);
        ElementarySubjectsData::where('schoolID', $id)
            ->where('yearLevel', $request->yearLevel)
            ->where('year', $request->year)
            ->update(['students' => $request->students]);
        
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateHSTotalStudents($request) {
        $id = $this->aes->decrypt($request->schoolID);
        HighSchoolSubjectsData::where('schoolID', $id)
            ->where('yearLevel', $request->yearLevel)
            ->where('year', $request->year)
            ->update(['students' => $request->students]);
        
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSHSTotalStudents($request) {
        $id = $this->aes->decrypt($request->schoolID);
        SeniorHighSchoolSubjectsData::where('schoolID', $id)
            ->where('yearLevel', $request->yearLevel)
            ->where('year', $request->year)
            ->update(['students' => $request->students]);
        
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getTeachers() {
        
        if(Auth::user()->schoolType == 1)
            return Teachers::where('elemSchoolID', Auth::user()->ElementarySchools->id)->get();
        if(Auth::user()->schoolType == 2 || Auth::user()->schoolType == 3)
            return Teachers::where('highSchoolID', Auth::user()->HighSchools->id)->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createTeacher($request) {
        $position = $this->aes->decrypt($request->position);

        if(Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'email')
            ]
        ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

        $filename = \Str::slug(\Str::random(50).'-'.Carbon::now()).'.'.$request->photo->extension(); 
        $transferfile = $request->file('photo')->storeAs('public/profile/', $filename);

        $teacher = Teachers::create([
            'schoolType' => Auth::user()->schoolType,
            'position' => $position,
            'teacher' => $request->teacher,
            'picture' => $filename
        ]);

        if(Auth::user()->schoolType == 1)
            Teachers::where('id', $teacher->id)->update(['elemSchoolID' => Auth::user()->ElementarySchools->id]);
        if(Auth::user()->schoolType == 2 || Auth::user()->schoolType == 3)
            Teachers::where('id', $teacher->id)->update(['highSchoolID' => Auth::user()->HighSchools->id]);

        User::create([
            'teacherID' => $teacher->id,
            'schoolType' => Auth::user()->schoolType,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 3
        ]);

        return Response::HTTP_OK;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTeacher($request) {
        $id = $this->aes->decrypt($request->id);
        $position = $this->aes->decrypt($request->position);

        if(Validator::make($request->all(), [
            'email' =>
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'email')
            
        ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

        if(!empty($request->photo)) {

            $teacher = Teachers::where('id', $id)->first();
            File::delete(public_path("storage/profile/{$teacher->picture}"));

            $filename = \Str::slug(\Str::random(50).'-'.Carbon::now()).'.'.$request->photo->extension(); 
            $transferfile = $request->file('photo')->storeAs('public/profile/', $filename);

            Teachers::where('id', $id)->update(['picture' => $filename]);
        }

        Teachers::where('id', $id)->update([
            'position' => $position,
            'teacher' => $request->teacher,
        ]);

        User::where('teacherID', $id)->update([
            'email' => $request->email,
        ]);

        if(!empty($request->password)) {
            User::where('teacherID', $id)->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return Response::HTTP_OK;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteTeacher($request) {
        $id = $this->aes->decrypt($request->id);
        $teacher = Teachers::where('id', $id)->first();
        File::delete(public_path("storage/profile/{$teacher->picture}"));
        Teachers::where('id', $id)->delete();
        User::where('teacherID', $id)->delete();
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSchoolAccount($request) {
        
        if(Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ]
        ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

        if(Auth::user()->schoolType == 1)
                ElementarySchools::where('id', Auth::user()->ElementarySchools->id)->update(['school' => $request->school]);
        if(Auth::user()->schoolType == 2 || Auth::user()->schoolType == 3)
                HighSchools::where('id', Auth::user()->HighSchools->id)->update(['school' => $request->school]);

        User::where('id', Auth::user()->id)->update([
            'email' => $request->email
        ]);

        if(!empty($request->password)) {
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password)]);
        }

        return Response::HTTP_OK;
    }
}
