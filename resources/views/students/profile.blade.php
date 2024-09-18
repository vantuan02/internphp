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
                <h1>My Subjects</h1>
                @role('student')
                    <a href="{{ route('students.registerSubject') }}">
                        {!! Form::button('Register Subject', ['class' => 'btn btn-primary']) !!}
                    </a>
                @endrole
                @role('admin')
                    {!! Form::button('Add score', ['class' => 'btn btn-primary add-select', 'id' => 'add-select']) !!}
                @endrole
                <hr>
                {!! Form::open(['method' => 'Post', 'id' => 'formUpdateScore', 'url' => 'update-score/' . $student->id]) !!}
                <div id="divSelect">
                    @if (old('subjects'))
                        @foreach (old('subjects') as $index => $select)
                            <div class="form-select row mb-3" id="div-{{ $index }}">
                                <div class="col-md-5">
                                    {!! Form::select('subjects[]', $subjects->pluck('name', 'id')->toArray(), old('subjects')[$index], [
                                        'class' => 'form-control subject-select',
                                        'placeholder' => '- Choose subjects -',
                                    ]) !!}
                                    @error('subjects.' . $index)
                                        <span class="error-subject text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    {!! Form::text('scores[]', old('scores')[$index], ['class' => 'form-control', 'placeholder' => 'Enter score']) !!}
                                    @error('scores.' . $index)
                                        <span class="error-score text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="button" class="btn btn-danger remove-button"
                                        data-id="{{ $index }}">x</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($studentSubjects as $index => $subjects)
                            <div class="form-select row mb-3" id="div-{{ $index }}">
                                <div class="col-md-5">
                                    {!! Form::select('subjects[]', $subjects->pluck('name', 'id')->toArray(), $subjects->id, [
                                        'class' => 'form-control subject-select',
                                    ]) !!}
                                    @error('subjects.' . $index)
                                        <span class="error-subject text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    {!! Form::text('scores[]', $subjects->pivot->score, ['class' => 'form-control', 'placeholder' => 'Enter score']) !!}
                                    @error('scores.' . $index)
                                        <span class="error-score text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="button" class="btn btn-danger remove-button"
                                        data-id="{{ $index }}">x</button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @role('admin')
                    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                @endrole
                {!! Form::close() !!}
                <hr>
                <h4 class="text-danger d-flex justify-content-center">Medium Score:
                    {{ round($student->subjects->avg('pivot.score'), 2) }}
                </h4>
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
            let scores = @json($student->subjects->pluck('pivot.score', 'id'));

            $('.add-select').on('click', function(e) {
                e.preventDefault();
                addSelect();
            });

            const addSelect = () => {
                let selectedSubjects = getSelectedSubjects();
                $('#divSelect').append(`
            <div class="form-select row mb-3" id="div-${counter}">
                <div class="col-md-5">
                    <select name="subjects[]" class="form-control subject-select">
                        <option value="">Chọn môn học</option>
                        ${createOptions(selectedSubjects)}
                    </select>
                    <span class="error-subject text-danger"></span>
                </div>
                <div class="col-md-5">
                    <input type="text" name="scores[]" class="form-control">
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <button class="btn btn-danger remove-button" data-id="${counter}">x</button>
                </div>
            </div>
        `);
                counter++;
                updateSelectOptions();
            };

            const createOptions = (selectedSubjects = [], currentSubject = null) => {
                return Object.entries(subjects)
                    .filter(([id, name]) => {
                        return !selectedSubjects.includes(parseInt(id)) || parseInt(id) === parseInt(
                            currentSubject);
                    })
                    .map(([id, name]) => `<option value="${id}">${name}</option>`)
                    .join('');
            };

            const getSelectedSubjects = () => {
                return $('.subject-select').map(function() {
                    return $(this).val() ? parseInt($(this).val()) : null;
                }).get().filter(val => val !== null);
            };

            const updateSelectOptions = () => {
                let selectedSubjects = getSelectedSubjects();
                $('.subject-select').each(function() {
                    let currentValue = $(this).val();
                    console.log('Current value:', currentValue);
                    $(this).html(createOptions(selectedSubjects,
                        currentValue));
                    $(this).val(currentValue);
                    console.log('After update:', $(this).val());
                });
            };

            //Xóa select
            $(document).on('click', '.remove-button', function() {
                $(this).closest('.form-select')
                    .remove();
                updateSelectOptions();
            });

            //Update giá trị select
            $(document).on('change', '.subject-select', function() {
                updateSelectOptions();
            });

            // $('#formUpdateScore').on('submit', function(e) {
            //     e.preventDefault(); // Dừng việc gửi form để kiểm tra dữ liệu
            //     let formData = $(this).serializeArray(); // Lấy tất cả giá trị của form
            //     console.log(formData); // In ra giá trị của form vào console để kiểm tra
            //     // Sau khi kiểm tra, bạn có thể gửi form bằng cách bỏ dòng e.preventDefault();
            // });

            updateSelectOptions();
        });
    </script>
@endpush
