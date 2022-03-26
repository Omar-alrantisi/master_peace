{{-- file css --}}
<link rel="stylesheet" href={{asset("/views/css/style.css")}}>
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
{{-- bootstrap css --}}
<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <x-utils.link
            :href="route('frontend.index')"
            :text="appName()"
            class="navbar-brand" />

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('Toggle navigation')">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
{{--                    <li class="nav-item">--}}
{{--                        <x-utils.link--}}
{{--                            :href="route('frontend.join_as_worker')"--}}
{{--                            :active="activeClass(Route::is('frontend.join_as_worker'))"--}}
{{--                            :text="__('Join as a worker')"--}}
{{--                            class="nav-link" />--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.index')"
                            :active="activeClass(Route::is('frontend.index'))"
                            :text="__('Home')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.categories')"
                            :active="activeClass(Route::is('frontend.categories'))"
                            :text="__('Explore')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.about')"
                            :active="activeClass(Route::is('frontend.about'))"
                            :text="__('About')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.contact')"
                            :active="activeClass(Route::is('frontend.contact'))"
                            :text="__('Contact')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.auth.login')"
                            :active="activeClass(Route::is('frontend.auth.login'))"
                            :text="__('Login')"
                            class="nav-link" />
                    </li>

                    @if (config('boilerplate.access.user.registration'))

                        <li class="nav-item">
                            <x-utils.link
                                :href="route('frontend.auth.register')"
                                :active="activeClass(Route::is('frontend.auth.register'))"
                                :text="__('Register')"
                                class="nav-link" />

                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.join_as_worker')"
                            :active="activeClass(Route::is('frontend.join_as_worker'))"
                            :text="__('Join as a worker')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.index')"
                            :active="activeClass(Route::is('frontend.index'))"
                            :text="__('Home')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.categories')"
                            :active="activeClass(Route::is('frontend.categories'))"
                            :text="__('Explore')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.about')"
                            :active="activeClass(Route::is('frontend.about'))"
                            :text="__('About')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.messageCreate')"
                            :active="activeClass(Route::is('frontend.contact'))"
                            :text="__('Contact')"
                            class="nav-link" />
                    </li>
                    <li class="nav-item dropdown">
                        <x-utils.link
                            href="#"
                            id="navbarDropdown"
                            class="nav-link dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            v-pre
                        >
                            <x-slot name="text">
                                <img class="rounded-circle" style="max-height: 20px" src="{{ $logged_in_user->avatar }}" />
                                {{ $logged_in_user->name }} <span class="caret"></span>
                            </x-slot>
                        </x-utils.link>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if ($logged_in_user->isAdmin())
                                <x-utils.link
                                    :href="route('admin.dashboard')"
                                    :text="__('Administration')"
                                    class="dropdown-item" />
                            @endif

                            @if ($logged_in_user->isUser())
                                <x-utils.link
                                    :href="route('frontend.user.dashboard')"
                                    :active="activeClass(Route::is('frontend.user.dashboard'))"
                                    :text="__('Dashboard')"
                                    class="dropdown-item"/>


                            @endif

                            <x-utils.link
                                :href="route('frontend.user.account')"
                                :active="activeClass(Route::is('frontend.user.account'))"
                                :text="__('My Account')"
                                class="dropdown-item" />

                            <x-utils.link
                                :text="__('Logout')"
                                class="dropdown-item"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <x-slot name="text">
                                    @lang('Logout')
                                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                </x-slot>
                            </x-utils.link>
                        </div>
                    </li>
                @endguest
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>

@if (config('boilerplate.frontend_breadcrumbs'))
    @include('frontend.includes.partials.breadcrumbs')
@endif
