<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Fee_invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('pages/invoice.Delete Invoice') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('invoice.destroy','invoice') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id" value="">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('pages/invoice.Are you sure you want to proceed with the deletion process?') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('pages/invoice.Close') }}</button>
                        <button  class="btn btn-danger">{{ trans('pages/invoice.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
