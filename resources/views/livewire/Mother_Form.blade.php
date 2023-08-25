@if ($current_step != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row">
            <div class="col">
                <label for="title">{{trans('pages/parents.Name_Mother')}}</label>
                <input type="text" wire:model="Name_Mother" class="form-control">
                @error('Name_Mother')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{trans('pages/parents.Name_Mother_en')}}</label>
                <input type="text" wire:model="Name_Mother_en" class="form-control">
                @error('Name_Mother_en')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{trans('pages/parents.Job_Mother')}}</label>
                <input type="text" wire:model="Job_Mother" class="form-control">
                @error('Job_Mother')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{trans('pages/parents.Job_Mother_en')}}</label>
                <input type="text" wire:model="Job_Mother_en" class="form-control">
                @error('Job_Mother_en')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{trans('pages/parents.National_ID_Mother')}}</label>
                <input type="text" wire:model="National_ID_Mother" class="form-control">
                @error('National_ID_Mother')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{trans('pages/parents.Passport_ID_Mother')}}</label>
                <input type="text" wire:model="Passport_ID_Mother" class="form-control">
                @error('Passport_ID_Mother')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{trans('pages/parents.Phone_Mother')}}</label>
                <input type="text" wire:model="Phone_Mother" class="form-control">
                @error('Phone_Mother')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{trans('pages/parents.Nationality_Mother_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                    <option selected>{{trans('pages/parents.Choose')}}...</option>
                    @foreach ($Nationalities as $National)
                        <option value="{{ $National->id }}">{{ $National->Name }}</option>
                    @endforeach
                </select>
                @error('Nationality_Mother_id')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">{{trans('pages/parents.Blood_Type_Mother_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Mother_id">
                    <option selected>{{trans('pages/parents.Choose')}}...</option>
                    @foreach ($Type_Bloods as $Type_Blood)
                        <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->Name }}</option>
                    @endforeach
                </select>
                @error('Blood_Type_Mother_id')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">{{trans('pages/parents.Religion_Mother_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                    <option selected>{{trans('pages/parents.Choose')}}...</option>
                    @foreach ($Religions as $Religion)
                        <option value="{{ $Religion->id }}">{{ $Religion->Name }}</option>
                    @endforeach
                </select>
                @error('Religion_Mother_id')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('pages/parents.Address_Mother')}}</label>
            <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('Address_Mother')
                <span style="color: red">{{ $message }} </span>
            @enderror
        </div>

        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
            wire:click="back({{ $current_step }})">
            {{trans('pages/parents.Back')}}
        </button>


        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="next_step2({{ $current_step }})">

           {{trans('pages/parents.Next')}}
        </button>


    </div>
</div>
</div>
