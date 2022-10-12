<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('adm.user', compact('users'));
    }

    public function user_add (){
        return view('adm.user-add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'profile/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }else{
            unset($input['image']);
        }

        $input['password'] = Hash::make($request->password);
          
        $user = User::create($input);

        $roleIds = [3];
        $user->roles()->attach($roleIds);
    
        return back()->with('status', 'Create user success !');
    }

    public function user_edit(User $user){
        return view('adm.user-edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
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
          
        $roleIds = $input['role'];
        $user->roles()->sync([0=>[ "role_id"=> $roleIds ]]);
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

    public function delete(User $user){
        \File::delete(public_path('profile/'.$user->image));
        $user->roles()->detach();
        $user->delete();
        return redirect('/admin/user')->with('status', 'User deleted !');
    }
}
