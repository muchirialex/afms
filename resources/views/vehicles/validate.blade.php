@extends('layouts.app')

@section('content')
    <h3>Review vehicle Details</h3>
    <div class="col-sm-12">
    <form action="/vehicles/store" method="post" >
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <td>vehicle Name:</td>
                <td><strong>{{$vehicle->contact_person}}</strong></td>
            </tr>
            <tr>
                <td>vehicle Name:</td>
                <td><strong>{{$vehicle->vehicle_make}}</strong></td>
            </tr>
            <tr>
                <td>vehicle Amount:</td>
                <td><strong>{{$vehicle->vehicle_model}}</strong></td>
            </tr>
            <tr>
                <td>vehicle Company:</td>
                <td><strong>{{$vehicle->registration_number}}</strong></td>
            </tr>
            <tr>
                <td>vehicle Description:</td>
                <td><strong>{{$vehicle->phone}}</strong></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>
@endsection