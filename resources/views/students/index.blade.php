@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin sinh viên
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thông tin sinh viên</li>
        </ol>
    </section>
    </form>
    <hr>
    <div class="form-inline">
        {!! Form::open(['route' => ['students.index'], 'method' => 'get']) !!}
        <div class="row">
            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('from_age', 'Age From:') !!}
                    {!! Form::text('from_age', old('from_age'), [
                        'class' => 'form-control',
                        'placeholder' => 'Enter age..',
                    ]) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('to_age', 'To Age:') !!}
                    {!! Form::text('to_age', old('to_age'), [
                        'class' => 'form-control',
                        'placeholder' => 'Enter age..',
                    ]) !!}
                </div>
            </div>

            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('from_score', 'Score From:') !!}
                    {!! Form::text('from_score', old('from_score'), [
                        'class' => 'form-control',
                        'placeholder' => 'Enter score..',
                        'min' => 0,
                        'max' => 10,
                    ]) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('to_score', 'To Score:') !!}
                    {!! Form::text('to_score', old('to_score'), [
                        'class' => 'form-control',
                        'placeholder' => 'Enter score..',
                        'min' => 0,
                        'max' => 10,
                    ]) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('viettel', 'Viettel') !!}
                    {!! Form::checkbox('type_phone[]', 'viettel') !!}
                    <br>
                    {!! Form::label('mobi', 'Mobi') !!}
                    {!! Form::checkbox('type_phone[]', 'mobi') !!}
                    <br>
                    {!! Form::label('vina', 'Vina') !!}
                    {!! Form::checkbox('type_phone[]', 'vina') !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-end">
            {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Action</th>
                <th scope="col">ID</th>
                <th scope="col">Student Code</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Image</th>
                <th scope="col">Birthday</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Department</th>
                <th scope="col">Total Subject</th>
                <th scope="col">GPA</th>
                <th scope="col">Action</th>
            </tr>
            <hr>
            <button class="btn btn-primary"><a href="{{ route('students.create') }}"
                    style="color: #fff;">{{ __('Create') }}</a></button>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>
                        {!! Form::open([
                            'route' => ['students.profile', $student],
                            'method' => 'get',
                        ]) !!}
                        {!! Form::submit('Detail', ['class' => 'btn btn-warning']) !!}
                        {!! Form::close() !!}</td>
                    </td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_code }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>
                        {!! $student->gender ? 'Male' : 'Female' !!}
                    </td>
                    <td>
                        @if (!empty($student->image))
                            <div>
                                <img src="{{ Storage::url($student->image) }}" alt="" height="100px">
                            </div>
                        @endif
                    </td>
                    <td>{{ $student->birthday }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                        @if ($student->status == 0)
                            <span class="badge bg-blue">{{ __('Studying') }}</span>
                        @elseif($student->status == 1)
                            <span class="badge bg-red">{{ __('Stopped') }}</span>
                        @elseif($student->status == 2)
                            <span class="badge bg-green">{{ __('Completed') }}</span>
                        @endif
                    </td>
                    <td>{{ $student->department->name }}</td>
                    <td>{{ $student->subjects_count }}</td>
                    <td>
                        @php
                            $gpa = $student->subjects ? round($student->subjects->avg('pivot.score'), 2) : null;
                        @endphp
                        {{ $gpa ? $gpa : 'No score' }}
                    </td>
                    <td>
                        {!! Form::button('Edit', [
                            'class' => 'btn btn-success updateStudentBtn',
                            'id' => 'updateStudentBtn',
                            'data-id' => $student->id,
                            'data-toggle' => 'modal',
                            'data-target' => '#editStudentModal',
                        ]) !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $student->id]]) !!}
                        {!! Form::submit('Delete', [
                            'class' => 'btn btn-danger',
                            'onclick' => "return confirm('Do you want to delete?')",
                        ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->appends(request()->all())->links() }}

    @include('students.edit')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log(1111);
            
            $('.updateStudentBtn').click(function(e) {
                e.preventDefault();

                const studentId = $(this).data('id');
                // var name = $(this).data('name');
                // var email = $(this).data('email');
                // var student_code = $(this).data('student_code');
                // var image = $(this).data('image');
                // var birthday = $(this).data('birthday');
                // var gender = $(this).data('gender');
                // var phone = $(this).data('phone');
                // var status = $(this).data('status');
                // var department_id = $(this).data('department_id');


                // Gọi AJAX để lấy thông tin chi tiết của sinh viên
                $.ajax({
                    type: 'GET',
                    url: '/students/' + studentId + '/edit',
                    success: function(response) {
                        // Cập nhật giá trị của các trường trong form
                        // $('#studentId').val(studentId);
                        // $('#name').val(name);
                        // $('#email').val(email);
                        // $('#student_code').val(student_code);
                        // $('#image').val(image);
                        // $('#birthday').val(birthday);
                        // $('#gender').val(gender);
                        // $('#phone').val(phone);
                        // $('#status').val(status);
                        // $('#department_id').val(department_id);
                        $('#editStudentModal').modal('show');

                    }
                });

                // Cập nhật URL cho form cập nhật
                $('#updateStudentForm').attr('action', '/students/update/' + studentId);
            });


            $('#closeModal').on('click', function() {
                $('#editStudentModal').modal('hide');
            });

            $('#updateStudentForm').on('submit', function(e) {
                e.preventDefault();

                var formUrl = $(this).attr('data-url');

                $.ajax({
                    url: formUrl,
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        $('#updateStudentModal').modal('hide');
                        location
                            .reload();
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        var errorHtml = '<ul>';
                        $.each(errors, function(key, value) {
                            errorHtml += '<li>' + value + '</li>';
                        });
                        errorHtml += '</ul>';
                        alert('Error:\n' + errorHtml);
                    }
                });
            });
        });
    </script>
@endpush
