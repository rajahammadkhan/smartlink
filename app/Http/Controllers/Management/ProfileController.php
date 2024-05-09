<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{

    public function index()
    {
        return view('management.profile.index');
    }

    public function update(Request $request,$id)
    {
        $users = User::where('id', $id)->first();
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/profile'), $main_file);
        } else {
            $main_file = $users->image;
        }
        $users->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $main_file,
        ]);

        return redirect()->back()->with('success', 'Profile Updated successfully');
    }

    public function password()
    {
        return view('management.profile.password');
    }

    public function updatePassword(Request $request, $id)
    {
        $data = User::where('id', $id)->first();
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);
        $hashedPassword = auth()->user()->password;
        if (Hash::check($request->password, $hashedPassword)) {
            if ($request->new_password == $request->confirm_password) {
                $data->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return redirect()->back()->with('success', 'Password Updated Successfully.');
            } else {
                return redirect()->back()->with('wrong', 'New Password & Confirm Password  do not match, please try again.');
            }
        } else {
            return redirect()->back()->with('wrong', 'You Entered a Wrong Current Password');
        }
    }
}
