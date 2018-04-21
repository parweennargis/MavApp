<?php

namespace App\Http\Model\Question;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    /**
     * Save Options
     * 
     * @param int $questionId
     * @param array $optionArray
     * @return boolean
     */
    public function saveOptions($questionId, $optionArray)
    {
        foreach ($optionArray as $option) {
            QuestionOption::insert([
                'question_id' => $questionId,
                'option' => $option
            ]);
        }
        return true;
    }
    
    /**
     * Get Option Values By Id
     * 
     * @param int $questionId
     * @return array
     */
    public function getOptionValuesById($questionId)
    {
        return $this->where('question_id', $questionId)
                    ->get();
    }
    
    /**
     * Update Options
     * 
     * @param int $questionId
     * @param array $optionArray
     * @return boolean
     */
    public function updateOptions($questionId, $optionArray)
    {
        $this->where('question_id', $questionId)
             ->delete();
        foreach ($optionArray as $option) {
            QuestionOption::insert([
                'question_id' => $questionId,
                'option' => $option
            ]);
        }
        return true;
    }
            
}
