<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        return view('adm.profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            \File::delete(public_path('profile/'.$user->image));
            $destinationPath = 'profile/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }else{
            unset($input['image']);
        }
          
        $user->update($input);
    
        return back()->with('status', 'Update profile success !');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($request->password);
          
        $user->update($input);
    
        return back()->with('status', 'Update password success !');
    }
}
