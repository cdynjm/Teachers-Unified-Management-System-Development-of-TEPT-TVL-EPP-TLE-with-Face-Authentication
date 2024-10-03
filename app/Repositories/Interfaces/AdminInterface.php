<?php

namespace App\Repositories\Interfaces;
/**
 * Define a set of methods that a class must implement in order to satisfy a contract.
 *
 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
 */
interface AdminInterface
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSchoolYear();
    public function getLatestSchoolYear();

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElementarySubjects();
    public function createElementarySubject($request);
    public function updateElementarySubject($request);
    public function deleteElementarySubject($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getHighSchoolSubjects();
    public function createHighSchoolSubject($request);
    public function updateHighSchoolSubject($request);
    public function deleteHighSchoolSubject($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getTLETVESubjects();
    public function createTLETVESubject($request);
    public function updateTLETVESubject($request);
    public function deleteTLETVESubject($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSeniorHighSchoolSubject($request);
    public function updateSeniorHighSchoolSubject($request);
    public function deleteSeniorHighSchoolSubject($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getStrands();
    public function createStrandSubject($request);
    public function updateStrandSubject($request);
    public function deleteStrandSubject($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElementarySchools();
    public function getHighSchools();
    public function createSchool($request);
    public function editSchool($request);
    public function getSchoolDataForUpdate($request);
    public function getSeniorHighSchoolDataForUpdate($request);
    public function updateSchool($request);
    public function deleteSchool($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countElementarySchools();
    public function countHighSchools();

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchool($request);
    public function searchHighSchool($request);
    public function searchSeniorHighSchool($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSchoolYear($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchElementarySchoolTeachers($school);
    public function searchHighSchoolTeachers($school);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getRequestDocuments();
    public function createRequestDocuments($request);
    public function updateRequestDocuments($request);
    public function deleteRequestDocuments($request);
    public function getRequestedDocument($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElemAttachments($request);
    public function getHighSchoolAttachments($request);
    
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getElementarySchool($request);
    public function getHighSchool($request);
    public function getSchoolTeachers($request);
    public function getSchoolAttachments($request);

     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateAdminAccount($request);

     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getAttachments();
    public function getElemTeachers();
    public function getHighSchoolTeachers();

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createFaceAuth($request);

    public function getSubjectProMeds($request);
    public function getProMeds($request);
    public function getTeachers($request);
}

?>