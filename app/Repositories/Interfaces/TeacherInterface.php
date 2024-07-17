<?php

namespace App\Repositories\Interfaces;
/**
 * Define a set of methods that a class must implement in order to satisfy a contract.
 *
 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
 */
interface TeacherInterface
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getRequestDocuments();
    public function viewRequestedDocument($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getAttachments($request);
    public function createUploadAttachments($request);
    public function deleteAttachments($request);

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTeacherAccount($request);
}

?>