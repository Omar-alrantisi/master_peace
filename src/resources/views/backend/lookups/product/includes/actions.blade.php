@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.product.update'))
    <x-utils.edit-button :href="route('admin.lookups.product.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.product.delete'))
    <x-utils.delete-button :href="route('admin.lookups.product.delete', $model)" />
@endif
