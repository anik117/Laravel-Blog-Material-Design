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
                <img src="{{ asset('assets/backend/img/faces/avatar.jpg') }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{ Auth::user()->name }}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">My Profile</a>
                        </li>
                        <li>
                            <a href="#">Edit Profile</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
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
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav sidenavul">
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
            <li>
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">image</i>
                    <p>Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li>
                            <a href="pages/pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="pages/timeline.html">Timeline</a>
                        </li>
                        <li>
                            <a href="pages/login.html">Login Page</a>
                        </li>
                        <li>
                            <a href="pages/register.html">Register Page</a>
                        </li>
                        <li>
                            <a href="pages/lock.html">Lock Screen Page</a>
                        </li>
                        <li>
                            <a href="pages/user.html">User Profile</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>