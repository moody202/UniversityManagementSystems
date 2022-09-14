<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ __('Parent_trans.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.Name_Father') }}</th>
            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
            <th>{{ trans('Parent_trans.Job_Father') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($myparents as $myparent)
            <tr>


                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $myparent->email }}</td>
                <td>{{ $myparent->name_father }}</td>
                <td>{{ $myparent->nat_id_father }}</td>
                <td>{{ $myparent->passport_father }}</td>
                <td>{{ $myparent->phone_father }}</td>
                <td>{{ $myparent->job_father }}</td>
                <td>
                    <button wire:click="edit({{ $myparent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $myparent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>


        @endforeach


    </table>
</div>
