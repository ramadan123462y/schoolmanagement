<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                   {{ trans('pages/sections.add_section') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('section/store_section') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="Name_Section_Ar" class="form-control"
                                placeholder="Section_name_ar">
                        </div>

                        <div class="col">
                            <input type="text" name="Name_Section_En" class="form-control"
                                placeholder="Section_name_en">
                        </div>

                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('pages/sections.Name_Grade') }}</label>
                        <!-- Select box for Grade -->
                        <select name="Grade_id" class="custom-select" id="grade-select">
                            <option value="" selected disabled>{{ trans('pages/sections.Select_Grade') }}</option>
                            @foreach ($list_Grades as $list_Grade)
                                <option value="{{ $list_Grade->id }}">{{ $list_Grade->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="col">
                        <label for="inputName" class="control-label">Name_Teacher</label>
                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <!-- Select box for Class -->
                        <label for="inputName" class="control-label">{{ trans('pages/sections.Name_Class') }}</label>
                        <select name="Class_id" class="custom-select" id="class-select">
                        </select>
                    </div><br>
                    <div class="col">
                        <!-- Select box for Class -->
                        <label for="inputName" class="control-label">{{ trans('pages/sections.Active') }}</label>
                       <input type="checkbox" name="Status" id="">
                    </div><br>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('pages/sections.Close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('pages/sections.submit') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
