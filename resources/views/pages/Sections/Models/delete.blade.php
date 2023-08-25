    <!-- delete_modal_Grade -->
    <div class="modal fade"
    id="delete"
    tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;"
                    class="modal-title"
                    id="exampleModalLabel">
                   {{ trans('pages/sections.delete_Section') }}
                </h5>
                <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    action="{{url('section/delete_section')}}"
                    method="post">
                    @csrf

                   {{ trans('pages/sections.Warning_Section') }}
                    <input id="id"
                        type="hidden"
                        name="id"

                        class="form-control"
                        value="">
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('pages/sections.Close') }}</button>
                        <button type="submit"
                            class="btn btn-danger">{{ trans('pages/sections.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
