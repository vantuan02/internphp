@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin môn học
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thông tin môn học</li>
        </ol>
    </section>
    @role('admin')
        <button class="btn btn-primary"><a href="{{ route('subjects.create') }}" style="color: #fff;">Thêm</a></button>
    @endrole
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>

                @role('admin')
                    <th scope="col">Action</th>
                @endrole
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    
                    @role('admin')
                        <td>
                            <a href="{{ route('subjects.edit', $item->id) }}">
                                {!! Form::button('Edit', ['class' => 'btn btn-success']) !!}
                            </a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['subjects.destroy', $item->id]]) !!}
                            {!! Form::submit('Delete', [
                                'class' => 'btn btn-danger',
                                'onclick' => "return confirm('Bạn có muốn xóa không?')",
                            ]) !!}
                            {!! Form::close() !!}
                        </td>
                    @endrole
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $subjects->links() }}
@endsection
