<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets/backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text">
            Blog
        </a>
    </div>

    <div class="logo logo-mini">
        <a href="" class="simple-text">
            Blog
        </a>
    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->image) }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{ Auth::user()->name }}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        @if(Request::is('admin*'))
                            <li>
                                <a href="#">My Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.profile.settings') }}">Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif

                            @if(Request::is('author*'))
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('author.profile.settings') }}">Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav sidenavul">
            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.index') }}">
                        <i class="material-icons">library_books</i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.pending') }}">
                        <i class="material-icons">report</i>
                        <p>Pending Posts</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/tag*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tag.index') }}">
                        <i class="material-icons">label</i>
                        <p>Tags</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">
                        <i class="material-icons">apps</i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
                    <a href="{{ route('admin.subscriber.index') }}">
                        <i class="material-icons">subscriptions</i>
                        <p>Subscribers</p>
                    </a>
                </li>
            @endif

            @if(Request::is('author*'))
                <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('author.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="{{ Request::is('author/post*') ? 'active' : '' }}">
                    <a href="{{ route('author.post.index') }}">
                        <i class="material-icons">library_books</i>
                        <p>Posts</p>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>
