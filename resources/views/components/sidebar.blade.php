<nav class="sidebar card  py-2 mb-4" style="height: 35rem; background:#808080">
    <ul class="nav flex-column" id="nav_accordion">
        <li class="nav-item">
            <a class="nav-link text-white" onclick="setFlag('home')" href="{{url('/')}}"> Dashboard</a>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link text-white" href="#"> Manage Stores <i class="arrow down" ></i> </a>
            <ul class="submenu collapse">
                <li><a class="nav-link text-white" onclick="setFlag('create')" href="{{route('store.create')}}">Create</a></li>
                <li><a class="nav-link text-white" onclick="setFlag('delete')" href="{{route('store.index')}}">Delete </a></li>
                <li><a class="nav-link text-white" onclick="setFlag('select')" href="{{route('store.index')}}">Update </a> </li>
            </ul>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link text-white" href="{{url('type')}}"> Manage Types </a>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link text-white" href="{{url('tags')}}"> Manage Tags  </a>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link text-white" href="#"> Account Settings <i class="arrow down" ></i> </a>
            <ul class="submenu collapse">
                <li><a class="nav-link text-white" href="{{url('/user-profile')}}">Personal profile</a></li>
                <li><a class="nav-link text-white" href="{{url('/company-profile')}}">Company profile </a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{route('file.read')}}"> Import stores </a>
        </li>
    </ul>
    </nav>