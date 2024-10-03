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
use App\Repositories\Interfaces\AdminInterface;

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
use App\Models\Information\RequestDocuments;
use App\Models\Data\ElementarySubjectsData;
use App\Models\Data\HighSchoolSubjectsData;
use App\Models\Data\SeniorHighSchoolSubjectsData;
use App\Models\Data\Attachments;
use App\Models\Data\ProMeds;
use App\Models\SchoolYear;

class AdminLogic implements AdminInterface {

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
    public function getElementarySubjects() {
        return ElementarySubjects::get();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createElementarySubject($request) {
        ElementarySubjects::create(['subject' => $request->subject]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateElementarySubject($request) {
        $id = $this->aes->decrypt($request->id);
        ElementarySubjects::where('id', $id)->update(['subject' => $request->subject]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteElementarySubject($request) {
        $id = $this->aes->decrypt($request->id);
        ElementarySubjects::where('id', $id)->delete();
    }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getHighSchoolSubjects() {
        return HighSchoolSubjects::get();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createHighSchoolSubject($request) {
        HighSchoolSubjects::create(['subject' => $request->subject]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateHighSchoolSubject($request) {
        $id = $this->aes->decrypt($request->id);
        HighSchoolSubjects::where('id', $id)->update(['subject' => $request->subject]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteHighSchoolSubject($request) {
        $id = $this->aes->decrypt($request->id);
        HighSchoolSubjects::where('id', $id)->delete();
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getTLETVESubjects() {
        return TLETVESubjects::get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createTLETVESubject($request) {
        TLETVESubjects::create(['subject' => $request->subject]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTLETVESubject($request) {
        $id = $this->aes->decrypt($request->id);
        TLETVESubjects::where('id', $id)->update(['subject' => $request->subject]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteTLETVESubject($request) {
        $id = $this->aes->decrypt($request->id);
        TLETVESubjects::where('id', $id)->delete();
    }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSeniorHighSchoolSubjects() {
        return SeniorHighSchoolSubjects::orderBy('semester', 'ASC')->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSeniorHighSchoolSubject($request) {
        SeniorHighSchoolSubjects::create([
            'subject' => $request->subject,
            'yearLevel' => $request->yearLevel,
            'semester' => $request->semester
        ]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSeniorHighSchoolSubject($request) {
        $id = $this->aes->decrypt($request->id);
        SeniorHighSchoolSubjects::where('id', $id)->update([
            'subject' => $request->subject,
            'yearLevel' => $request->yearLevel,
            'semester' => $request->semester
        ]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteSeniorHighSchoolSubject($request) {
        $id = $this->aes->decrypt($request->id);
        SeniorHighSchoolSubjects::where('id', $id)->delete();
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getStrands() {
        return Strands::orderBy('semester', 'ASC')->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createStrandSubject($request) {
        
        if($request->yearOffered == 1) {
            Strands::create([
                'subject' => $request->subject,
                'yearLevel' => $request->yearSemester,
                'semester' => $request->semester
            ]);
        }
        if ($request->yearOffered == 2){
            Strands::create([
                'subject' => $request->subject,
                'yearLevel' => $request->year
            ]);
        }
        if ($request->yearOffered == 3){
            Strands::create(['subject' => $request->subject]);
        }

    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateStrandSubject($request) {

        $id = $this->aes->decrypt($request->id);

        if($request->yearOffered == 1) {
            Strands::where('id', $id)->update([
                'subject' => $request->subject,
                'yearLevel' => $request->yearSemester,
                'semester' => $request->semester
            ]);
        }
        if ($request->yearOffered == 2){
            Strands::where('id', $id)->update([
                'subject' => $request->subject,
                'yearLevel' => $request->year,
                'semester' => null,
            ]);
        }
        if ($request->yearOffered == 3){
            Strands::where('id', $id)->update([
                'subject' => $request->subject,
                'yearLevel' => null,
                'semester' => null
            ]);
        }
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteStrandSubject($request) {
        $id = $this->aes->decrypt($request->id);
        Strands::where('id', $id)->delete();
    }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElementarySchools() {
        return ElementarySchools::get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getHighSchools() {
        return HighSchools::get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSchool($request) {

        $schoolYear = $this->getLatestSchoolYear();

        if($request->schoolLevel == 1) {

            if(Validator::make($request->all(), [
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')
                ]
            ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

            $school = ElementarySchools::create([
                'school' => $request->school,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            User::create([
                'elemschoolID' => $school->id,
                'schoolType' => 1,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2
            ]);

            for($loop = 1; $loop <= 6; $loop++) {
                foreach(ElementarySubjects::get() as $elemSubjects) {
                    ElementarySubjectsData::create([
                        'schoolID' => $school->id,
                        'yearLevel' => $loop,
                        'subjectID' => $elemSubjects->id,
                        'year' => $schoolYear->fromYear."-".$schoolYear->toYear
                    ]);
                }
            }
            return Response::HTTP_OK;
        }
        
       if($request->schoolLevel == 2) {

            if(Validator::make($request->all(), [
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')
                ]
            ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

            $school = HighSchools::create([
                'school' => $request->school,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            User::create([
                'highSchoolID' => $school->id,
                'schoolType' => 2,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2
            ]);

            for($loop = 7; $loop <= 10; $loop++) {
                
                foreach(HighSchoolSubjects::get() as $hsSubjects) {
                    HighSchoolSubjectsData::create([
                        'schoolID' => $school->id,
                        'yearLevel' => $loop,
                        'subjectID' => $hsSubjects->id,
                        'year' => $schoolYear->fromYear."-".$schoolYear->toYear
                    ]);
                }

                foreach($request->tvl_tve as $key => $value) {
                    HighSchoolSubjectsData::create([
                        'schoolID' => $school->id,
                        'yearLevel' => $loop,
                        'subjectID' => $this->aes->decrypt($value),
                        'tve_tle' => true,
                        'year' => $schoolYear->fromYear."-".$schoolYear->toYear
                    ]);
                }
            }

            if($request->shsAvailable == 1) {
                for($loop = 11; $loop <= 12; $loop++) {

                    foreach(SeniorHighSchoolSubjects::get() as $shsSubjects) {
                        SeniorHighSchoolSubjectsData::create([
                            'schoolID' => $school->id,
                            'yearLevel' => $loop,
                            'subjectID' => $shsSubjects->id,
                            'year' => $schoolYear->fromYear."-".$schoolYear->toYear
                        ]);
                    }

                    foreach($request->strands as $key => $value) {
                        SeniorHighSchoolSubjectsData::create([
                            'schoolID' => $school->id,
                            'yearLevel' => $loop,
                            'subjectID' => $this->aes->decrypt($value),
                            'strand' => true,
                            'year' => $schoolYear->fromYear."-".$schoolYear->toYear
                        ]);
                    }
                }
            }
            return Response::HTTP_OK;
        }

        if($request->schoolLevel == 3) {

            if(Validator::make($request->all(), [
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')
                ]
            ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

            $school = HighSchools::create([
                'school' => $request->school,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            User::create([
                'highSchoolID' => $school->id,
                'schoolType' => 3,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2
            ]);

            for($loop = 11; $loop <= 12; $loop++) {

                foreach(SeniorHighSchoolSubjects::get() as $shsSubjects) {
                    SeniorHighSchoolSubjectsData::create([
                        'schoolID' => $school->id,
                        'yearLevel' => $loop,
                        'subjectID' => $shsSubjects->id,
                        'year' => $schoolYear->fromYear."-".$schoolYear->toYear
                    ]);
                }

                foreach($request->shs_strands as $key => $value) {
                    SeniorHighSchoolSubjectsData::create([
                        'schoolID' => $school->id,
                        'yearLevel' => $loop,
                        'subjectID' => $this->aes->decrypt($value),
                        'strand' => true,
                        'year' => $schoolYear->fromYear."-".$schoolYear->toYear
                    ]);
                }
            }
            
            return Response::HTTP_OK;
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function editSchool($request) {
        $school = $this->aes->decrypt($request->school);
        $id = $this->aes->decrypt($request->id);

        if($school == 1)
            return ElementarySchools::where('id', $id)->first();
        if($school == 2)
            return HighSchools::where('id', $id)->first();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSchoolDataForUpdate($request) {
        $school = $this->aes->decrypt($request->school);
        $id = $this->aes->decrypt($request->id);
        $year = $this->getLatestSchoolYear();

        if($school == 1) {
            return ElementarySubjectsData::where('schoolID', $id)
                        ->where('year', $year->fromYear.'-'.$year->toYear)
                        ->get();
        }
        if($school == 2) {
            return HighSchoolSubjectsData::where('schoolID', $id)
                        ->where('tve_tle', 1)
                        ->where('year', $year->fromYear.'-'.$year->toYear)
                        ->distinct('subjectID')
                        ->get();
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSeniorHighSchoolDataForUpdate($request) {
        $school = $this->aes->decrypt($request->school);
        $id = $this->aes->decrypt($request->id);
        $year = $this->getLatestSchoolYear();

        return SeniorHighSchoolSubjectsData::where('schoolID', $id)
                    ->where('strand', 1)
                    ->where('year', $year->fromYear."-".$year->toYear)
                    ->distinct('subjectID')
                    ->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSchool($request) {
        $id = $this->aes->decrypt($request->id);
        $schoolLevel = $this->aes->decrypt($request->schoolLevel);
        $year = $this->getLatestSchoolYear();

        if($schoolLevel == 1) {

            if(Validator::make($request->all(), [
                'email' => 'required|string|max:255|',
                Rule::unique('users', 'email')
            ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

            $school = ElementarySchools::where('id', $id)->update([
                'school' => $request->school,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            User::where('elemschoolID', $id)->update([
                'email' => $request->email
            ]);

            if(!empty($request->password)) {
                User::where('elemschoolID', $id)->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return Response::HTTP_OK;

        }
        if($schoolLevel == 2) {
            
            if(Validator::make($request->all(), [
                'email' => 'required|string|max:255|',
                Rule::unique('users', 'email')
            ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

            $school = HighSchools::where('id', $id)->update([
                'school' => $request->school,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);

            User::where('highSchoolID', $id)->update([
                'email' => $request->email
            ]);

            if(!empty($request->password)) {
                User::where('elemschoolID', $id)->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            if(!empty($request->tvl_tve)) {
                for($loop = 7; $loop <= 10; $loop++) {

                    foreach($request->tvl_tve as $key => $value) {

                        HighSchoolSubjectsData::create([
                            'schoolID' => $id,
                            'yearLevel' => $loop,
                            'subjectID' => $this->aes->decrypt($value),
                            'tve_tle' => true,
                            'year' => $year->fromYear."-".$year->toYear
                        ]);
                        
                    }
                }
            }
            
            if(!empty($request->strands)) {
                for($loop = 11; $loop <= 12; $loop++) {

                    foreach($request->strands as $key => $value) {

                        SeniorHighSchoolSubjectsData::create([
                            'schoolID' => $id,
                            'yearLevel' => $loop,
                            'subjectID' => $this->aes->decrypt($value),
                            'strand' => true,
                            'year' => $year->fromYear."-".$year->toYear
                        ]);
                    }
                }
            }


            return Response::HTTP_OK;            

        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteSchool($request) {
        $id = $this->aes->decrypt($request->id);
        $school = $this->aes->decrypt($request->school);

        if($school == 1) {
            ElementarySchools::where('id', $id)->delete();
            ElementarySubjectsData::where('schoolID', $id)->delete();
            User::where('elemschoolID', $id)->delete();
        }
        if($school == 2) {
            HighSchools::where('id', $id)->delete();
            HighSchoolSubjectsData::where('schoolID', $id)->delete();
            SeniorHighSchoolSubjectsData::where('schoolID', $id)->delete();
            User::where('highSchoolID', $id)->delete();
        }
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countElementarySchools() {
        return ElementarySchools::count();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countHighSchools() {
        return HighSchools::count();
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchool($school) {
        $id = $this->aes->decrypt($school);
        return ElementarySubjectsData::where('schoolID', $id)
                ->where('year', Session::get('year'))
                ->orderBy('yearLevel', 'ASC')
                ->get();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchHighSchool($school) {
        $id = $this->aes->decrypt($school);
        return HighSchoolSubjectsData::where('schoolID', $id)
                ->where('year', Session::get('year'))
                ->orderBy('yearLevel', 'ASC')
                ->get();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchSeniorHighSchool($school) {
        $id = $this->aes->decrypt($school);
        return SeniorHighSchoolSubjectsData::where('schoolID', $id)
                ->where('year', Session::get('year'))
                ->orderBy('yearLevel', 'ASC')
                ->get();
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSchoolYear($request) {
        
        $year = $this->getLatestSchoolYear();

        foreach(ElementarySubjectsData::where('year', $year->fromYear."-".$year->toYear)->get() as $elem) {
            
            ElementarySubjectsData::create([
                'schoolID' => $elem->schoolID,
                'yearLevel' => $elem->yearLevel,
                'subjectID' => $elem->subjectID,
                'year' => $year->toYear."-".$year->toYear + 1
            ]);
        }

        foreach(HighSchoolSubjectsData::where('year', $year->fromYear."-".$year->toYear)->get() as $hs) {
            if($hs->tve_tle == 1) {
                HighSchoolSubjectsData::create([
                    'schoolID' => $hs->schoolID,
                    'yearLevel' => $hs->yearLevel,
                    'subjectID' => $hs->subjectID,
                    'tve_tle' => true,
                    'year' => $year->toYear."-".$year->toYear + 1
                ]);
            }
            if($hs->tve_tle == null) {
                HighSchoolSubjectsData::create([
                    'schoolID' => $hs->schoolID,
                    'yearLevel' => $hs->yearLevel,
                    'subjectID' => $hs->subjectID,
                    'year' => $year->toYear."-".$year->toYear + 1
                ]);
            }
        }   

        foreach(SeniorHighSchoolSubjectsData::where('year', $year->fromYear."-".$year->toYear)->get() as $shs) {
            if($hs->strand == 1) {
                SeniorHighSchoolSubjectsData::create([
                    'schoolID' => $shs->schoolID,
                    'yearLevel' => $shs->yearLevel,
                    'subjectID' => $shs->subjectID,
                    'strand' => true,
                    'year' => $year->toYear."-".$year->toYear + 1
                ]);
            }
            if($hs->strand == null) {
                SeniorHighSchoolSubjectsData::create([
                    'schoolID' => $shs->schoolID,
                    'yearLevel' => $shs->yearLevel,
                    'subjectID' => $shs->subjectID,
                    'year' => $year->toYear."-".$year->toYear + 1
                ]);
            }
        }

        SchoolYear::create([
            'fromYear' => $year->toYear,
            'toYear' => $year->toYear + 1
        ]);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchoolTeachers($school) {
        $schoolID = $this->aes->decrypt($school);
        return Teachers::where('elemSchoolID', $schoolID)->get();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchHighSchoolTeachers($school) {
        $schoolID = $this->aes->decrypt($school);
        return Teachers::where('highSchoolID', $schoolID)->get();
    }




    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getRequestDocuments() {
        return RequestDocuments::orderBy('created_at', 'DESC')->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createRequestDocuments($request) {
        $position = $this->aes->decrypt($request->position);
        RequestDocuments::create([
            'position' => $position,
            'description' => $request->description
        ]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateRequestDocuments($request) {
        $id = $this->aes->decrypt($request->id);
        $position = $this->aes->decrypt($request->position);

        RequestDocuments::where('id', $id)->update([
            'position' => $position,
            'description' => $request->description
        ]);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteRequestDocuments($request) {
        $id = $this->aes->decrypt($request->id);

        foreach(Attachments::where('requestID', $id)->get() as $attachments) {
            File::delete(public_path('storage/attachments/'.$attachments->filename.''));
        }

        RequestDocuments::where('id', $id)->delete();
        Attachments::where('requestID', $id)->delete();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getRequestedDocument($request) {
        $id = $this->aes->decrypt($request->id);
        return RequestDocuments::where('id', $id)->first();
    }




     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElemAttachments($request) {
        $id = $this->aes->decrypt($request->id);
        $schoolID = $this->aes->decrypt(Session::get('elementaryTeacher'));
        return Attachments::where('requestID', $id)
                    ->where('elemSchoolID', $schoolID)
                    ->get();
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getHighSchoolAttachments($request) {
        $id = $this->aes->decrypt($request->id);
        $schoolID = $this->aes->decrypt(Session::get('highSchoolTeacher'));
        return Attachments::where('requestID', $id)
                    ->where('highSchoolID', $schoolID)
                    ->get();
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElementarySchool($request) {
        $id = $this->aes->decrypt($request->school);
        return ElementarySchools::where('id', $id)->first();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getHighSchool($request) {
        $id = $this->aes->decrypt($request->school);
        return HighSchools::where('id', $id)->first();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSchoolTeachers($request) {
        $schoolID = $this->aes->decrypt($request->school);
        
        if($request->type == 1)
            return Teachers::where('elemSchoolID', $schoolID)->get();
        if($request->type == 2)
            return Teachers::where('highSchoolID', $schoolID)->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSchoolAttachments($request) {
        $id = $this->aes->decrypt($request->id);
        $schoolID = $this->aes->decrypt($request->school);

        if($request->type == 1) {
            return Attachments::where('requestID', $id)
                    ->where('elemSchoolID', $schoolID)
                    ->get();
        }
        if($request->type == 2) {
            return Attachments::where('requestID', $id)
                    ->where('highSchoolID', $schoolID)
                    ->get();
        }
    }




    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateAdminAccount($request) {
        
        if(Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ]
        ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if(!empty($request->password)) {
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password)]);
        }

        return Response::HTTP_OK;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getAttachments() {
       
        return Attachments::select('teacherID', 'requestID')->groupBy('teacherID', 'requestID')->get();
        
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElemTeachers() {
       
        return Teachers::where('schoolType', 1)->get();
        
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getHighSchoolTeachers() {
       
        return Teachers::where('schoolType', 2)->get();
        
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createFaceAuth($request) {
       
        $extension = $request->file->getClientOriginalExtension();

        if($extension != 'jpg')
            return Response::HTTP_INTERNAL_SERVER_ERROR;
        
        File::delete(public_path("/storage/face-auth/7N37sjIfYvGzyfRv7sSiVWFMV7ysHwPHTp2qleWHQKhC5eO0BT.jpg"));

        $customFileName = '7N37sjIfYvGzyfRv7sSiVWFMV7ysHwPHTp2qleWHQKhC5eO0BT.'.$extension;
        $transferfile = $request->file->storeAs('/public/face-auth/', $customFileName);    

        return Response::HTTP_OK;
        
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSubjectProMeds($request) {
        $id = $this->aes->decrypt($request->id);

        if($request->schoolType == 1)
            return ElementarySubjectsData::where('id', $id)->first();
        if($request->schoolType == 2) {
            if($request->type == 1)
                return HighSchoolSubjectsData::where('id', $id)->first();
            if($request->type == 2)
                return SeniorHighSchoolSubjectsData::where('id', $id)->first();
        }
        if($request->schoolType == 3)
            return SeniorHighSchoolSubjectsData::where('id', $id)->first();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getProMeds($request) {
        $id = $this->aes->decrypt($request->id);
        
        if($request->schoolType == 1)
            return ProMeds::where('elemSubjectID', $id)->get();
        if($request->schoolType == 2) {
            if($request->type == 1) {
                if($request->type2 == 0)
                    return ProMeds::where('hsSubjectID', $id)->get();
                if($request->type2 == 1)
                    return ProMeds::where('tleID', $id)->get();
            }
            if($request->type == 2) {
                if($request->type2 == 0)
                    return ProMeds::where('shsSubjectID', $id)->get();
                if($request->type2 == 1)
                    return ProMeds::where('strandID', $id)->get();
            }
        }
        if($request->schoolType == 3) {
            if($request->type2 == 0)
                return ProMeds::where('shsSubjectID', $id)->get();
            if($request->type2 == 1)
                return ProMeds::where('strandID', $id)->get();
        }
        
    }

    public function getTeachers($request) {
        
        if($request->schoolType == 1)
            return Teachers::where('elemSchoolID', $this->aes->decrypt(Session::get('elementary')))->get();
        if($request->schoolType == 2 || $request->schoolType == 3)
            return Teachers::where('highSchoolID', $this->aes->decrypt(Session::get('highSchool')))->get();
    }
}
