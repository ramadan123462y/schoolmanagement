 <!-- add_modal_class -->
 <div class="modal fade" id="add_classes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-lg">
     <div class="modal-content">
         <div class="modal-header">
             <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ trans('pages/classes.add_class') }}             </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">

             <form class=" row mb-30" action="{{ url('classroom/store_classes') }}" method="POST">
                 @csrf
                 <div class="card-body">
                     <div class="repeater">
                         <div data-repeater-list="List_Classes">
                             <div data-repeater-item>
                                 <div class="row">

                                     <div class="col">
                                         <label for="Name"
                                             class="mr-sm-2">{{ trans('pages/classes.Name_class') }}(ar)
                                             :</label>
                                         <input class="form-control" type="text" name="Name" />
                                     </div>


                                     <div class="col">
                                         <label for="Name"
                                             class="mr-sm-2">{{ trans('pages/classes.Name_class') }}(en)
                                             :</label>
                                         <input class="form-control" type="text" name="Name_class_en" />
                                     </div>


                                     <div class="col">
                                         <label for="Name_en"
                                             class="mr-sm-2">{{ trans('pages/classes.Name_Grade') }}
                                             :</label>

                                         <div class="box">
                                             <select class="fancyselect" name="Grade_id">
                                                 @foreach ($Grades as $Grade)
                                                     <option value="{{ $Grade->id }}">{{ $Grade->Name }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                         </div>

                                     </div>

                                     <div class="col">
                                         <label for="Name_en"
                                             class="mr-sm-2">{{ trans('pages/classes.Processes') }}
                                             :</label>
                                         <input class="btn btn-danger btn-block" data-repeater-delete
                                             type="button"
                                             value="delete_row" />
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row mt-20">
                             <div class="col-12">
                                 <input class="button" data-repeater-create type="button"
                                     value="add_row" />
                             </div>

                         </div>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary"
                                 data-dismiss="modal">{{ trans('pages/classes.Close') }}</button>
                             <button type="submit"
                                 class="btn btn-success">{{ trans('pages/classes.submit') }}</button>
                         </div>


                     </div>
                 </div>
             </form>
         </div>


     </div>

 </div>

</div>
