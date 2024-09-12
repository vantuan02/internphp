@extends('layout.admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Department</title>
    </head>

    <body>
        <H2>Create new department</H2>
        {!! Form::open(['method' => 'POST', 'route' => ['departments.store']]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>  'Please enter name']) !!}

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">

            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' =>  'Please enter description']) !!}
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </body>

    </html>
@endsection
