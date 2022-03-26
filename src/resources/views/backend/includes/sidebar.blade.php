<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>

        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )

             (
                    $logged_in_user->can('admin.lookups.category.list') ||
                    $logged_in_user->can('admin.lookups.category.store') ||
                    $logged_in_user->can('admin.lookups.category.update') ||
                    $logged_in_user->can('admin.lookups.category.delete')
                )

                (
                     $logged_in_user->can('admin.lookups.city.list') ||
                     $logged_in_user->can('admin.lookups.city.store') ||
                    $logged_in_user->can('admin.lookups.city.update') ||
                    $logged_in_user->can('admin.lookups.city.delete')
                 )
                  (
                     $logged_in_user->can('admin.lookups.page.list') ||
                     $logged_in_user->can('admin.lookups.page.store') ||
                    $logged_in_user->can('admin.lookups.page.update') ||
                    $logged_in_user->can('admin.lookups.page.delete')
                 )

                   (
                     $logged_in_user->can('admin.worker.list') ||
                     $logged_in_user->can('admin.worker.store') ||
                    $logged_in_user->can('admin.worker.update') ||
                    $logged_in_user->can('admin.worker.delete')
                 )

                    (
                     $logged_in_user->can('admin.special.list') ||
                     $logged_in_user->can('admin.special.store') ||
                    $logged_in_user->can('admin.special.update') ||
                    $logged_in_user->can('admin.special.delete')
                 )


        )
            <li class="c-sidebar-nav-title">@lang('System')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif







{{-- category --}}





            <li class="c-sidebar-nav-title">@lang('lookups')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.lookups.category.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-flag-alt"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Category')"/>

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.lookups.category.list') ||
                            $logged_in_user->can('admin.lookups.category.store') ||
                            $logged_in_user->can('admin.lookups.category.update') ||
                            $logged_in_user->can('admin.lookups.category.delete')
                        ))

                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.lookups.category.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Category List')"
                                :active="activeClass(Route::is('admin.lookups.category.*'), 'c-active')"/>
                        </li>
                    @endif



                </ul>
            </li>

{{--       City --}}


        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.lookups.city.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-building"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('City')"/>

            <ul class="c-sidebar-nav-dropdown-items">
                @if (
                    $logged_in_user->hasAllAccess() ||
                    (
                        $logged_in_user->can('admin.lookups.city.list') ||
                        $logged_in_user->can('admin.lookups.city.store') ||
                        $logged_in_user->can('admin.lookups.city.update') ||
                        $logged_in_user->can('admin.lookups.city.delete')
                    ))

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.lookups.city.index')"
                            class="c-sidebar-nav-link"
                            :text="__('City List')"
                            :active="activeClass(Route::is('admin.lookups.city.*'), 'c-active')"/>
                    </li>
                @endif



            </ul>
        </li>

        {{--       City --}}


        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.lookups.page.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-description"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Page')"/>

            <ul class="c-sidebar-nav-dropdown-items">
                @if (
                    $logged_in_user->hasAllAccess() ||
                    (
                        $logged_in_user->can('admin.lookups.page.list') ||
                        $logged_in_user->can('admin.lookups.page.store') ||
                        $logged_in_user->can('admin.lookups.page.update') ||
                        $logged_in_user->can('admin.lookups.page.delete')
                    ))

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.lookups.page.index')"
                            class="c-sidebar-nav-link"
                            :text="__('Page List')"
                            :active="activeClass(Route::is('admin.lookups.page.*'), 'c-active')"/>
                    </li>
                @endif



            </ul>
        </li>
        <li class="c-sidebar-nav-title">@lang('worker')</li>

        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.worker.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-user"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Worker')"/>

            <ul class="c-sidebar-nav-dropdown-items">
                @if (
                    $logged_in_user->hasAllAccess() ||
                    (
                        $logged_in_user->can('admin.worker.list') ||
                        $logged_in_user->can('admin.worker.store') ||
                        $logged_in_user->can('admin.worker.update') ||
                        $logged_in_user->can('admin.worker.delete')
                    ))

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.worker.index')"
                            class="c-sidebar-nav-link"
                            :text="__('Worker List')"
                            :active="activeClass(Route::is('admin.worker.*'), 'c-active')"/>
                    </li>
                @endif


            </ul>
        </li>

        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.special.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-list-rich"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Special Worker')"/>

            <ul class="c-sidebar-nav-dropdown-items">
                @if (
                    $logged_in_user->hasAllAccess() ||
                    (
                        $logged_in_user->can('admin.special.list') ||
                        $logged_in_user->can('admin.special.store') ||
                        $logged_in_user->can('admin.special.update') ||
                        $logged_in_user->can('admin.special.delete')
                    ))

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.special.index')"
                            class="c-sidebar-nav-link"
                            :text="__('Special Worker List')"
                            :active="activeClass(Route::is('admin.special.*'), 'c-active')"/>
                    </li>
                @endif
            </ul>
                </li>



                    <li class="c-sidebar-nav-title">@lang('Messages')</li>

                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.message.*'), 'c-open c-show') }}">
                        <x-utils.link
                            href="#"
                            icon="c-sidebar-nav-icon cil-chat-bubble"
                            class="c-sidebar-nav-dropdown-toggle"
                            :text="__('Message')"/>

                        <ul class="c-sidebar-nav-dropdown-items">
                            @if (
                                $logged_in_user->hasAllAccess() ||
                                (
                                    $logged_in_user->can('admin.message.list') ||
                                    $logged_in_user->can('admin.message.delete')
                                ))

                                <li class="c-sidebar-nav-item">
                                    <x-utils.link
                                        :href="route('admin.message.index')"
                                        class="c-sidebar-nav-link"
                                        :text="__('Message List')"
                                        :active="activeClass(Route::is('admin.message.*'), 'c-active')"/>
                                </li>
                            @endif
                        </ul>
                    </li>


        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
