<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/auth/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    public function getLogin()
    {
        return view('auth.login');
    }
    
    /**
     * Post Login
     * 
     * @return JSON
     */
    protected function postLogin()
    {
        $input = request()->all();
        $validator = $this->validationMake($input);
        if ($validator->fails()) {
            $response = [];
            foreach ($validator->errors()->messages() as $key => $error) {
                $response[$key] = $error[0];
            }

            return response()->json(['result' => false, 'msg' => $response]);
        }
        $user = null;
        $isLoggedInUser = false;
        // check user is authentic or not
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $isLoggedInUser = true;
            // Get Auth users
            $user = Auth::user();
        }
        if ($isLoggedInUser) {
            // If reference redirect to any url
            $url = $this->getRedirectUrl();
            return response()->json(['result' => true, 'intended' => $url, 'msg' => 'Logged in successfully']);
        }
        
        return response()->json(['result' => false, 'msg' => 'Invalid creds']);
        
    }
    
    /**
     * Validation Make
     * 
     * @param array $input
     * @return boolean
     */
    protected function validationMake($input)
    {
        $vdata = [
            'email' => $input['email'],
            'password' => $input['password']
        ];
        $rules = [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ];
        $validationMessage = [];
        
        return Validator::make($vdata, $rules, $validationMessage);
    }
    
    /**
     * Get Redirect Url
     * 
     * @return string
     */
    protected function getRedirectUrl()
    {
        return Auth::user()->is_member == '1' ? url('member') : url('admin/dashboard');
    }
    
    /**
     * Logout
     * 
     * @return boolean
     */
    protected function logout()
    {
        Session::flush();
        return redirect(url('auth/login'));
    }
}
