@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.page.update'))
    <x-utils.edit-button :href="route('admin.lookups.page.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.page.delete'))
    <x-utils.delete-button :href="route('admin.lookups.page.delete', $model)" />
@endif
