<?php

namespace App\Http\Model\Answer;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function saveUser($input)
    {
        $this->first_name = $input['first_name'];
        $this->last_name = $input['last_name'];
        $this->is_member = $input['is_member'];
        $this->email = $input['email'];
        $this->password = $input['password'];
        $this->phone = $input['phone'];
        return $this->save();
    }
            
}
