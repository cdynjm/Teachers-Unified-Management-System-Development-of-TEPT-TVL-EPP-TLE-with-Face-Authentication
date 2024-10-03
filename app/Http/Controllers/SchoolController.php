<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

//CIPHER:
use App\Http\Controllers\AESCipher;

//INTERFACES:
use App\Repositories\Interfaces\SchoolInterface;  

class SchoolController extends Controller
{
    protected $aes;
    protected $SchoolInterface;

    public function __construct(AESCipher $aes, SchoolInterface $SchoolInterface) {
        $this->aes = $aes;
        $this->SchoolInterface = $SchoolInterface;

    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function dashboard(Request $request) {

        $year = Session::get('year');

        if(Auth::user()->schoolType == 1) {

            $result = $this->SchoolInterface->searchElementarySchool($year);
            $schoolYear = $this->SchoolInterface->getSchoolYear();
            $request->session()->put('elementaryMPS', $result);
            $elementaryMPS = Session::get('elementaryMPS');

            return view('pages.schools.dashboard', compact('schoolYear','elementaryMPS'));
        }
        if(Auth::user()->schoolType == 2 || Auth::user()->schoolType == 3) {

            $highSchoolResult = $this->SchoolInterface->searchHighSchool($year);
            $seniorHighSchoolResult = $this->SchoolInterface->searchSeniorHighSchool($year);
            $schoolYear = $this->SchoolInterface->getSchoolYear();
            $request->session()->put('highSchoolMPS', $highSchoolResult);
            $request->session()->put('seniorHighSchoolMPS', $seniorHighSchoolResult);
            $highSchoolMPS = Session::get('highSchoolMPS');
            $seniorHighSchoolMPS = Session::get('seniorHighSchoolMPS');
            
            return view('pages.schools.dashboard', compact('schoolYear', 'highSchoolMPS', 'seniorHighSchoolMPS'));
        }
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateElementarySubjectMPS(Request $request) {
        $this->SchoolInterface->updateElementarySubjectMPS($request);
        $elementaryMPS = $this->SchoolInterface->searchElementarySchool($request->year);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'MPS updated successfully',
            'SchoolMPS' => view('data.schools.elementary-schools-mps', compact('aes', 'elementaryMPS'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateHighSchoolSubjectMPS(Request $request) {
        $this->SchoolInterface->updateHighSchoolSubjectMPS($request);
        $highSchoolMPS = $this->SchoolInterface->searchHighSchool($request->year);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'MPS updated successfully',
            'SchoolMPS' => view('data.schools.high-schools-mps', compact('aes', 'highSchoolMPS'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSeniorHighSchoolSubjectMPS(Request $request) {
        $this->SchoolInterface->updateSeniorHighSchoolSubjectMPS($request);
        $seniorHighSchoolMPS = $this->SchoolInterface->searchSeniorHighSchool($request->year);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'MPS updated successfully',
            'SchoolMPS' => view('data.schools.senior-high-schools-mps', compact('aes', 'seniorHighSchoolMPS'))->render()
        ], Response::HTTP_OK);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateElemTotalStudents(Request $request) {
        $this->SchoolInterface->updateElemTotalStudents($request);
        $elementaryMPS = $this->SchoolInterface->searchElementarySchool($request->year);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Total Studednts updated successfully',
            'SchoolMPS' => view('data.schools.elementary-schools-mps', compact('aes', 'elementaryMPS'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateHSTotalStudents(Request $request) {
        $this->SchoolInterface->updateHSTotalStudents($request);
        $highSchoolMPS = $this->SchoolInterface->searchHighSchool($request->year);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Total Students updated successfully',
            'SchoolMPS' => view('data.schools.high-schools-mps', compact('aes', 'highSchoolMPS'))->render()
        ], Response::HTTP_OK);
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSHSTotalStudents(Request $request) {
        $this->SchoolInterface->updateSHSTotalStudents($request);
        $seniorHighSchoolMPS = $this->SchoolInterface->searchSeniorHighSchool($request->year);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Total Students updated successfully',
            'SchoolMPS' => view('data.schools.senior-high-schools-mps', compact('aes', 'seniorHighSchoolMPS'))->render()
        ], Response::HTTP_OK);
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchool(Request $request) {
        $year = $request->session()->put('year', $request->year);
        $this->SchoolInterface->searchElementarySchool($year);
        return response()->json([], Response::HTTP_OK);
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchHighSchool(Request $request) {
        $year = $request->session()->put('year', $request->year);
        $this->SchoolInterface->searchHighSchool($year);
        $this->SchoolInterface->searchSeniorHighSchool($year);
        return response()->json([], Response::HTTP_OK);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function teachers() {
        $teachers = $this->SchoolInterface->getTeachers();
        return view('pages.schools.teachers', compact('teachers'));
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createTeacher(Request $request) {
        $status = $this->SchoolInterface->createTeacher($request);
        $teachers = $this->SchoolInterface->getTeachers();
        $aes = $this->aes;

        return response()->json([
            'Teachers' => view('data.schools.teachers', compact('teachers', 'aes'))->render(),
        ], $status);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTeacher(Request $request) {
        $status = $this->SchoolInterface->updateTeacher($request);
        $teachers = $this->SchoolInterface->getTeachers();
        $aes = $this->aes;

        return response()->json([
            'Teachers' => view('data.schools.teachers', compact('teachers', 'aes'))->render(),
        ], $status);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteTeacher(Request $request) {
        $status = $this->SchoolInterface->deleteTeacher($request);
        $teachers = $this->SchoolInterface->getTeachers();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Teacher Deleted Successfully',
            'Teachers' => view('data.schools.teachers', compact('teachers', 'aes'))->render(),
        ], Response::HTTP_OK);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function profile(Request $request) {
        return view('pages.schools.profile');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSchoolAccount(Request $request) {
        $status = $this->SchoolInterface->updateSchoolAccount($request);
        return response()->json([], $status);        
     }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function proMeds(Request $request) {
       $subject = $this->SchoolInterface->getSubjectProMeds($request);
       $promeds = $this->SchoolInterface->getProMeds($request);
       $teachers = $this->SchoolInterface->getTeachers();
       return view('pages.schools.pro-meds', ['teachers' => $teachers, 'subject' => $subject, 'promeds' => $promeds, 'type' => $request->type]);
     }

      /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createProMeds(Request $request) {
        $this->SchoolInterface->createProMeds($request);
        $promeds = $this->SchoolInterface->getProMeds($request);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Data updated successfully',
            'ProMeds' => view('data.schools.promeds', compact('promeds', 'aes'))->render()
        ], Response::HTTP_OK);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateProMeds(Request $request) {
        $this->SchoolInterface->updateProMeds($request);
        $promeds = $this->SchoolInterface->getProMeds($request);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Data updated successfully',
            'ProMeds' => view('data.schools.promeds', compact('promeds', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /*
    **
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteProMeds(Request $request) {
        $this->SchoolInterface->deleteProMeds($request);
        $promeds = $this->SchoolInterface->getProMeds($request);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Data deleted successfully',
            'ProMeds' => view('data.schools.promeds', compact('promeds', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /*
    **
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function downloadProMeds(Request $request) {
        $subject = $this->SchoolInterface->getSubjectProMeds($request);
        $promeds = $this->SchoolInterface->downloadProMeds($request);
        $seniorHigh = $this->SchoolInterface->seniorHigh($request);

        return view('pages.schools.print-promeds', ['teacher' => $request->teacher, 'seniorHigh' => $seniorHigh, 'subject' => $subject, 'promeds' => $promeds, 'type' => $request->type, 'quarter' => $request->quarter, 'schoolType' => $request->schoolType]);
    }
}
