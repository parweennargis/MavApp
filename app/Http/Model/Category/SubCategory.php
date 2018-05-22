<?php

namespace App\Http\Model\Category;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    
    public function getAllSubCategory()
    {
        return $this->get();
    }
    
    public function getCountByCategoryId($categoryId)
    {
        return $this->where(['category_id' => $categoryId])
                    ->get();
    }
    
    public function getDataByCategoryId($subCategoryId)
    {
        return $this->find($subCategoryId);
    }
    
}
