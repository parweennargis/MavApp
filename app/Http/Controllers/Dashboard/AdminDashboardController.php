<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * @return view
     */
    public function index()
    {
        return view('dashboard.admin-dashboard');
    }
}
