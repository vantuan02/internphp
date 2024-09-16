@extends('layout.admin.master')
@section('content')
    <div class="container-fluit mt-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>List Subject</h3>

                    <button class="btn btn-success" onclick="registerSubjects()">Register</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            {!! Form::label('check_all', 'Check all') !!}
                            {!! Form::checkbox('all_subject', null, false, ['id' => 'all_subject']) !!}
                            <th scope="col">Check</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>
                                    @if (!$student->subjects->contains($subject->id))
                                        {!! Form::checkbox('subject_id[]', $subject->id, false, [
                                            'class' => 'subject-checkbox',
                                        ]) !!}
                                    @endif
                                </td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $student->subjects->contains($subject->id) ? 'Registered' : 'Not registered yet!' }}
                                </td>
                                <td>
                                    @if (!$student->subjects->contains($subject->id))
                                        {!! Form::open([
                                            'url' => ['register-subject', $subject->id],
                                            'method' => 'POST',
                                            'onsubmit' => 'return confirm("Are you sure?");',
                                        ]) !!}
                                        {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open([
                                            'url' => ['unregister-subject', $subject->id],
                                            'method' => 'POST',
                                            'onsubmit' => 'return confirm("Are you sure?");',
                                        ]) !!}
                                        {!! Form::submit('Unregister', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subjects->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const selectAllCheckbox = document.getElementById('all_subject');
        const subjectCheckboxes = document.querySelectorAll('.subject-checkbox');

        document.addEventListener('DOMContentLoaded', function() {
            selectAllCheckbox.addEventListener('change', function() {
                subjectCheckboxes.forEach(checkbox => checkbox.checked = this.checked);
            });

            subjectCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    selectAllCheckbox.checked = Array.from(subjectCheckboxes).every(cb => cb
                        .checked);
                });
            });
        });

        const registerSubjects = () => {
            let moreSubjectsCheckbox = [];
            subjectCheckboxes.forEach(item => {
                if (item.checked) {
                    moreSubjectsCheckbox.push(item.value);
                }
            });

            $.ajax({
                url: 'register-more-subject',
                method: 'POST',
                data: {
                    moreSubjectsCheckbox: moreSubjectsCheckbox
                },
                success: function(data) {
                    window.location.href = data.redirect_url;
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    for (var key in errors) {
                        $('#' + key + '-error').text(errors[key][0]);
                    }
                }
            });
        }
    </script>
@endpush
