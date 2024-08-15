<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index(){
        return view('backend.Users.index')->with('users',User::all());
    }

    public function create(){
        return view('backend.Users.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed',
        ]);

        $user= new User();

        $user->name= $request->name;
        $user->email= $request->email;
        $user->password=Hash::make($request->password);

        $user->save();
         

        $profile = new Profile();
        
        $profile->profile_pic= $request->profile_pic;
        $profile->user_id= $user->id;

        $profile->save();
    
    return redirect()->route('user');
    }

    public function edit($id){

        $user = User::findOrFail($id);

        return view('backend.Users.update')->with('user',$user);
        
    }

    public function updata(Request $request, User $user) {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:8', // Make password optional
            'profile_pic' => 'nullable|string' // Assuming it's a string
        ]);
    
        // Update user attributes
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Hash the password if it is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        // Update profile if it exists
        if ($user->profile) {
            $user->profile->profile_pic = $request->profile_pic;
            $user->profile->save();
        }
    
        // Save updated user data
        $user->save();
    
        // Redirect to the user route
        return redirect()->route('users');
    }
    
    

    public function destory($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user');
    }
}
