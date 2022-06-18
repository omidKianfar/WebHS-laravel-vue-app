<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseReaquest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all()->sortBy('id');
        return view('admin.courses.index',compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseReaquest $request)
    {
        if($request->file('image')==""){
            $name="";
        }
            else{
            $file = $request->file('image');
            $name =Str::random(5).'_'.$file->getClientOriginalName();
            $file ->move("uploads/course-img", $name);
        }
        $course=Course::create([
            'image' => $name,
            'title'=> $request->get('title'),
            'description'=> $request->get('description'),
        ]);
        return redirect()->back()
        ->with(['success'=>"New course with Id:$course->id was created"]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::findOrFail($id);
        return view('admin.courses.show',compact('course'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::find($id);
        return view('admin.courses.edit',compact('course'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(courseReaquest $request, $id)
    {
        if($request['image'] ==''){
            $course = course::find($id);
            $name=$course->image;
        }
        else{
            $course = Course::find($id);
            $image="uploads/course-img/$course->image";
            File::delete($image);
            $file = $request->file('image');
            $name =Str::random(5).'_'.$file->getClientOriginalName();
            $file ->move("uploads/course-img", $name);
        }
        Course::findOrFail($id)->update([
            'image' => $name,
            'title'=> $request->get('title'),
            'description'=> $request->get('description'),
        ]);
        return redirect()->back()
        ->with(['success'=>"course with Id:$id was updated"]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::findOrFail($id);
        $file="uploads/course-img/".$course->image;
        File::delete($file);
        $course->delete();
        return redirect()->back()
        ->with(['danger'=>"course with   Id: $course->id   and   Title: $course->title  and ...   was deleted"]);
    }
}
