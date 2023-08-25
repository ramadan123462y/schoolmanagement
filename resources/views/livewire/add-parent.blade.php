<div>
    <div>

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                        class="btn btn-circle {{ $current_step == 1 ? 'btn-success' : 'btn-default' }}">1</a>
                    <p>{{ trans('pages/parents.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $current_step == 2 ? 'btn-success' : 'btn-default' }}">2</a>
                    <p>{{ trans('pages/parents.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $current_step == 3 ? 'btn-success' : 'btn-default' }}"
                        disabled="disabled">3</a>
                    <p>{{ trans('pages/parents.Step3') }}</p>
                </div>
            </div>
        </div>

        @include('livewire.Father_Form')

        @include('livewire.Mother_Form')

        @include('livewire.finish')
    </div>


</div>
