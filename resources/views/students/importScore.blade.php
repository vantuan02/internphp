 {{-- Modal --}}
 <div class="modal fade" id="importScoreModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="importModalLabel">Import Students</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             {{-- Sử dụng Laravel Collective để tạo form upload file --}}
             {!! Form::open(['route' => 'students.import_score', 'method' => 'POST', 'files' => true, 'id' => 'importForm']) !!}
                 <div class="form-group">
                     {!! Form::label('file', 'Choose Excel File') !!}
                     {!! Form::file('file', ['class' => 'form-control']) !!}
                 </div>
             {!! Form::close() !!}
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" id="uploadBtn">Upload</button>
         </div>
     </div>
 </div>
</div>