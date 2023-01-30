<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="{{ route('user.index') }}">
        <i class=" fas fa-users"></i><span>Users</span>
    </a>
    <a class="nav-link" href="{{ route('rol.index') }}">
        <i class=" fas fa-lock"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="{{ route('blog.index') }}">
        <i class=" fas fa-blog"></i><span>Blogs</span>
    </a>
</li>
