@extends('backend.nav')
@section('content')

<div class="card col-md-8">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="mb-0">View Detail & Edit</h3>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif

    <form method="post" action="/shopping/admin/account/update/{{$acc->id}}" enctype="multipart/form-data">
    
        @csrf
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="input-name">
                    <i class="w3-xxlarge fa fa-user"></i>Name
                </label>
                @error('name')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <input type="text" name="name" id="input-name" class="form-control" placeholder="Name" value="{{$acc->name}}"
                    required="" autofocus="">

            </div>
            <div class="form-group">
                <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i> Email
                </label>
                @error('email')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <input type="email" name="email" id="input-email" class="form-control" placeholder="Email" value="{{$acc->email}}"
                    required="">

            </div>
            <div class="form-group">
                <label class="form-control-label" for="input-name">
                    <i class="w3-xxlarge fa fa-address-book-o"></i> Address
                </label>
                @error('address')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <input type="text" name="address" id="input-name" class="form-control" placeholder="Address" value="{{$acc->address}}"
                     >

            </div>
            <div class="form-group">
                <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-phone-square"></i> Number Phone </label>
                @error('phone')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <input type="number" name="phone" id="input-email" class="form-control" placeholder="Number Phone" value="{{$acc->phone}}"
                    >

            </div>

            <div >
                <a href="/shopping/admin/account"class="btn btn-danger mt-4" >Cancel</a>
                <a href="/shopping/admin/account/detail/{{$acc->id}}" class="btn btn-warning mt-4">Reset</a>
                <button type="submit" class="btn btn-success mt-4" name="save">Save</button>
            </div>
        </div>
    </form>


</div>
@stop