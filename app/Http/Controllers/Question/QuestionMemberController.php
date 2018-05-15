<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Model\Category\Category;
use App\Http\Model\Question\Question;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Question\QuestionOption;
use App\Http\Model\Users\UserQuestionAnswer;

class QuestionMemberController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category, Question $question, QuestionOption $questionOption, UserQuestionAnswer $userQuestionAnswer)
    {
        $this->category = $category;
        $this->question = $question;
        $this->questionOption = $questionOption;
        $this->userQuestionAnswer = $userQuestionAnswer;
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
    
    public function postQuestionForm()
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
        $userId = 1;
        // save data in user answer question table
        $this->userQuestionAnswer->saveQuestionAnswer($userId, $input['questionId'], $input['option']);
        
        
        $categoryId = $input['categoryId'];
        
        $stepId = 1-1;
        $question = $this->question->getQuestionsBycategoryId($categoryId, $stepId);
        $questionOptions = $this->questionOption->getOptionByQuestionId($question['id']);
        
        
        return response()->json(['result' => true, 'msg' => ['question' => $question['question'], 'questionOptions' => $questionOptions]]);
    }
    
    /**
     * Validation Make
     * 
     * @param array $input
     * @return boolean
     */
    protected function validationMake($input)
    {
        $data = [
            'questionId' => $input['questionId'],
            'categoryId' => $input['categoryId'],
            'option' => $input['option']
        ];
        
        $rules = [
            'questionId' => 'required|exists:questions,id',
            'categoryId' => 'required|exists:categories,id',
            'option' => 'required|exists:question_options,id'
        ];
        $validationMessage = [];
        
        return Validator::make($data, $rules, $validationMessage);
    }

}
