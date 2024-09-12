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
        <H2>Thêm mới môn học</H2>
        {!! Form::open(['method' => 'POST', 'route' => ['subjects.store']]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">

            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Please enter description']) !!}
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
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
