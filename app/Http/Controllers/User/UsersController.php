<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\Users\User;

class UsersController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUsers()
    {
        $users = $this->user->getAllUsers();
        
        return view('user.view-users', compact('users'));
    }

}
