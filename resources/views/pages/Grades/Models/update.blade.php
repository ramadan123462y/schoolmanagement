<!-- edit_modal_Grade -->
<div class="modal fade" id="edit_grade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ url('grades/update_grades') }}" method="post">

                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('pages/grades.stadge name') }}(ar)
                                :</label>
                            <input id="m_e_Name" type="text" name="Name" class="form-control" value=""
                                required>
                            <input id="m_e_id" type="hidden" name="id" class="form-control" value="">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('pages/grades.stadge name') }}(en)
                                :</label>
                            <input type="text" class="form-control" id="m_e_Name_en" value="" name="Name_en"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('pages/grades.Notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('pages/grades.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('pages/grades.submit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
