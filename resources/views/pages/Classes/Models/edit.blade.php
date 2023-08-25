
                      <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                      {{ trans('pages/classes.edit_class') }}
                                                                    </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ url('classroom/update_classe') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">   {{ trans('pages/classes.Name_class') }} (ar)
                                                                :</label>
                                                            <input  type="text" name="Name"
                                                                class="form-control"
                                                                id="m_e_Name"
                                                                value=""
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">
                                                                   {{ trans('pages/classes.Name_class') }} (en)   :</label>
                                                            <input type="text" class="form-control"
                                                                value=""
                                                                name="Name_en"
                                                                id="m_e_Name_en"
                                                                required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">   {{ trans('pages/classes.Name_Grade') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="Grade_id">

                                                            @foreach ($Grades as $Grade)
                                                                <option value="{{ $Grade->id }}">
                                                                    {{ $Grade->Name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">   {{ trans('pages/classes.Close') }} </button>
                                                        <button type="submit"
                                                            class="btn btn-success">   {{ trans('pages/classes.submit') }} </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


