<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Model\Question\Question;
use App\Http\Model\Common\Category;

class QuestionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Question $question, Category $category)
    {
        $this->question = $question;
        $this->category = $category;
    }
    
    public function getQuestions()
    {
        $questions = $this->question->getAllQuestions();
        
        return view('question.view-questions', compact('questions'));
    }
    
    public function getQuestionForm()
    {
        $activeCategories = $this->category->getAllActiveCategory();
        
        return view('question.add-questions', compact('activeCategories'));
    }
}


