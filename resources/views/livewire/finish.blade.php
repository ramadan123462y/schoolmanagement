<div class="row setup-content" id="step-3"></div>
@if ($current_step != 3)
    <div style="display: none" class="row setup-content" id="step-3">
@endif

<div class="col-xs-12">
    <div class="col-md-12"><br>
        @if ($update_mode == true)
        <label style="color: #ff0000">{{ trans('pages/parents.Updated Now') }} </label>
        @else
        <label style="color: #ff0000">{{ trans('pages/parents.Attachments') }}</label>
        @endif
        <div class="form-group">
            <form>


                @error('photos.*')
                    <span class="error">{{ $message }}</span>
                @enderror

                @if ($update_mode != true)
                <input type="file" wire:model="images" multiple>
                @endif
            </form>
        </div>
        <br>




        <input type="hidden">

        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
            wire:click="back({{ $current_step }})">{{ trans('pages/parents.Back') }}</button>




        @if ($update_mode == true)
        <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="update()" type="button">{{ trans('pages/parents.Finish Update') }}</button>
        @else

            <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="store" type="button">{{ trans('pages/parents.Finish Add') }}</button>
        @endif

    </div>
</div>
