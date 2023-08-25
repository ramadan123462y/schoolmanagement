@if($current_step != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{ trans('pages/parents.Email') }}</label>
                    <input type="email" wire:model="Email" class="form-control">
                    @error('Email')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{ trans('pages/parents.Password') }}</label>
                    <input type="password" wire:model="Password" class="form-control">
                    @error('Password')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{ trans('pages/parents.Name_Father') }}</label>
                    <input type="text" wire:model="Name_Father" class="form-control">
                    @error('Name_Father')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{ trans('pages/parents.Name_Father_en') }}</label>
                    <input type="text" wire:model="Name_Father_en" class="form-control">
                    @error('Name_Father_en')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{ trans('pages/parents.Job_Father') }}</label>
                    <input type="text" wire:model="Job_Father" class="form-control">
                    @error('Job_Father')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="title">{{ trans('pages/parents.Job_Father_en') }}</label>
                    <input type="text" wire:model="Job_Father_en" class="form-control">
                    @error('Job_Father_en')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{ trans('pages/parents.National_ID_Father') }}</label>
                    <input type="text" wire:model="National_ID_Father" class="form-control">
                    @error('National_ID_Father')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{ trans('pages/parents.Passport_ID_Father') }}</label>
                    <input type="text" wire:model="Passport_ID_Father" class="form-control">
                    @error('Passport_ID_Father')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{ trans('pages/parents.Phone_Father') }}</label>
                        <input type="text" wire:model="Phone_Father" class="form-control">
                        @error('Phone_Father')
                            <span style="color: red" >{{ $message }}  </span>
                        @enderror
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{ trans('pages/parents.Nationality_Father_id') }}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                        <option selected>{{ trans('pages/parents.Choose') }}...</option>
                        @foreach ($Nationalities as $National)
                            <option value="{{ $National->id }}">{{ $National->Name }}</option>
                        @endforeach
                    </select>
                    @error('Nationality_Father_id')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputState">{{ trans('pages/parents.Blood_Type_Father_id') }}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father_id">
                        <option selected>{{ trans('pages/parents.Choose') }}...</option>
                        @foreach ($Type_Bloods as $Type_Blood)
                            <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->Name }}</option>
                        @endforeach
                    </select>
                    @error('Blood_Type_Father_id')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputZip">{{ trans('pages/parents.Religion_Father_id') }}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                        <option selected>{{ trans('pages/parents.Choose') }}...</option>
                        @foreach ($Religions as $Religion)
                            <option value="{{ $Religion->id }}">{{ $Religion->Name }}</option>
                        @endforeach
                    </select>
                    @error('Religion_Father_id')
                        <span style="color: red" >{{ $message }}  </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{ trans('pages/parents.Address_Father') }}</label>
                <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
                @error('Address_Father')
                    <span style="color: red" >{{ $message }}  </span>
                @enderror
            </div>


            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
            wire:click="next_step({{ $current_step }})"
            type="button">{{ trans('pages/parents.Next') }}
            </button>




        </div>
    </div>
</div>
