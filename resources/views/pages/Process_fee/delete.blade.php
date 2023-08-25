<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('pages/process.Remove Processing Fees') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('process_fee.destroy','process_fee') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="idmodel" value="">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('pages/process.Are you sure about the deletion process?') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('pages/process.Close') }}</button>
                        <button  class="btn btn-danger">{{ trans('pages/process.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
