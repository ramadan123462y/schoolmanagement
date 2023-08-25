<!-- Deleted inFormation Student -->
<div class="modal fade" id="Return_Student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Retrieve Student
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('graduate/update') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id_model" value="">

                    <h5 style="font-family: 'Cairo', sans-serif;">Are you sure you want to cancel the graduation
                        process?</h5>
                    <input type="text" readonly value="" id="namestudent_model" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
