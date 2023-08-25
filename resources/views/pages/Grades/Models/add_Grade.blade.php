   <!-- add_modal_Grade -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                 {{ trans('pages/grades.Add Grade') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{ url('grades/store_grades') }}" method="POST">
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="Name" class="mr-sm-2">
                             {{ trans('pages/grades.Name') }}  (ar) :</label>
                           <input id="Name" type="text" name="Name_ar" class="form-control">
                       </div>
                       <div class="col">
                           <label for="Name_en" class="mr-sm-2">
                              {{ trans('pages/grades.Name') }} (en) :</label>
                           <input type="text" class="form-control" name="Name_en">
                       </div>
                   </div>
                   <div class="form-group">
                       <label for="exampleFormControlTextarea1">
                          {{ trans('pages/grades.Notes') }}  :</label>
                       <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                   </div>
                   <br><br>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('pages/grades.Close') }}</button>
               <button type="submit" class="btn btn-success">{{ trans('pages/grades.submit') }}</button>
           </div>
           </form>

       </div>
   </div>
</div>
{{-- end model add  --}}
