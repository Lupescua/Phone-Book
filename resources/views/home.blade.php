@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{session('message')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <a href="create" type="button" class="btn btn-default" id="add">Add</a>
    @if(count($persons) <= 0)
        <p>No data</p>
    @else
        <table class="table">

            <tr>
                <th>Name</th>    
                <th>Number</th>   
                <th></th> 
                <th></th>                           
            </tr>          
            @foreach ($persons as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->phone_nr }}</td>
                    <td>  {!! Form::open( array( 'method'=>'get','route' => ['edit',$person->id])) !!}
                            {{ Form::submit('Edit', ['class' => 'btn btn-default','id'=>'edit']) }}
                            {{ Form::close() }}</td>
                    <td>{!! Form::open( array( 'route' => ['destroy',$person->id])) !!}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger','id'=>'delete']) }}
                            {{ Form::close() }}</td>
                </tr>
            @endforeach

        </table>                        
    @endif

</div>
@endsection