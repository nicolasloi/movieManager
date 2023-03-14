<div class="navbar bg-base-100">
    <div class="navbar-start ml-4">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
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
    <div class="navbar-end mr-4">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-primary">
                        <div class="w-10 rounded-full text-base-100">
                            <h2>User</h2>
                        </div>
                    </label>
                    <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
    </div>
</div>
