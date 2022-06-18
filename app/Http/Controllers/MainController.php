<?php

namespace App\Http\Controllers;

use App\Course;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $products=Product::limit(5)->get();
        $courses=Course::limit(10)->get();
        return view('welcome',compact('courses','products'));
    }
    public function allCourse()
    {
        $courses=Course::all();
        return view('courses.index',compact('courses'));
    }
    public function searchCourse(Request $request)
    {
        $keyword=$request->get('keyword');
        $CourseSearch=Course::where('title','like','%'.$keyword.'%')->get();
        return response()->json($CourseSearch);
    }
    public function searchProduct(Request $request)
    {
        $keyword=$request->get('keyword');
        $ProductSearch=Course::where('title','like','%'.$keyword.'%')->get();
        return response()->json($ProductSearch);
    }
    public function allProducts(){
        $products=Product::all();
        return view('products.index',compact('products'));
    }
}
