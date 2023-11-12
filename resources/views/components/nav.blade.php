<nav class="navbar navbar-expand-lg px-4 py-1 d-flex justify-content-between" style="background-color: #808080;">
    <a onclick="setFlag('home')" class="navbar-brand d-flex p-0"  href="{{url('/')}}">
        <img src="{{asset('logo1.png')}}" alt="logo" class="" width="50px" height="50px">
        <p class="m-auto fw-bold text-white">Locator</p>
    </a>
    @guest
        <span class="nav-item">
            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
        </span>
    @else    
        <span class="dropdown me-5">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
            </a>
            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                <li><a href="{{url('/change-password')}}" class="dropdown-item ">Change Password</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button onclick="resetStorage()" class="btn btn-light" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </span>
    @endguest
</nav>