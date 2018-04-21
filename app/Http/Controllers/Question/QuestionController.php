<?php

namespace App\Http\Controllers\Question;

use App\Http\Model\Common\Category;
use App\Http\Controllers\Controller;
use App\Http\Model\Question\Question;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Question\QuestionOption;

class QuestionController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Question $question, Category $category, QuestionOption $questionOption) {
        $this->question = $question;
        $this->category = $category;
        $this->questionOption = $questionOption;
    }

    /**
     * Get Questions
     * 
     * @return type
     */
    public function getQuestions()
    {
        $questions = $this->question->getAllQuestions();
        
        return view('question.view-questions', compact('questions'));
    }

    /**
     * Get Question Form
     * 
     * @return View
     */
    public function getQuestionForm()
    {
        $activeCategories = $this->category->getAllActiveCategory();

        return view('question.add-questions', compact('activeCategories'));
    }

    /**
     * Post Question Form
     * 
     * @return JSON
     */
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
        
        // save data in question table
        $questionId = $this->question->saveData($input['category'], $input['question'], $input['hint'], 1);
        $optionArray = [
            $input['option1'], $input['option2'], $input['option3'], $input['option4']
        ];
        $this->questionOption->saveOptions($questionId, $optionArray);
        
        return response()->json(['result' => true, 'msg' => 'Data Saved', 'intended' => url('/admin/view/questions')]);
        
    }

    /**
     * Validation Make
     * 
     * @param array $input
     * @param string $type
     * @return boolean
     */
    protected function validationMake($input, $type = null)
    {
        $data = [
            'category' => $input['category'],
            'question' => $input['question'],
            'option1' => $input['option1'],
            'option2' => $input['option2'],
            'option3' => $input['option3'],
            'option4' => $input['option4']
        ];
        
        $rules = [
            'category' => 'required|exists:categories,id',
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required'
        ];
        if ($type == 'edit') {
            $data['id'] = $input['id'];
            $rules['id'] = 'required|exists:questions,id';
        }
        $validationMessage = [];
        
        return Validator::make($data, $rules, $validationMessage);
    }
    
    /**
     * Get Edit Question
     * 
     * @param int $questionId
     * @return View
     */
    protected function getEditQuestion($questionId)
    {
        $activeCategories = $this->category->getAllActiveCategory();
        $question = $this->question->getQuestionById($questionId);
        $questionOptions = $this->questionOption->getOptionValuesById($questionId);
        $i = 1;
        $data = [];
        foreach ($questionOptions as $questionOption) {
            $data[$i] = $questionOption['option'];
            $i++;
        }
        $option1 = $data[1];
        $option2 = $data[2];
        $option3 = $data[3];
        $option4 = $data[4];
        
        return view('question.edit-questions', compact('activeCategories', 'question', 'option1', 'option2', 'option3', 'option4'));
    }
    
    /**
     * Post Edit Question
     * 
     * @return JSON
     */
    protected function postEditQuestion()
    {
        $input = request()->all();
        $validator = $this->validationMake($input, 'edit');
        if ($validator->fails()) {
            $response = [];
            foreach ($validator->errors()->messages() as $key => $error) {
                $response[$key] = $error[0];
            }

            return response()->json(['result' => false, 'msg' => $response]);
        }
        
        $this->question->updateData($input['id'], $input['category'], $input['question'], $input['hint'], 1);
        $optionArray = [
            $input['option1'], $input['option2'], $input['option3'], $input['option4']
        ];
        // TODO: need to correct logic for option update
        $this->questionOption->updateOptions($input['id'], $optionArray);
        
        return response()->json(['result' => true, 'msg' => 'Data Saved', 'intended' => url('/admin/view/questions')]);
    }

}
