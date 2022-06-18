<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
Use App\User;
class ProfileController extends Controller
{
    public function index()
    {
      $user=Auth::user()->profile;
      return view('profile.index',compact('user'));
    }
    public function edit()
    {
      $user=Auth::user()->profile;
      return view('profile.edit',compact('user'));
    }
    public function update(Request $request){
        $user = Auth::user()->profile;
        if($request->file('image') ==''){
            $name=$user->image;
        }
        else{
            $image="../public/dist/img/user-img/$user->image";
            File::delete($image);
            $file = $request->file('image');
            $Fname=$request->get('name');
            $Lname=$request->get('family');
            $name =Str::random(3).'_'.$Fname.'_'.$Lname.'.'.$file->getClientOriginalExtension();
            $file ->move("uploads/user-img", $name);
        }
        $user->update([
            'image'=>$name,
            'name' => $request->get('name'),
            'family' =>$request->get('family'),
            'phoneNumber' =>$request->get('phoneNumber'),
            'address' =>$request->get('address'),
        ]);

        return redirect()->back()
        ->with(['success'=>"Profile was updated"]);
    }
    public function destroy()
    {
        $user=Auth::user()->profile;
        File::delete('uploads/user-img/'.$user->image);
        $user->image="";
        return redirect()->back()
        ->with(['success'=>"Profile Image was deleted"]);
    }
    public function destroyAccount($id)
    {
        $profile=Auth::user()->profile;
        $user=User::find($id);
        File::delete('uploads/user-img/'.$profile->image);
        $profile->delete();
        $user->delete();
        return redirect('/login')
        ->with(['warning'=>"Account was deleted"]);
    }
}
