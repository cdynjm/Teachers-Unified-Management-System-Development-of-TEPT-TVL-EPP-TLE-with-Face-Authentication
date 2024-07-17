<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

//CIPHER:
use App\Http\Controllers\AESCipher;

//INTERFACES:
use App\Repositories\Interfaces\TeacherInterface; 

class TeacherController extends Controller
{
    protected $aes;
    protected $TeacherInterface;

    public function __construct(AESCipher $aes, TeacherInterface $TeacherInterface) {
        $this->aes = $aes;
        $this->TeacherInterface = $TeacherInterface;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function dashboard() {
        $requestDocuments = $this->TeacherInterface->getRequestDocuments();
        return view('pages.teachers.dashboard', compact('requestDocuments'));
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function viewRequestedDocument(Request $request) {
        $requestedDocument = $this->TeacherInterface->viewRequestedDocument($request);
        $attachments = $this->TeacherInterface->getAttachments($request);
        return view('pages.teachers.view-requested-document', compact('requestedDocument', 'attachments'));
    }




     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createUploadAttachments(Request $request) {
        $this->TeacherInterface->createUploadAttachments($request);
        $attachments = $this->TeacherInterface->getAttachments($request);
        $aes = $this->aes;

        return response()->json([
            'Message' => 'Attachments Submitted successfully',
            'Attachments' => view('data.teachers.attachments', compact('aes', 'attachments'))->render()
        ],Response::HTTP_OK);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteAttachments(Request $request) {
        $this->TeacherInterface->deleteAttachments($request);
        $attachments = $this->TeacherInterface->getAttachments($request);
        $aes = $this->aes;
        
        return response()->json([
            'Message' => 'Attachment Deleted successfully',
            'Attachments' => view('data.teachers.attachments', compact('aes', 'attachments'))->render()
        ],Response::HTTP_OK);
    }




    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function profile(Request $request) {
       return view('pages.teachers.profile');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTeacherAccount(Request $request) {
        $status = $this->TeacherInterface->updateTeacherAccount($request);
        return response()->json([], $status);        
     }
}
