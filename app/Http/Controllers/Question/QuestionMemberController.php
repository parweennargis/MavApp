<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Model\Category\Category;
use App\Http\Model\Question\Question;
use App\Http\Model\Question\QuestionOption;

class QuestionMemberController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category, Question $question, QuestionOption $questionOption)
    {
        $this->category = $category;
        $this->question = $question;
        $this->questionOption = $questionOption;
    }

    public function questionSummary($categoryName)
    {
        $categorydata = $this->category->getCategoryByName($categoryName);
        $questionCount = $this->question->getCountByCategoryId($categorydata['id']);
        
        return view('question.member-summary', compact('categorydata', 'questionCount'));
    }
    
    public function viewQuestions($categoryName)
    {
        $categorydata = $this->category->getCategoryByName($categoryName);
        $stepId = 1-1;
        $question = $this->question->getQuestionsBycategoryId($categorydata['id'], $stepId);
        $questionOptions = $this->questionOption->getOptionByQuestionId($question['id']);
        
        return view('question.member-questions-view', compact('categorydata', 'question', 'questionOptions'));
    }

}
