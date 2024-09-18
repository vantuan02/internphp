@extends('layout.admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Student</title>
    </head>

    <body>
        <H2>Add new student</H2>
        {!! Form::open(['method' => 'POST', 'route' => ['students.store'], 'enctype' => 'multipart/form-data']) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('student_code', 'Student code') !!}
            {!! Form::text('student_code', null, ['class' => 'form-control', 'placeholder' => 'Please enter student code']) !!}

            @error('student_code')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Image') !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}

            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('birthday', 'Birthday') !!}
            {{ Form::date('birthday', null, ['class' => 'form-control']) }}

            @error('birthday')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('gender', 'Gender') !!}
            {!! Form::select('gender', ['0' => 'Female', '1' => 'Male']) !!}

            @error('gender')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Phone number') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Please enter phone number']) !!}

            @error('phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">

            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Please enter address']) !!}

            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your email']) !!}

            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">

            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter your password']) !!}

            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', ['0' => 'Studying', '1' => 'Completed', '2' => 'Stopped']) !!}

            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('department_id', 'Department') !!}
            {!! Form::select('department_id', $departments, null, [
                'class' => 'form-control',
                'placeholder' => 'Select a major',
            ]) !!}

            @error('department_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}
    </body>

    </html>
@endsection
