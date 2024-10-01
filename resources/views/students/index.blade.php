@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin sinh viên
            <small>Control panel</small>
        </h1>
    </section>
    </form>
    <hr>
    <div class="form-inline">
        {!! Form::open(['route' => ['students.index'], 'method' => 'get']) !!}
        <div class="row">
            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('from_age', 'Age From:') !!}
                    {!! Form::text('from_age', request('from_age'), [
                        'class' => 'form-control',
                        'placeholder' => 'Enter age..',
                    ]) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('to_age', 'To Age:') !!}
                    {!! Form::text('to_age', request('to_age'), [
                        'class' => 'form-control',
                        'placeholder' => 'Enter age..',
                    ]) !!}
                </div>
            </div>

            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::label('from_score', 'Score From:') !!}
                    {!! Form::text('from_score', request('from_score'), [
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
                    {!! Form::text('to_score', request('to_score'), [
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
                    {!! Form::checkbox('type_phone[]', 'viettel', in_array('viettel', (array) request('type_phone', []))) !!}
                    <br>
                    {!! Form::label('mobi', 'Mobi') !!}
                    {!! Form::checkbox('type_phone[]', 'mobi', in_array('mobi', (array) request('type_phone', []))) !!}
                    <br>
                    {!! Form::label('vina', 'Vina') !!}
                    {!! Form::checkbox('type_phone[]', 'vina', in_array('vina', (array) request('type_phone', []))) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content">
            {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    {!! Form::open(['route' => 'students.index', 'method' => 'GET']) !!}
    {!! Form::label('perPage', 'Records per page:') !!}

    {!! Form::select(
        'perPage',
        [
            100 => '100',
            1000 => '1000',
            3000 => '3000',
        ],
        request('perPage'),
        ['onchange' => 'this.form.submit()'],
    ) !!}

    {!! Form::close() !!}

    <hr>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
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
                <div class="row">
                        <button class="btn btn-primary"><a href="{{ route('students.create') }}"
                                style="color: #fff;">{{ __('Create') }}</a></button>
                                
                    <div class="col-lg-2">
                        <a href="{{ route('students.export') }}" class="btn btn-primary">Export student to Excel</a>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">
                        Import Students
                    </button>

                </div>
                <hr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            {!! Form::open([
                                'route' => ['students.profile', $student],
                                'method' => 'get',
                            ]) !!}
                            {!! Form::submit('Detail', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </td>
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
    </div>
    @include('students.edit')
    @include('students.importStudent')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // console.log(1111);

            $('.updateStudentBtn').click(function(e) {
                e.preventDefault();

                const studentId = $(this).data('id');

                // Gọi AJAX để lấy thông tin chi tiết của sinh viên
                $.ajax({
                    type: 'GET',
                    url: '/students/' + studentId + '/edit',
                    success: function(response) {

                        $('#edit-id').val(studentId);
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                        $('#student_code').val(response.student_code);
                        if (response.image) {
                            $('#image-preview').attr('src', '/storage/' + response.image);
                        } else {
                            $('image-show').css('display', 'none');
                        }
                        $('#birthday').val(response.birthday);
                        $('#gender').val(response.gender);
                        $('#phone').val(response.phone);
                        $('#address').val(response.address);
                        $('#status').val(response.status);
                        $('#department_id').val(response.department_id);

                        $('#editStudentModal').modal('show');

                    }
                });
            });

            $('#uploadBtn').click(function() {
                $('#importForm').submit(); // Submit form upload file
            });

            $('#closeModal').on('click', function() {
                $('#editStudentModal').modal('hide');
            });

            $('#uploadBtn').click(function() {
                $('#importForm').submit(); // Submit form upload file
            });

            $('#updateStudentForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#edit-id').val();

                var formUrl = '/students/' + id;
                var formData = new FormData(this);
                formData.append('_method', 'PUT');

                $.ajax({
                    url: formUrl,
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        $('#updateStudentModal').modal('hide');

                        window.location.href = response.redirect_url;

                    },
                    error: function(response) {
                        // Clear previous errors
                        $('#error-name').text('');
                        $('#error-student_code').text('');
                        $('#error-birthday').text('');
                        $('#error-gender').text('');
                        $('#error-phone').text('');
                        $('#error-address').text('');
                        $('#error-status').text('');
                        $('#error-department_id').text('');


                        // You can clear other errors similarly

                        // Check for validation errors in the response
                        if (response.status === 422) {
                            var errors = response.responseJSON.errors;

                            // Display errors for each field
                            if (errors.name) {
                                $('#error-name').text(errors.name[0]);
                            }
                            if (errors.student_code) {
                                $('#error-student_code').text(errors.student_code[0]);
                            }
                            if (errors.birthday) {
                                $('#error-birthday').text(errors.birthday[0]);
                            }
                            if (errors.gender) {
                                $('#error-gender').text(errors.gender[0]);
                            }
                            if (errors.phone) {
                                $('#error-phone').text(errors.phone[0]);
                            }
                            if (errors.address) {
                                $('#error-address').text(errors.address[0]);
                            }
                            if (errors.status) {
                                $('#error-status').text(errors.status[0]);
                            }
                            if (errors.department_id) {
                                $('#error-department_id').text(errors.department_id[0]);
                            }
                            // Add other fields similarly
                        } else {
                            alert('An unexpected error occurred.');
                        }
                    }
                });
            });
        });
    </script>
@endpush
