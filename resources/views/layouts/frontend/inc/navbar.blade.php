<!--        default navbar with profile photo -->
<nav class="navbar navbar-default navbar-absolute" role="navigation-demo">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-raised btn-round">
                        Login
                    </a>
                </li>

                <li>
                    <a href="{{ route('register') }}" class="btn btn-rose btn-raised btn-round">
                        Register
                    </a>
                </li>

                @else
                @if(Auth::user()->role->id == '1')
                        <li> <a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @else <li> <a href="{{ route('author.dashboard') }}">Dashboard</a></li>
                @endif
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="btn btn-raised btn-round btn-rose">
                        <i class="material-icons">power_settings_new</i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-->
</nav>
<!-- end default navbar -->
