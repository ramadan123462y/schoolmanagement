<div class="modal fade" id="Delete_one" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('pages/promotion.Student Retrieval') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('promotion.destroy', 'test') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id_model" value="">

                    <h5>{{ trans('pages/promotion.Are you sure you want to retrieve the student?') }}</h5>
                    <h5  id="namestudent_model" style="font-family: 'Cairo', sans-serif;">
                         </h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('pages/promotion.Close') }}</button>
                        <button class="btn btn-danger">{{ trans('pages/promotion.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
