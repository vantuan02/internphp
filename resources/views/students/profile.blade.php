@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">User profile</li>
        </ol>
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

                        <h3 class="profile-username text-center">{{ $student->user->name }}</h3>

                        <p class="text-muted text-center">{{ $student->student_code }}-{{ $student->department->name }}
                        </p>
                    </div>
                    <p class="text-muted text-center">Birthday :
                        {{ $student->birthday }}</p>
                    <p class="text-muted text-center">Gender :
                        {{ $student->gender == 0 ? 'Male' : 'FeMale' }}</p>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Detail</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <h1>My Subjects</h1>
                            <table class="table table-bordered text-center">
                                <tbody>
                                    <tr>
                                        {!! Form::button('Add score', ['class' => 'btn btn-primary add-select', 'id' => 'add-select']) !!}
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
                                                        <div class="col-md-2 d-flex align-items-center">
                                                            {!! Form::button('x', ['class' => 'btn btn-danger remove-button', 'data-id' => '{{ $index }}']) !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </tr>
                                    <br>
                                    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <tr>
                    <td colspan="3">
                        <h4 class="text-danger d-flex justify-content-end">Medium Score:
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
            let scores = @json($student->subjects->pluck('pivot.score', 'id'));

            $('.activity').on('click','.add-select', function(e) {
                e.preventDefault();

                let options = '';
                $.each(subjects, function(id, name) {
                    options += `<option value="${id}">${name}</option>`;
                });

                let selectHTML = 
        `<div class="form-select row mb-3" id="div-${counter}">
          <div class="col-md-5">
            <select name="subjects[]" class="form-control">
              <option value="">Choose a subject</option>
              ${ options }
            </select>
            <span class="error-subject text-danger"></span>
          </div>
          <div class="col-md-5">
            <input type="text" name="scores[]" class="form-control" placeholder="Enter Score">
          </div>
          <div class="col-md-2 d-flex align-items-center">
            <button class="btn btn-danger remove-button" data-id="${counter}">x</button>
          </div>
        </div>`;

                $('#divSelect').append(selectHTML);
                counter++;
                updateSelect();
            });

            $(document).on('click', '.remove-button', function() {
                const id = $(this).data('id');
                $(`#div-${id}`).remove();
                updateSelect();
            });
        });
    </script>
@endpush
