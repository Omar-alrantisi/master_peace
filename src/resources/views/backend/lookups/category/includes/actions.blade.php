@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.category.update'))
    <x-utils.edit-button :href="route('admin.lookups.category.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.category.delete'))
    <x-utils.delete-button :href="route('admin.lookups.category.delete', $model)" />
@endif