@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.special.update'))
    <x-utils.edit-button :href="route('admin.special.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.special.delete'))
    <x-utils.delete-button :href="route('admin.special.delete', $model)" />
@endif
{{--{{$model->name}}--}}
