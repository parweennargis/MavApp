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
    
}
