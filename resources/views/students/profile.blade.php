@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if (!empty($student->image))
                            <div>
                                <img class="profile-user-img img-responsive img-circle"
                                    src="{{ Storage::url($student->image) }}" alt="" height="100px">
                            </div>
                        @endif

                        <h3 class="profile-username">{{ $student->user->name }}</h3>

                        <p class="text-muted">{{ $student->student_code }}-{{ $student->department->name }}
                        </p>
                    </div>
                    <p class="text-muted">Birthday :
                        {{ $student->birthday }}</p>
                    <p class="text-muted">Gender :
                        {{ $student->gender == 0 ? 'Female' : 'Male' }}</p>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="{{ route('students.registerSubject') }}" data-toggle="tab">Detail</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <h1>My Subjects</h1>
                            @role('student')
                                <a href="{{ route('students.registerSubject') }}">
                                    {!! Form::button('Register Subject', ['class' => 'btn btn-primary']) !!}
                                </a>
                            @endrole
                            <table class="table table-bordered text-center">
                                <tbody>
                                    <tr>
                                        @role('admin')
                                            {!! Form::button('Add score', ['class' => 'btn btn-primary add-select', 'id' => 'add-select']) !!}
                                        @endrole
                                        <hr>
                                        {!! Form::open(['method' => 'Post', 'url' => 'update-score/' . $student->id]) !!}
                                        <div id="divSelect">
                                            @if (old('subjects'))
                                                @foreach (old('subjects') as $index => $select)
                                                    <div class="form-select row mb-3" id="div-{{ $index }}">
                                                        <td>
                                                            <div class="col-md-5">
                                                                {!! Form::select('subjects[], null', $subjects->pluck('name', 'id')->toArray(), old('subjects')[$index], [
                                                                    'class' => 'form-control',
                                                                    'placeholder' => '- Choose subjects -',
                                                                ]) !!}
                                                                @error('subjects.' . $index)
                                                                    <div class="error text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-5">
                                                                {!! Form::text('scores[]', old('scores')[$index], ['class' => 'form-control', 'placeholder' => 'Enter score']) !!}
                                                                @error('scores.' . $index)
                                                                    <div class="error text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <div class="col-md-2 d-flex align-items-center">
                                                            <button type="button" class="btn btn-danger remove-button"
                                                                data-id="{{ $index }}">-</button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach ($studentSubjects as $index => $subjects)
                                                    <div class="form-select row mb-3" id="div-{{ $index }}">
                                                        <div class="col-md-5">
                                                            {!! Form::select('subjects[], null', $subjects->pluck('name', 'id')->toArray(), $subjects->id, [
                                                                'class' => 'form-control',
                                                            ]) !!}
                                                            @error('subjects.' . $index)
                                                                <div class="error text-danger">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-5">
                                                            {!! Form::text('scores[]', $subjects->pivot->score, ['class' => 'form-control', 'placeholder' => 'Enter score']) !!}
                                                            @error('scores' . $index)
                                                                <div class="error text-danger">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        @role('admin')
                                                            <div class="col-md-2 d-flex align-items-center">
                                                                {!! Form::button('x', ['class' => 'btn btn-danger remove-button', 'data-id' => '{{ $index }}']) !!}
                                                            </div>
                                                        @endrole
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </tr>
                                    <br>
                                    @role('admin')
                                        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                                    @endrole
                                    {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <tr>
                    <td colspan="3">
                        <h4 class="text-danger d-flex justify-content-center">Medium Score:
                            {{ round($student->subjects->avg('pivot.score'), 2) }}
                        </h4>
                    </td>
                </tr>
                </tbody>
                </table>
                <ul class="list-group list-group-flush list-unstyled p-2">
                    <h3>Contact :</h3>
                    <li><strong>Email:</strong> {{ $student->user->email }}</li>
                    <li><strong>Phone:</strong> {{ $student->phone }} </li>
                    <li><strong>Address:</strong> {{ $student->address }}</li>
                </ul>
            </div>
        </div>
    </section>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            let subjects = @json($subjects->pluck('name', 'id'));
            let counter = {{ count(old('subjects', [])) }};

            // Hàm tạo options cho select box
            const createOptions = () => Object.entries(subjects)
                .map(([id, name]) => `<option value="${id}">${name}</option>`)
                .join('');

            // Hàm thêm select
            const addSelect = () => {
                $('#divSelect').append(`
                    <div class="form-select row mb-3" id="div-${counter}">
                        <div class="col-md-5">
                            <select name="subjects[]" class="form-control">
                                <option value="">Choose a subject</option>
                                ${createOptions()}
                            </select>
                            <span class="error-subject text-danger"></span>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="scores[]" class="form-control" placeholder="Enter Score">
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button class="btn btn-danger remove-button" data-id="${counter}">x</button>
                        </div>
                    </div>
                `);
                counter++;
            };

            // Sự kiện thêm select mới
            $('.add-select').on('click', function(e) {
                e.preventDefault();
                addSelect();
            });

            // Sự kiện xóa select
            $(document).on('click', '.remove-button', function() {
                $(`#div-${$(this).data('id')}`).remove();
            });
        });
    </script>
@endpush
