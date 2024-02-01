<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    public function UpdateProfileImage(Request $request){
        $request->validate([
          'image'=>'required'
        ]);
        $img = Profile::where('user_name',session()->get('user')['userName'])->first();
        $path = '/home/u422765265/domains/imeasycash.com/public_html/public/profile-images';
        try{
          if(\File::exists($path.'/'.$img->image)){
            \File::delete($path.'/'.$img->image);
            $imageName = time().'.'.$request['image']->extension();
            Profile::where('user_name',session()->get('user')['userName'])->update(['image'=>$imageName]);
            $request->file('image')->move($path, $imageName);
            session()->flash('success','Profile Image Changed!');
            return redirect('/admin/profile');
          }else{
            $imageName = time().'.'.$request['image']->extension();
            Profile::where('user_name',session()->get('user')['userName'])->update(['image'=>$imageName]);
            $request->file('image')->move($path, $imageName);
            session()->flash('success','Profile Image Changed!');
            return redirect('/admin/profile');
          }
        }catch(Exception $e){
          return abort(500);
        }
      }

      public function ProfileUpdate(Request $request){
        try{
            $profile_img = Profile::where('user_name',session()->get('user')['userName'])->update([
              'full_name'=>$request['full_name'],
              'phone'=>$request['phone'],
              'address'=>$request['address'],
              'city'=>$request['city'],
            ]);
          }catch(Exception $q){
              return abort(500);
          }
        session()->flash('success','Profile Updated!');
        return redirect('/admin/profile'); 
      }

      public function ChangePassword(Request $request){
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $new_pass = Hash::make($request['password']);
        try{
            User::where('user_name',session()->get('user')['userName'])->update(['password'=>$new_pass]);
            session()->flash('success',"Password Changed!");
            return redirect()->back();
          }catch(Exception $e){
            return abort(500);
        }
    }
}
