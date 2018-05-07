<?php

namespace App\Http\Model\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Get All Users
     * 
     * @return array
     */
    public function getAllUsers()
    {
        return $this->select('id', 'first_name', 'last_name', 'email', 'phone')
                ->where(['is_member' => 1])
                ->get();
    }
    
}
