<!-- delete_modal_Grade -->
<div class="modal fade" id="delete_grade" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
              Delete Grade
            </h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('grades/delete_grade') }}" method="post">

                @csrf

                <input  type="hidden" name="id" id="m_d_id"  class="form-control"  value="2">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-danger">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
