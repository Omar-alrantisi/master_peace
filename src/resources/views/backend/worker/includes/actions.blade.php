@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.worker.update'))
    <x-utils.edit-button :href="route('admin.worker.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.worker.delete'))
    <x-utils.delete-button :href="route('admin.worker.delete', $model)" />
@endif
{{--{{$model->name}}--}}
