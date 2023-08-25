<div class="modal fade" id="delete_subject" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('subject.destroy','subject') }}" method="post">
            {{ method_field('delete') }}
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('pages/Subject.Delete Subject') }}
                        </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> {{ trans('pages/Subject.Warning_Grade') }} </p>
                    <input type="hidden" name="id" id="idmodel" value="">
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('pages/Subject.Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('pages/Subject.submit') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
