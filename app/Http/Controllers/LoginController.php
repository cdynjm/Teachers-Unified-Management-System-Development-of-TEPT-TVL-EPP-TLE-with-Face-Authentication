<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Models\User;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Storage;

//CIPHER:
use App\Http\Controllers\AESCipher;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function adminShow()
    {
        $imagePath = storage_path('app/public/face-auth/7N37sjIfYvGzyfRv7sSiVWFMV7ysHwPHTp2qleWHQKhC5eO0BT.jpg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;

        return view('auth.admin-login', ['imageData' => $imageData]);
    }

    

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
   
        try {
            $request->authenticate();
            $request->session()->regenerate();

            $aes = new AESCipher;
            
            $user = User::where(['id' => Auth::user()->id])->first();
            $authToken = $user->createToken(\Str::random(50))->plainTextToken;
            $request->session()->put('token', $authToken);
            $latestSchoolYear = SchoolYear::orderBy('fromYear', 'DESC')->first();
            $request->session()->put('year', $latestSchoolYear->fromYear."-".$latestSchoolYear->toYear);

            return response()->json([
                'Message' => '<span class="text-sm">Login successful! Please wait while we are redirecting you to the homepage</span>'
            ], Response::HTTP_OK);

        } catch (ValidationException $e) {
            return response()->json([
                'Message' => '<span class="text-sm">'.$e->getMessage().'</span>',
            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogin(AdminLoginRequest $request)
    {
   
        try {
            $request->authenticate();
            $request->session()->regenerate();

            $aes = new AESCipher;
            
            $user = User::where(['id' => Auth::user()->id])->first();
            $authToken = $user->createToken(\Str::random(50))->plainTextToken;
            $request->session()->put('token', $authToken);
            $latestSchoolYear = SchoolYear::orderBy('fromYear', 'DESC')->first();
            $request->session()->put('year', $latestSchoolYear->fromYear."-".$latestSchoolYear->toYear);

            return response()->json([
                'Message' => '<span class="text-sm">Login successful! Please wait while we are redirecting you to the homepage</span>'
            ], Response::HTTP_OK);

        } catch (ValidationException $e) {
            return response()->json([
                'Message' => '<span class="text-sm">'.$e->getMessage().'</span>',
            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    public function faceLogin(Request $request) {

        $user = User::where('id', 1)->first();

        if ($user) {
            Auth::login($user, true);
            
            $request->session()->regenerate();
            $user = User::where(['id' => Auth::user()->id])->first();
            
            $authToken = $user->createToken(\Str::random(50))->plainTextToken;
            $request->session()->put('token', $authToken);
    
            $latestSchoolYear = SchoolYear::orderBy('fromYear', 'DESC')->first();
            $request->session()->put('year', $latestSchoolYear->fromYear . "-" . $latestSchoolYear->toYear);
    
            return response()->json([
                'Message' => '<span class="text-sm">Login successful! Please wait while we are redirecting you to the homepage</span>'
            ], Response::HTTP_OK);
        
        }
        return response()->json([
            'Message' => '<span class="text-sm">Login failed! User not found or credentials are incorrect.</span>'
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function adminLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
