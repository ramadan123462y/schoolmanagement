<div>

@if ($table_mode)


    <div class="table-responsive">
        @if ($message_error)
        <div class="alert alert-danger">
            <ul>

                    <li>{{ $message_error }}</li>

            </ul>
        </div>
        @endif

        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr class="table-success">
                <th>#</th>
               <th>{{ trans('pages/parents.Email') }}</th>
               <th>{{ trans('pages/parents.Name_Father') }}</th>
               <th>{{ trans('pages/parents.National_ID_Father') }}</th>
               <th>{{ trans('pages/parents.Passport_ID_Father') }}</th>
               <th>{{ trans('pages/parents.Phone_Father') }}</th>
               <th>{{ trans('pages/parents.Job_Father') }}</th>
               <th>{{ trans('pages/parents.Processes') }}</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($my_parents as $my_parent)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $my_parent->Email }}</td>
                    <td>{{ $my_parent->Name_Father }}</td>
                    <td>{{ $my_parent->National_ID_Father }}</td>
                    <td>{{ $my_parent->Passport_ID_Father }}</td>
                    <td>{{ $my_parent->Phone_Father }}</td>
                    <td>{{ $my_parent->Job_Father }}</td>
                    <td>
                        <button wire:click="edit({{ $my_parent->id }})" title="Edit"
                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="Delete"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
    @include('livewire.add-parent')
    @endif


</div>
