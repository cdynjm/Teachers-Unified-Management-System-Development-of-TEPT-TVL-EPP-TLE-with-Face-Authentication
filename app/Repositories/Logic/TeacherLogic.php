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
use App\Repositories\Interfaces\TeacherInterface;

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
use App\Models\SchoolYear;

class TeacherLogic implements TeacherInterface {

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

     public function getRequestDocuments() {

        if(Auth::user()->Teachers->position == 1) {
            return RequestDocuments::where('position', 1)
                            ->orWhere('position', 3)
                            ->get();
        }
        if(Auth::user()->Teachers->position == 2) {
            return RequestDocuments::where('position', 2)
                            ->orWhere('position', 3)
                            ->get();
        }
     }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function viewRequestedDocument($request) {
        $id = $this->aes->decrypt($request->id);
        return RequestDocuments::where('id', $id)->first();
     }



     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getAttachments($request) {
        $id = $this->aes->decrypt($request->id);
        return Attachments::where('requestID', $id)
                        ->where('teacherID', Auth::user()->Teachers->id)
                        ->get();
    }
      /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function createUploadAttachments($request) {
        $id = $this->aes->decrypt($request->id);

        foreach ($request->file('files') as $file) {

            $timestamp = Carbon::now();
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $customFileName = \Str::slug($originalName.'-'.$timestamp).'.'.$extension;
            $transferfile = $file->storeAs('public/attachments/', $customFileName);    

            if(Auth::user()->Teachers->schoolType == 1) {
                $data = [
                    'elemSchoolID' => Auth::user()->Teachers->elemSchoolID,
                    'requestID' => $id,
                    'teacherID' => Auth::user()->Teachers->id,
                    'filename' => $customFileName,
                ];
            }
            if(Auth::user()->Teachers->schoolType == 2 || Auth::user()->Teachers->schoolType == 3) {
                $data = [
                    'highSchoolID' => Auth::user()->Teachers->highSchoolID,
                    'requestID' => $id,
                    'teacherID' => Auth::user()->Teachers->id,
                    'filename' => $customFileName,
                ];
            }
            Attachments::create($data);
        }
     }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteAttachments($request) {
        $id = $this->aes->decrypt($request->attachmentID);
        $attachment = Attachments::where('id', $id)->first();
        File::delete(public_path("storage/attachments/{$attachment->filename}"));
        Attachments::where('id', $id)->delete();
    }




    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTeacherAccount($request) {
        $position = $this->aes->decrypt($request->position);

        if(Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ]
        ])->fails()) { return Response::HTTP_INTERNAL_SERVER_ERROR; }

        Teachers::where('id', Auth::user()->Teachers->id)->update([
            'teacher' => $request->teacher,
            'position' => $position

        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if(!empty($request->password)) {
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password)]);
        }

        return Response::HTTP_OK;
    }
}

