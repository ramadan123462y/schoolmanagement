<div class="modal fade" id="delete_book" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('book.destroy','book') }}" method="post">
            @method('delete')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;"
                        class="modal-title" id="exampleModalLabel">{{ trans('pages/libraryy.Delete Book') }} </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>  <span class="text-danger"></span></p>
                    <input type="hidden" id="modelid" name="id" value="">
                    <input type="hidden" id="modelfile_name" name="file_name" value="">
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('pages/libraryy.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('pages/libraryy.Submit') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
