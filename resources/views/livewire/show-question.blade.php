<div>

    <div>
        <div>

            <div class="card card-statistics mb-30">
                <div class="card-body">
                    @php
                        $quize;
                    @endphp
                    @if (!empty($questions[$count]))



                    <h5 class="card-title">{{ $questions[$count]->title }} </h5>
                    {{ trans('dashboardes/studentDashboard.Number Question') }}:{{ $count }}

                    {{ trans('dashboardes/studentDashboard.Sum Degree') }}: {{ $degree }}

                    @foreach (preg_split('/(-)/', $questions[$count]->answers) as $answer)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="{{ $answer }}"
                                value="{{ $answer }}" inh>
                            <label class="form-check-label" for="{{ $answer }}"
                                wire:click='nextquestion("{{ $questions[$count]->right_answer }}", "{{ $answer }}",{{ $questions[0]->score }})'>
                                {{ $answer }}
                            </label>
                        </div>
                    @endforeach
                    @else

                    <h5 class="card-title" style="color: red" >Not found Question</h5>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
