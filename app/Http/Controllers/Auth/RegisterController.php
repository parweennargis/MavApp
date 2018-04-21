<?php

namespace App\Http\Controllers\Auth;

use App\Http\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }
    
    /**
     * Post Registration
     * 
     * @return JSON
     */
    protected function postRegistration()
    {
        $input = request()->all();
        // Validation function call
        $validator = $this->validationMake($input);
        if ($validator->fails()) {
            $response = [];
            foreach ($validator->errors()->messages() as $key => $error) {
                $response[$key] = $error[0];
            }

            return response()->json(['result' => false, 'msg' => $response]);
        }
        
        // function call to save user data in database
        $data = $this->createUser($input);
        if ($data == true) {
            return response()->json(['result' => true, 'msg' => 'Registered uccessfully']);
        }
        
        return response()->json(['result' => false, 'msg' => 'Error in saving data']);
    }
    
    /**
     * Validation Make
     * 
     * @param array $input
     * @return array
     */
    protected function validationMake($input)
    {
        $vdata = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => $input['password'],
            'phone' => $input['phone']
        ];
        $rules = [
            'first_name' => 'required|min:1|max:50',
            'last_name' => 'required|min:1|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:1|max:10',
            'phone' => 'required|min:10|max:11|unique:users,phone'
        ];
        $validationMessage = [];
        
        return Validator::make($vdata, $rules, $validationMessage);
    }
    
    /**
     * Create User
     * 
     * @param array $input
     * @return boolean
     */
    protected function createUser($input)
    {
        $data = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'is_member' => 1,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone']
        ];
        return $this->userModel->saveUser($data);
    }
}
