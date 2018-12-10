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

    @if(isset($person))
        {!! Form::model($person, array( 'route' => $route)) !!}
        {{ Form::hidden('id', null, ['value' => $person->id]) }}
    @else
        {!! Form::open( array( 'route' => $route)) !!}
    @endif

    <div class="form-group row">
        {{ Form::label('Name', null, ['class' => 'col-md-2 col-form-label']) }}
        <div class="col-md-10">  
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col">
        {{ Form::label('Phone Number', null, ['class' => 'row col-md-2']) }}
        {{ Form::label('Example: 07********', null, ['class' => 'row col-md-2']) }}
        </div>
        <div class="col-md-10">  
            {{ Form::text('phone_nr', null, ['class' => 'form-control']) }}
        </div>
    </div>

    {{ Form::submit('Save', ['class' => 'btn btn-lg btn-primary pull-right','id'=>'save']) }}
    {{ Form::close() }}
    
</div>
@endsection