<div class="modal fade" id="delete_exam" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{ route('Quize.destroy','Quize') }}" method="post">
           {{method_field('delete')}}
           @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel">{{ trans('pages/quize.Delete Test') }} </h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p> {{ trans('pages/quize.Warning_Grade') }} </p>
                   <input type="hidden" name="id" id="idmodel" value="">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('pages/quize.Close') }}</button>
                       <button type="submit"
                               class="btn btn-danger">{{ trans('pages/quize.submit') }}</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>
