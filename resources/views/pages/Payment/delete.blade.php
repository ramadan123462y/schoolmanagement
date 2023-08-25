<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('pages/payment.Delete Payment Voucher') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('payment.destroy','payment') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="m_d_id" value="">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('pages/payment.Are you sure you want to delete?') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('pages/payment.Close') }}</button>
                        <button  class="btn btn-danger">{{ trans('pages/payment.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
