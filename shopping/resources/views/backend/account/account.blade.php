@extends('backend.nav')
@section('content')

<div class="col-md-12">
    <h2>List Account</h2>
    
   

    
    <form action="" >
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
        @foreach($acc as $acc)
            <tbody>
                <tr>
                    <td>
                       {{$acc->id}}
                    </td>
                    <td>
                    {{$acc->name}}
                    </td>
                    <td>
                    {{$acc->status?"activated":"not activated"}}
                    </td>
                    <td>
                    {{$acc->created_at}}
                    </td>
                    <td>
                        {{$acc->updated_at}}
                    </td>
                    
                    <td>
                        <a href="account/detail/{{$acc->id}}" class="btn btn-success" name="detail">View detail</button>
                        
                    </td>
            </tbody>
            @endforeach
        </table>
    </form>
    

</div>
@stop
