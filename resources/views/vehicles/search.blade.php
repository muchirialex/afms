@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h3>Search Vehicle</h3>
                  <form action="{{URL::to('/search')}}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text blue" id="basic-text1">
                            <i class="fa fa-search text-white"aria-hidden="true"></i>
                          </span>
                        </div>
                        <input class="form-control my-0 py-1" type="text" placeholder="Search" name="q" autocomplete="off">
                    </div>
                  </form>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection