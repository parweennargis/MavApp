<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Model\Category\Category;
use Illuminate\Support\Facades\Validator;

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
    
    public function postCategoryForm()
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
        
        $this->category->saveCategory($input['category'], $input['status']);
        
        return response()->json(['result' => true, 'msg' => 'Data Saved', 'intended' => url('/admin/view/category')]);
    }
    
    protected function validationMake($input)
    {
        $data = [
            'category' => $input['category'],
            'status' => $input['status']
        ];
        
        $rules = [
            'category' => 'required|unique:categories,name',
            'status' => 'required|in:0,1'
        ];
        
        $validationMessage = [];
        
        return Validator::make($data, $rules, $validationMessage);
    }
    
    public function getEditCategory($categoryId)
    {
        $categoryData = $this->category->getDataByCategoryId($categoryId);
    }

}
