@extends('layout.admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    {!! Form::open(['method' => 'PUT', 'route' => ['departments.update', $departments]]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name',$departments->name, ['class' => 'form-control', 'placeholder' =>  'Please enter name']) !!}

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">

        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', $departments->description, ['class' => 'form-control', 'placeholder' =>  'Please enter description']) !!}
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
</body>

</html>
@endsection