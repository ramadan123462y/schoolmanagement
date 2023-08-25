<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                    {{ trans('pages/sections.edit_Section') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('section/update_section') }}" method="POST">

                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="Name_Section_Ar" class="form-control"
                                value="{{ $section->getTranslation('Name_Section', 'ar') }}">
                        </div>

                        <div class="col">
                            <input type="text" name="Name_Section_En" class="form-control"
                                value="{{ $section->getTranslation('Name_Section', 'en') }}">
                            <input id="id" type="hidden" name="id" class="form-control"
                                value="{{ $section->id }}">
                        </div>

                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('pages/sections.Name_Grade') }}</label>
                        <select name="Grade_id" class="custom-select" onclick="console.log($(this).val())">
                            <!--placeholder-->
                            <option value="{{ $section->grade_id }}">
                                {{ \App\Models\Grade::find($section->grade_id)->Name }}
                            </option>
                            @foreach ($list_Grades as $list_Grade)
                                <option value="{{ $list_Grade->id }}">
                                    {{ $list_Grade->Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('pages/sections.Name_Class') }}</label>
                        <select name="Class_id" class="custom-select">
                            <option value="{{ $section->classroom_id }}">
                                {{ \App\Models\Classroom::find($section->classroom_id)->Name_Class }}
                            </option>
                        </select>
                    </div>
                    <br>
                    <div class="col">
                        <label for="inputName"
                            class="control-label">{{ trans('pages/sections.Name_Teacher') }}</label>
                        <select multiple name="teacher_id[]" class="form-control"
                            id="exampleFormControlSelect2">
                            @foreach ($section->teachers as $teacher)
                                <option selected value="{{ $teacher['id'] }}">
                                    {{ $teacher['Name'] }}
                                </option>
                            @endforeach

                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">
                                    {{ $teacher->Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <div class="form-check">

                            @if ($section->Status === 1)
                                <input type="checkbox" checked class="form-check-input" name="Status"
                                    id="exampleCheck1">
                            @else
                                <input type="checkbox" class="form-check-input" name="Status" id="exampleCheck1">
                            @endif
                            <label class="form-check-label"
                                for="exampleCheck1">{{ trans('pages/sections.Active') }}</label><br>


                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('pages/classes.Close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('pages/classes.submit') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
