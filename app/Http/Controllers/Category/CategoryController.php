<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Category\Category;

class CategoryController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories()
    {
        $categories = $this->category->getAllCategories();
        
        return view('category.view-categories', compact('categories'));
    }
    
    public function getCategoryForm()
    {
        return view('category.add-categories');
    }

}
