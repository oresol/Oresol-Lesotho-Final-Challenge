<nav class="sidebar card  py-2 mb-4" style="height: 35rem; background:#808080">
    <ul class="nav flex-column" id="nav_accordion">
        <li class="nav-item">
            <a class="nav-link text-white" onclick="setFlag('home')" href="{{url('/')}}"> Dashboard</a>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link text-white" href="#"> Manage Stores <i class="arrow down" ></i> </a>
            <ul class="submenu collapse">
                <li><a class="nav-link text-white" onclick="setFlag('create')" href="{{route('storecreate')}}">Create</a></li>
                <li><a class="nav-link text-white" onclick="setFlag('delete')" href="{{route('getstores')}}">Delete </a></li>
                <li><a class="nav-link text-white" onclick="setFlag('select')" href="{{route('getstores')}}">Update </a> </li>
            </ul>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link text-white" href="{{url('manage-type')}}"> Manage Types </a>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link text-white" href="{{url('manage-tags')}}"> Manage Tags  </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#"> Account Settings </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#"> Import stores </a>
        </li>
    </ul>
    </nav>