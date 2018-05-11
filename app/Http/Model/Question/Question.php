<?php

namespace App\Http\Model\Question;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Get All Questions
     * 
     * @return array
     */
    public function getAllQuestions()
    {
        return $this->select('questions.id', 'categories.name', 'question', 'questions.status')
                ->leftjoin('categories', 'questions.category_id', '=', 'categories.id')
                ->get();
    }
    
    /**
     * Save Data
     * 
     * @param int $categoryId
     * @param string $question
     * @param string $hint
     * @param int $status
     * @return int
     */
    public function saveData($categoryId, $question, $hint, $status)
    {
        return $this->insertGetId([
                    'category_id' => $categoryId,
                    'question' => $question,
                    'hint' => $hint,
                    'status' => $status
        ]);
    }
    
    /**
     * Get Question By Id
     * 
     * @param int $questionId
     * @return array
     */
    public function getQuestionById($questionId)
    {
        return $this->find($questionId);
    }
    
    /**
     * Update Data
     * 
     * @param int $questionId
     * @param int $categoryId
     * @param string $question
     * @param string $hint
     * @param int $status
     * @return boolean
     */
    public function updateData($questionId, $categoryId, $question, $hint, $status)
    {
        $data = $this->getQuestionById($questionId);
        $data->category_id = $categoryId;
        $data->question = $question;
        $data->hint = $hint;
        $data->status = $status;
        return $data->save();
    }
    
    public function getCountByCategoryId($categoryId)
    {
        return $this->where('category_id', $categoryId)->count();
    }
    
    public function getQuestionsBycategoryId($categoryId, $stepId)
    {
        return $this->where('category_id', $categoryId)
                    ->orderBy('id', 'desc')
                    ->limit(2)
                    ->offset($stepId)
                    ->first();
    }

}
