@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.city.update'))
    <x-utils.edit-button :href="route('admin.lookups.city.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.city.delete'))
    <x-utils.delete-button :href="route('admin.lookups.city.delete', $model)" />
@endif
