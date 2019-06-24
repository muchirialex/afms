<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as Input;
use Hash;
use App\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function show($id)
    {
        $user = Auth::user();

        //$tasksDone = Work::where('worker_id','=', Auth::user()->id)->count();

        return view('/users/show', compact('user', 'tasksDone'));
    }

    public function edit($id)
    {   
        $user = Auth::user();

        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => 'required',
            'bio' => 'required',
            'identification' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postalcode' => 'required',
            'twitter' => 'nullable'
        ]);

        //Handle File Upload
        if($request->hasFile('profile_image')){
            //Get File name with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //File name to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);

        }

        // Create User
        $user = Auth::user();
        $user->phone = $request->input('phone');
        $user->bio = $request->input('bio');
        $user->identification = $request->input('identification');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->postalcode = $request->input('postalcode');
        $user->twitter = $request->input('twitter');

        if($request->hasFile('profile_image')){
            $user->profile_image = $fileNameToStore;
        }
        
        $user->save();

        return redirect('users/show')->with('success', 'User details successfully updated');
    }
    
    public function changepassword()
    {
        $user = Auth::user();

        if(Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation')){
            
            $user->password = bcrypt(Input::get('password'));
            $user->save();

            Auth::logout();
            // alertify()->error('success', 'Password changed successfully')->delay(3000)->position('bottom right');
            return redirect('/')->with('success', 'Your Password was successfully  changed');
        }
        else {
            alertify()->error('Password not changed!')->delay(3000)->position('bottom right');
            return redirect()->back();
        }
    }
}
