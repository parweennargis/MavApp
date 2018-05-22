<?php

namespace App\Http\Model\Answer;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function saveAnswer($questionId, $answerId)
    {
        $this->question_id = $questionId;
        $this->question_option_id = $answerId;
        return $this->save();
    }
    
    public function updateAnswer($questionId, $answerId)
    {
        $data = $this->where(['question_id' => $questionId])->first();
        if ($data) {
            $data->question_option_id = $answerId;
            return $data->save();
        }
        
        $this->question_id = $questionId;
        $this->question_option_id = $answerId;
        return $this->save();
    }
    
    public function getAnswerId($questionId)
    {
        return $this->select('question_option_id')
                    ->where(['question_id' => $questionId])
                    ->first();
    }
}
