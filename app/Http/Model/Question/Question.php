<?php

namespace App\Http\Model\Question;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getAllQuestions()
    {
        return $this->select('questions.id', 'categories.name', 'question', 'questions.status')
                ->leftjoin('categories', 'questions.category_id', '=', 'categories.id')
                ->get();
    }
            
}
