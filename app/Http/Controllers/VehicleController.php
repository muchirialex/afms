<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $request->session()->forget('vehicle');
        $vehicles = Vehicle::all();
        return view('vehicles.index',compact('vehicles',$vehicles));
    }

    
    public function createStep1(Request $request)
    {
        $vehicle = $request->session()->get('vehicle');
        return view('vehicles.create-step1',compact('vehicle', $vehicle));
    }


    public function postCreateStep1(Request $request)
    {

        $validatedData = $request->validate([
            'client_name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        if(empty($request->session()->get('vehicle'))){
            $vehicle = new Vehicle();
            $vehicle->fill($validatedData);
            $request->session()->put('vehicle', $vehicle);
        }else{
            $vehicle = $request->session()->get('vehicle');
            $vehicle->fill($validatedData);
            $request->session()->put('vehicle', $vehicle);
        }

        return redirect('/vehicles/create-step2');

    }

    public function createStep2(Request $request)
    {
        $vehicle = $request->session()->get('vehicle');
        return view('vehicles.create-step2',compact('vehicle', $vehicle));
    }

    public function postCreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_make' => 'required',
            'vehicle_model' => 'required',
            'registration_number' => 'required',
            'engine_number' => 'required',
            'chassis_number' => 'required',
        ]);

        if(empty($request->session()->get('vehicle'))){
            $vehicle = new Vehicle();
            $vehicle->fill($validatedData);
            $request->session()->put('vehicle', $vehicle);
        }else{
            $vehicle = $request->session()->get('vehicle');
            $vehicle->fill($validatedData);
            $request->session()->put('vehicle', $vehicle);
        }

        return redirect('/vehicles/create-step3');

    }

    public function createStep3(Request $request)
    {
        $vehicle = $request->session()->get('vehicle');
        return view('vehicles.create-step3',compact('vehicle', $vehicle));
    }

    public function postCreateStep3(Request $request)
    {
        $validatedData = $request->validate([
            'gadget_type' => 'required',
            'condition' => 'nullable',
            'serial' => 'required',
            'warranty' => 'required',
            'issue_date' => 'required',
            'expiry_date' => 'required',
            'validity' => 'required',
            'installer' => 'required',
        ]);

        if(empty($request->session()->get('vehicle'))){
            $vehicle = new Vehicle();
            $vehicle->fill($validatedData);
            $request->session()->put('vehicle', $vehicle);
        }else{
            $vehicle = $request->session()->get('vehicle');
            $vehicle->fill($validatedData);
            $request->session()->put('vehicle', $vehicle);
        }

        return redirect('/vehicles/validate');

    }

    public function validate_details(Request $request)
    {
        $vehicle = $request->session()->get('vehicle');
        return view('vehicles.validate',compact('vehicle', $vehicle));
    }

    public function store(Request $request)
    {
        $vehicle = $request->session()->get('vehicle');
        $vehicle->save();
        return redirect('/vehicles');
    }

    //Search method
    public function search()
    {
        return view('vehicles.search');
    }

    //Show method
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.show')->with('vehicle', $vehicle);
    }
}
