<?php

namespace App\Http\Model\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get All Questions
     * 
     * @return array
     */
    public function getAllCategories()
    {
        return $this->select('id', 'name', 'status')
                    ->get();
    }
    
    public function getAllActiveCategoryWithQuestions()
    {
        return $this->select('id', 'name', 'icon', 'color')
                    ->where(['status' => 1])
                    ->get();
    }
    
    public function getCategoryByName($categoryName)
    {
        return $this->where('name', $categoryName)->first();
    }
    
}
