<div class="navbar bg-base-100">
    <div class="navbar-start ml-4">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="/">Home</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </div>

        <a href="/" class="btn btn-ghost normal-case text-xl text-accent">{{config('app.name', 'MovieList')}}</a>
    </div>
    <div class="navbar-center hidden lg:flex ">
        <ul class="menu menu-horizontal space-x-20">
            <li><a href="/">Home</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/movies">Movies</a></li>
        </ul>
    </div>

    <div class="navbar-end mr-4" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <a class="nav-link" href="{{ route('login') }}">
                        <button
                            class="btn sm:btn-sm md:btn-md text-base-100 btn-primary mr-4 rounded-full">{{ __('Login') }}</button>
                    </a>
                @endif

                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">
                        <button
                            class="btn btn-outline sm:btn-sm md:btn-md flex flex-col items-center text-base-100 btn-primary rounded-full">{{ __('Register') }}</button>
                    </a>
                @endif
            @else
                <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn m-1 btn-primary text-base-100"> <a id="navbarDropdown"
                                                                                          class="nav-link dropdown-toggle"
                                                                                          href="#" role="button"
                                                                                          data-bs-toggle="dropdown"
                                                                                          aria-haspopup="true"
                                                                                          aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a></label>
                        <ul tabindex="0"
                            class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">

                            <li>
                                <a href="/dashboard" class="justify-between">
                                    Dashboard
                                    <span class="badge badge-primary text-base-100">New</span>
                                </a>
                            </li>

                            <li>
                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                </div>
            @endguest

        </ul>
    </div>
</div>
