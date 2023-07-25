<li class="side-menus {{ Request::is('*') ? 'active' : ''   }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>

    @unless (!Auth::check())  
     @if(\Illuminate\Support\Facades\Auth::user()->can('users.index'))

     <a class="nav-link" href="{{ route('user.index') }}">
        <i class=" fas fa-users"></i><span>Users</span>
    </a>
    @endif
 
    @if(\Illuminate\Support\Facades\Auth::user()->can('roles.index'))
    <a class="nav-link" href="{{ route('rol.index') }}">
        <i class=" fas fa-lock"></i><span>Roles</span>
    </a>
    @endif

  
    <a class="nav-link" href="{{ route('blog.index') }}">
        <i class=" fas fa-blog"></i><span>Blogs</span>
    </a>

    @endunless
    
   

</li>
