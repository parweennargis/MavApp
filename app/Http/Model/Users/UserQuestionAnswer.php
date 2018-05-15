<?php

namespace App\Http\Model\Users;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
    
    public function saveQuestionAnswer($userId, $questionId, $option)
    {
        $this->user_id = $userId;
        $this->question_id = $questionId;
        $this->option_id = $option;
        return $this->save();
    }
    
}


