<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Model\Category\Category;

class MemberDashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    
    /**
     * @return view
     */
    public function index()
    {
        $categories = $this->category->getAllActiveCategoryWithQuestions();
        return view('dashboard.member-dashboard', compact('categories'));
    }
}
