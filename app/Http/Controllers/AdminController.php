<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function courses(){
        return view('admin.courses.index');
    }
    public function products(){
        return view('admin.products.index');
    }
    public function users(){
        return view('admin.users.index');
    }
}
