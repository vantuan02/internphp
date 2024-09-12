
<!-- Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url' => '','id' => 'updateStudentForm', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id', null, ['id' => 'edit-id']) !!}
            <div>
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name']) !!}
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('student_code', 'Student code') !!}
                {!! Form::text('student_code', old('student_code'), ['class' => 'form-control', 'id' => 'student_code']) !!}
                @error('student_code')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', old('image'), ['class' => 'form-control', 'id' => 'image']) !!}
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('birthday', 'Birthday') !!}
                {!! Form::date('birthday', old('birthday'), ['class' => 'form-control', 'id' => 'birthday']) !!}
                @error('birthday')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('gender', 'Gender') !!}
                {!! Form::select('gender', [0 => __('Female'), 1 => __('Male')], old('gender'), [
                    'class' => 'form-control',
                    'id' => 'gender',
                ]) !!}
                @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('phone', 'Phone number') !!}
                {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'id' => 'phone']) !!}
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('address', 'Address') !!}
                {!! Form::text('address', old('address'), ['class' => 'form-control', 'id' => 'address']) !!}
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('status', 'Status') !!}
                {!! Form::select('status', [0 => __('Studying'), 1 => __('Stopped'), 2 => __('Completed')], old('status'), [
                    'class' => 'form-control',
                    'id' => 'status',
                ]) !!}
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
    
            <div>
                {!! Form::label('department_id', 'Departments') !!}
                {!! Form::select('department_id', $departments, old('department_id'), [
                    'class' => 'form-control',
                    'id' => 'department_id',
                ]) !!}
                @error('department_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <hr>
            {!! Form::submit('Update') !!}
    
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>