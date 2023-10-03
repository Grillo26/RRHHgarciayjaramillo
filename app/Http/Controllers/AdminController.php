<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function profile(){
       $id = Auth::user()->id;
       $adminData = User::find($id);
       return view('Backend.admin.profile',compact('adminData'));
    }
    public function editProfile(){
        $id = Auth::user()->id;
        $profileEdit = User::find($id);
        return view('Backend.admin.edit_profile',compact('profileEdit'));
    }
    public function storeProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        if($request->file('p_image')){
            $file = $request->file('p_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data['p_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin profile update successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    // password_change
    public function ChangePassword(){
        return view('Backend.admin.password_change');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $hashPass = Auth::user()->password;
        if(Hash::check($request->old_password,$hashPass)){
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->new_password);
            $user->save();

            session()->flash('message','password updated successfully');
            return redirect()->back();
            }
        else{
            session()->flash('message','password does not match');
            return redirect()->back();
        }
    }
}
