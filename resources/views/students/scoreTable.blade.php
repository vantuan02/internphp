@extends('layout.admin.master')
@section('content')
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Name </th>
                @foreach ($subjects as $subject)
                    <th scope="col">{{ $subject->name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>{{ $subject->pivot->score ?? 'No score' }}</td>
            </tr>
        </tbody>
    </table>
@endsection
