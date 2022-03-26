@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.workerHelp.update'))
    <x-utils.edit-button :href="route('admin.workerHelp.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.workerHelp.delete'))
    <x-utils.delete-button :href="route('admin.workerHelp.delete', $model)" />
@endif
{{--{{$model->name}}--}}
