@extends('layout.admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Subject</title>
    </head>

    <body>
        <H2>Sửa môn học</H2>
        {!! Form::open(['method' => 'PUT', 'route' => ['subjects.update',$subjects]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name',$subjects->name, ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">

            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', $subjects->description, ['class' => 'form-control', 'placeholder' => 'Please enter description']) !!}
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::select('department_id', $departments, $subjects->department_id, [
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
