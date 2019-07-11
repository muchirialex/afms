<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use File;
use App\User;
use App\Vehicle;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');

        $this->middleware('auth', ['only' => ['admin', 'preview']]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $users = User::orderBy('created_at', 'DESC')->where('type', '!=', 'admin')->paginate(15);
        return view('admin-dashboard')->with('users', $users);
    }

    public function show($id)
    {
        $user = User::find($id);

        $user_id = $user->id;

        //$tasksCompleted = Work::where('worker_id','=', $user_id)->count();

        return view('profiles.show', compact('user', 'tasksCompleted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {   
        $user = User::find($id);

        return view('profiles.edit')->with('user', $user);
    }

    public function editUser($id)
    {   
        $user = User::find($id);

        return view('profiles.editUser')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'status' => 'nullable',
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        $user->status = $request->input('status');
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

        return redirect('/admin')->with('success', 'User details successfully updated');
    }

    public function destroy($id)
    {
        User::find($id)->where('id', $id)->delete();

        return redirect('admin')->with('success', 'User successfully deleted');
    }

    public function vdestroy($id)
    {
        Vehicle::find($id)->where('id', $id)->delete();

        return redirect('vehicles')->with('success', 'Fleet successfully deleted');
    }

    public function exportUsers($type)
	{
		$data = User::get()->toArray();
		return Excel::create('PhotoChamp Users', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
    }
    
    public function stats()
	{
        $workers = User::where('type','=','worker')->count();
        $fleet_vehicles = Vehicle::where('id','!=','')->count();
        $managers = User::where('type','=','manager')->count();
        $admins = User::where('type','=','admin')->count();
        $activeUsers = User::where('status','!=','0')->where('type','=','worker')->count();
        $gadgets = Vehicle::where('condition','!=','0')->count();
        $transferred = Vehicle::where('condition','==', '0')->count();
        
        return view('dashboard', compact('workers','fleet_vehicles', 'managers', 'admins', 'gadgets', 'transferred'));
	}
}
