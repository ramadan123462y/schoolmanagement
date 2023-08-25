<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('pages/recipt.Delete Receipt') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('recipt.destroy','recipt') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="idmodel"  value="">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('pages/recipt.Are you sure you want to proceed with the deletion?') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  class="btn btn-danger">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
