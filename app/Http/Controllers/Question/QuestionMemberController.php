<?php

namespace App\Http\Controllers\Question;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Model\Category\Category;
use App\Http\Model\Question\Question;
use App\Http\Model\Category\SubCategory;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Question\QuestionOption;
use App\Http\Model\Users\UserQuestionAnswer;

class QuestionMemberController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category, Question $question, QuestionOption $questionOption, UserQuestionAnswer $userQuestionAnswer, SubCategory $subCategory)
    {
        $this->category = $category;
        $this->question = $question;
        $this->subCategory = $subCategory;
        $this->questionOption = $questionOption;
        $this->userQuestionAnswer = $userQuestionAnswer;
    }

    public function questionSummary($categoryName)
    {
        $categorydata = $this->category->getCategoryByName($categoryName);
        
        $categories = $this->subCategory->getCountByCategoryId($categorydata['id']);
        
        return view('question.member-summary', compact('categorydata', 'categories'));
    }
    
    public function viewQuestions($subCategoryId)
    {
        $categorydata = $this->subCategory->getDataByCategoryId($subCategoryId);
        $stepId = 0;
        Session(['step_number' => $stepId]);
        
        $question = $this->question->getQuestionsBycategoryId($categorydata['id'], $stepId);
        
        $questionOptions = $this->questionOption->getOptionByQuestionId($question['id']);
        $memberStepId = $stepId + 1;
        
        return view('question.member-questions-view', compact('categorydata', 'question', 'questionOptions', 'memberStepId'));
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
        $stepnumber = Session::get('step_number');
        $newStep = $stepnumber+1;
        Session(['step_number' => $newStep]);
        
        $question = $this->question->getQuestionsBycategoryId($categoryId, $newStep);
        if ($question) {
            $questionOptions = $this->questionOption->getOptionByQuestionId($question['id']);
            return response()->json(['result' => true, 'next' => true, 'msg' => ['question' => $question['question'], 'questionOptions' => $questionOptions]]);
        }
        
        return response()->json(['result' => true, 'next' => true, 'msg' => '']);
        
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
            'categoryId' => 'required|exists:sub_categories,id',
            'option' => 'required|exists:question_options,id'
        ];
        $validationMessage = [];
        
        return Validator::make($data, $rules, $validationMessage);
    }

}
