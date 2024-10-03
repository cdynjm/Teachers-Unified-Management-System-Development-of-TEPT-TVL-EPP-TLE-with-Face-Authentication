<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolYear;

//CIPHER:
use App\Http\Controllers\AESCipher;

//INTERFACES:
use App\Repositories\Interfaces\AdminInterface;  

class AdminController extends Controller
{
    protected $aes;
    protected $AdminInterface;

    public function __construct(AESCipher $aes, AdminInterface $AdminInterface) {
        $this->aes = $aes;
        $this->AdminInterface = $AdminInterface;

    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function dashboard(Request $request) {

        $countElementarySchools = $this->AdminInterface->countElementarySchools();
        $countHighSchools = $this->AdminInterface->countHighSchools();
        $latestSchoolYear = SchoolYear::orderBy('fromYear', 'DESC')->first();
        $request->session()->put('year', $latestSchoolYear->fromYear."-".$latestSchoolYear->toYear);

        return view('pages.admin.dashboard', compact('countHighSchools', 'countElementarySchools'));
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function subjects() {

        $elementarySubjects = $this->AdminInterface->getElementarySubjects();
        $highSchoolSubjects = $this->AdminInterface->getHighSchoolSubjects();
        $seniorHighSchoolSubjects = $this->AdminInterface->getSeniorHighSchoolSubjects();
        $TLETVESubjects = $this->AdminInterface->getTLETVESubjects();
        $strandSubjects = $this->AdminInterface->getStrands();

        return view('pages.admin.subjects', compact('strandSubjects', 'seniorHighSchoolSubjects', 'elementarySubjects', 'highSchoolSubjects', 'TLETVESubjects'));
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createElementarySubject(Request $request) {
        $this->AdminInterface->createElementarySubject($request);
        $elementarySubjects = $this->AdminInterface->getElementarySubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject added successfully',
            'Subjects' => view('data.admin.elementary-subjects-table', compact('elementarySubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateElementarySubject(Request $request) {
        $this->AdminInterface->updateElementarySubject($request);
        $elementarySubjects = $this->AdminInterface->getElementarySubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject updated successfully',
            'Subjects' => view('data.admin.elementary-subjects-table', compact('elementarySubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteElementarySubject(Request $request) {
        $this->AdminInterface->deleteElementarySubject($request);
        $elementarySubjects = $this->AdminInterface->getElementarySubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject deleted successfully',
            'Subjects' => view('data.admin.elementary-subjects-table', compact('elementarySubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }



    
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createHighSchoolSubject(Request $request) {
        $this->AdminInterface->createHighSchoolSubject($request);
        $highSchoolSubjects = $this->AdminInterface->getHighSchoolSubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject added successfully',
            'Subjects' => view('data.admin.high-school-subjects-table', compact('highSchoolSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateHighSchoolSubject(Request $request) {
        $this->AdminInterface->updateHighSchoolSubject($request);
        $highSchoolSubjects = $this->AdminInterface->getHighSchoolSubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject updated successfully',
            'Subjects' => view('data.admin.high-school-subjects-table', compact('highSchoolSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteHighSchoolSubject(Request $request) {
        $this->AdminInterface->deleteHighSchoolSubject($request);
        $highSchoolSubjects = $this->AdminInterface->getHighSchoolSubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject deleted successfully',
            'Subjects' => view('data.admin.high-school-subjects-table', compact('highSchoolSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }




     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createTLETVESubject(Request $request) {
        $this->AdminInterface->createTLETVESubject($request);
        $TLETVESubjects = $this->AdminInterface->getTLETVESubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject added successfully',
            'Subjects' => view('data.admin.TLE-TVE-subjects-table', compact('TLETVESubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTLETVESubject(Request $request) {
        $this->AdminInterface->updateTLETVESubject($request);
        $TLETVESubjects = $this->AdminInterface->getTLETVESubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject updated successfully',
            'Subjects' => view('data.admin.TLE-TVE-subjects-table', compact('TLETVESubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteTLETVESubject(Request $request) {
        $this->AdminInterface->deleteTLETVESubject($request);
        $TLETVESubjects = $this->AdminInterface->getTLETVESubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject deleted successfully',
            'Subjects' => view('data.admin.TLE-TVE-subjects-table', compact('TLETVESubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSeniorHighSchoolSubject(Request $request) {
        $this->AdminInterface->createSeniorHighSchoolSubject($request);
        $seniorHighSchoolSubjects = $this->AdminInterface->getSeniorHighSchoolSubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject added successfully',
            'Subjects' => view('data.admin.senior-high-school-subjects-table', compact('seniorHighSchoolSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSeniorHighSchoolSubject(Request $request) {
        $this->AdminInterface->updateSeniorHighSchoolSubject($request);
        $seniorHighSchoolSubjects = $this->AdminInterface->getSeniorHighSchoolSubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject updated successfully',
            'Subjects' => view('data.admin.senior-high-school-subjects-table', compact('seniorHighSchoolSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteSeniorHighSchoolSubject(Request $request) {
        $this->AdminInterface->deleteSeniorHighSchoolSubject($request);
        $seniorHighSchoolSubjects = $this->AdminInterface->getSeniorHighSchoolSubjects();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject deleted successfully',
            'Subjects' => view('data.admin.senior-high-school-subjects-table', compact('seniorHighSchoolSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createStrandSubject(Request $request) {
        $this->AdminInterface->createStrandSubject($request);
        $strandSubjects = $this->AdminInterface->getStrands();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject added successfully',
            'Subjects' => view('data.admin.strand-subjects-table', compact('strandSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateStrandSubject(Request $request) {
        $this->AdminInterface->updateStrandSubject($request);
        $strandSubjects = $this->AdminInterface->getStrands();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject updated successfully',
            'Subjects' => view('data.admin.strand-subjects-table', compact('strandSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteStrandSubject(Request $request) {
        $this->AdminInterface->deleteStrandSubject($request);
        $strandSubjects = $this->AdminInterface->getStrands();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Subject deleted successfully',
            'Subjects' => view('data.admin.strand-subjects-table', compact('strandSubjects', 'aes'))->render()
        ], Response::HTTP_OK);
    }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function schools() {
        $TLETVESubjects = $this->AdminInterface->getTLETVESubjects();
        $strandSubjects = $this->AdminInterface->getStrands();
        $elementarySchools = $this->AdminInterface->getElementarySchools();
        $highSchools = $this->AdminInterface->getHighSchools();

        return view('pages.admin.schools', compact('highSchools', 'elementarySchools', 'strandSubjects', 'TLETVESubjects'));
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSchool(Request $request) {
        $status = $this->AdminInterface->createSchool($request);
        $elementarySchools = $this->AdminInterface->getElementarySchools();
        $highSchools = $this->AdminInterface->getHighSchools();
        $aes = $this->aes;

        return response()->json([
            'elemSchools' => view('data.admin.elementary-schools-table', compact('elementarySchools', 'aes'))->render(),
            'highSchools' => view('data.admin.high-schools-table', compact('highSchools', 'aes'))->render()
        ], $status);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function editSchool(Request $request) {
        $school = $this->AdminInterface->editSchool($request);
        $schoolData = $this->AdminInterface->getSchoolDataForUpdate($request);
        $seniorHighSchoolData = $this->AdminInterface->getSeniorHighSchoolDataForUpdate($request);
        $TLETVESubjects = $this->AdminInterface->getTLETVESubjects();
        $strandSubjects = $this->AdminInterface->getStrands();
        $type = $this->aes->decrypt($request->school);

        return view('pages.admin.update-school', compact('school', 'schoolData', 'seniorHighSchoolData', 'TLETVESubjects', 'strandSubjects', 'type'));
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSchool(Request $request) {
        $status = $this->AdminInterface->updateSchool($request);
        return response()->json([], $status);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteSchool(Request $request) {
        $this->AdminInterface->deleteSchool($request);
        $elementarySchools = $this->AdminInterface->getElementarySchools();
        $highSchools = $this->AdminInterface->getHighSchools();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'School Information deleted successfully',
            'elemSchools' => view('data.admin.elementary-schools-table', compact('elementarySchools', 'aes'))->render(),
            'highSchools' => view('data.admin.high-schools-table', compact('highSchools', 'aes'))->render()
        ], Response::HTTP_OK);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function elementarySchools(Request $request) {

        $elementarySchools = $this->AdminInterface->getElementarySchools();
        $schoolYear = $this->AdminInterface->getSchoolYear();

        if(!empty(Session::get('elementary'))) {

            $year = Session::get('elementary');
            $result = $this->AdminInterface->searchElementarySchool($year);
            $request->session()->put('elementaryMPS', $result);
            $elementaryMPS = Session::get('elementaryMPS');

            return view('pages.admin.elementary-schools', compact('schoolYear', 'elementarySchools', 'elementaryMPS'));    
        } 
        else {
            return view('pages.admin.elementary-schools', compact('schoolYear', 'elementarySchools'));    
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function highSchools(Request $request) {

        $highSchools = $this->AdminInterface->getHighSchools();
        $schoolYear = $this->AdminInterface->getSchoolYear();

        if(!empty(Session::get('highSchool'))) {

            $highSchoolResult = $this->AdminInterface->searchHighSchool(Session::get('highSchool'));
            $seniorHighSchoolResult = $this->AdminInterface->searchSeniorHighSchool(Session::get('highSchool'));
            $request->session()->put('highSchoolMPS', $highSchoolResult);
            $request->session()->put('seniorHighSchoolMPS', $seniorHighSchoolResult);
            $highSchoolMPS = Session::get('highSchoolMPS');
            $seniorHighSchoolMPS = Session::get('seniorHighSchoolMPS');
            
            return view('pages.admin.high-schools', compact('schoolYear', 'highSchools', 'highSchoolMPS', 'seniorHighSchoolMPS'));    
        } 
        else {
            return view('pages.admin.high-schools', compact('schoolYear', 'highSchools'));    
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchool(Request $request) {

        $request->session()->put('year', $request->year);
        $request->session()->put('elementary', $request->school);
        $result = $this->AdminInterface->searchElementarySchool($request->school);
        $request->session()->put('elementaryMPS', $result);
        $paramaters = $this->aes->encrypt('1')."?".\Str::random(50);

        return response()->json(['QueryParameters' => $paramaters], Response::HTTP_OK);
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchHighSchool(Request $request) {

        $request->session()->put('year', $request->year);
        $request->session()->put('highSchool', $request->school);
        $highSchoolResult = $this->AdminInterface->searchHighSchool($request->school);
        $seniorHighSchoolResult = $this->AdminInterface->searchSeniorHighSchool($request->school);
        $request->session()->put('highSchoolMPS', $highSchoolResult);
        $request->session()->put('seniorHighSchoolMPS', $seniorHighSchoolResult);
        $paramaters = $this->aes->encrypt('2')."?".\Str::random(50);

        return response()->json(['QueryParameters' => $paramaters], Response::HTTP_OK);

    }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSchoolYear(Request $request) {
        $this->AdminInterface->createSchoolYear($request);
        return response()->json(['Message' => 'New Academic year has been created successfully'], Response::HTTP_OK);
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function viewMap(Request $request) {
        return response()->json(['View' => true], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function map() {
        $elementarySchools = $this->AdminInterface->getElementarySchools();
        $highSchools = $this->AdminInterface->getHighSchools();
        $documents = $this->AdminInterface->getRequestDocuments();
        $attachments = $this->AdminInterface->getAttachments();
        $elemTeachers = $this->AdminInterface->getElemTeachers();
        $highSchoolTeachers = $this->AdminInterface->getHighSchoolTeachers();
        return view('pages.admin.map', compact('highSchoolTeachers', 'elementarySchools', 'highSchools', 'documents', 'elemTeachers', 'attachments'));
    }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function teachers() {
        
        $highSchools = $this->AdminInterface->getHighSchools();
        $elementarySchools = $this->AdminInterface->getElementarySchools();
        
        if(!empty(Session::get('elementaryTeacher')) && !empty(Session::get('highSchoolTeacher'))) {
            $elemTeachers = $this->AdminInterface->searchElementarySchoolTeachers(Session::get('elementaryTeacher'));
            $highSchoolTeachers = $this->AdminInterface->searchHighSchoolTeachers(Session::get('highSchoolTeacher'));
            return view('pages.admin.teachers', compact('highSchools', 'elementarySchools', 'elemTeachers', 'highSchoolTeachers'));
        }
        else if(!empty(Session::get('elementaryTeacher'))) {
            $elemTeachers = $this->AdminInterface->searchElementarySchoolTeachers(Session::get('elementaryTeacher'));
            return view('pages.admin.teachers', compact('highSchools', 'elementarySchools', 'elemTeachers'));
        }
        else if(!empty(Session::get('highSchoolTeacher'))) {
            $highSchoolTeachers = $this->AdminInterface->searchHighSchoolTeachers(Session::get('highSchoolTeacher'));
            return view('pages.admin.teachers', compact('highSchools', 'elementarySchools', 'highSchoolTeachers'));
        }
        else {
            return view('pages.admin.teachers', compact('highSchools', 'elementarySchools'));
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchoolTeachers(Request $request) {
        $request->session()->put('elementaryTeacher', $request->school);
        if($request->path == 1) {
            return response()->json(['Path' => 1], Response::HTTP_OK);
        }
        if($request->path == 2) {
            return response()->json(['Path' => 2], Response::HTTP_OK);
        }
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchHighSchoolTeachers(Request $request) {
        $request->session()->put('highSchoolTeacher', $request->school);
        if($request->path == 1) {
            return response()->json(['Path' => 1], Response::HTTP_OK);
        }
        if($request->path == 2) {
            return response()->json(['Path' => 2], Response::HTTP_OK);
        }
    }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function documents() {   
        $requestDocuments = $this->AdminInterface->getRequestDocuments();
        return view('pages.admin.documents', compact('requestDocuments'));
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createRequestDocuments(Request $request) {
        $this->AdminInterface->createRequestDocuments($request);
        $requestDocuments = $this->AdminInterface->getRequestDocuments();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Documents requested successfully',
            'RequestDocuments' => view('data.admin.request-documents', compact('requestDocuments', 'aes'))->render(),
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateRequestDocuments(Request $request) {
        $this->AdminInterface->updateRequestDocuments($request);
        $requestDocuments = $this->AdminInterface->getRequestDocuments();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Document Request information updated successfully',
            'RequestDocuments' => view('data.admin.request-documents', compact('requestDocuments', 'aes'))->render(),
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteRequestDocuments(Request $request) {
        $this->AdminInterface->deleteRequestDocuments($request);
        $requestDocuments = $this->AdminInterface->getRequestDocuments();
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Document Request and attachments deleted successfully',
            'RequestDocuments' => view('data.admin.request-documents', compact('requestDocuments', 'aes'))->render(),
        ], Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function viewDocuments(Request $request) {
        
        $highSchools = $this->AdminInterface->getHighSchools();
        $elementarySchools = $this->AdminInterface->getElementarySchools();
        $requestedDocument = $this->AdminInterface->getRequestedDocument($request);

        if(!empty(Session::get('elementaryTeacher')) && !empty(Session::get('highSchoolTeacher'))) {
            $elemTeachers = $this->AdminInterface->searchElementarySchoolTeachers(Session::get('elementaryTeacher'));
            $highSchoolTeachers = $this->AdminInterface->searchHighSchoolTeachers(Session::get('highSchoolTeacher'));
            $elemAttachments = $this->AdminInterface->getElemAttachments($request);
            $highSchoolAttachments = $this->AdminInterface->getHighSchoolAttachments($request);
            return view('pages.admin.view-documents', compact('highSchoolAttachments', 'elemAttachments', 'requestedDocument', 'highSchools', 'elementarySchools', 'elemTeachers', 'highSchoolTeachers'));
        }
        else if(!empty(Session::get('elementaryTeacher'))) {
            $elemTeachers = $this->AdminInterface->searchElementarySchoolTeachers(Session::get('elementaryTeacher'));
            $elemAttachments = $this->AdminInterface->getElemAttachments($request);
            return view('pages.admin.view-documents', compact('elemAttachments', 'requestedDocument', 'highSchools', 'elementarySchools', 'elemTeachers'));
        }
        else if(!empty(Session::get('highSchoolTeacher'))) {
            $highSchoolTeachers = $this->AdminInterface->searchHighSchoolTeachers(Session::get('highSchoolTeacher'));
            $highSchoolAttachments = $this->AdminInterface->getHighSchoolAttachments($request);
            return view('pages.admin.view-documents', compact('highSchoolAttachments', 'requestedDocument', 'highSchools', 'elementarySchools', 'highSchoolTeachers'));
        }
        else {
            return view('pages.admin.view-documents', compact('requestedDocument', 'highSchools', 'elementarySchools'));
        }
    }




    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function schoolDocuments(Request $request) {
        
        $requestDocuments = $this->AdminInterface->getRequestDocuments();

        if($request->type == 1) {
            $school = $this->AdminInterface->getElementarySchool($request);
            $type = $request->type;
        }
        if($request->type == 2) {
            $school = $this->AdminInterface->getHighSchool($request);
            $type = $request->type;
        }

        return view('pages.admin.school-documents', compact('requestDocuments', 'school', 'type'));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function viewSchoolDocuments(Request $request) {
        
        $requestedDocument = $this->AdminInterface->getRequestedDocument($request);
        $teachers = $this->AdminInterface->getSchoolTeachers($request);
        $attachments = $this->AdminInterface->getSchoolAttachments($request);

        if($request->type == 1)
            $school = $this->AdminInterface->getElementarySchool($request);
        if($request->type == 2)
            $school = $this->AdminInterface->getHighSchool($request);

        return view('pages.admin.school-view-documents', compact('school', 'requestedDocument', 'teachers', 'attachments'));
    }

    


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function profile(Request $request) {
       return view('pages.admin.profile');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateAdminAccount(Request $request) {
        $status = $this->AdminInterface->updateAdminAccount($request);
        return response()->json([], $status);        
     }

     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createFaceAuth(Request $request) {
        $status = $this->AdminInterface->createFaceAuth($request);
        return response()->json([], $status);        
     }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function proMeds(Request $request) {
        $subject = $this->AdminInterface->getSubjectProMeds($request);
        $promeds = $this->AdminInterface->getProMeds($request);
        $teachers = $this->AdminInterface->getTeachers($request);
        return view('pages.admin.pro-meds', ['teachers' => $teachers, 'subject' => $subject, 'promeds' => $promeds, 'type' => $request->type, 'schoolType' => $request->schoolType]);
      }
}
