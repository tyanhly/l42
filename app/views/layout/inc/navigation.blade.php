    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('index.about',array())}}">About</a>
                        
                    </li>
                    <li>
                        <a href="{{route('nerds.index')}}">Nerd</a>
                    </li>
                    <li>
                        <a href="{{route('users.index')}}">User</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav" style="float:right;color:#fff;">
                    <li>
                       
                        @if(Confide::user())
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{Confide::user()->username }}</a>
                         <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('/profile') }}">Profile</a>
                            </li> <li>
                                <a href="{{ URL::to('/users/logout') }}">Logout</a>
                            </li>
                         </ul>
                        @else
                            <li>
                                <a href="{{ URL::to('/users/login') }}">
                                Login</a>
                            </li>
                        @endif
                    </li>
                </ul>
                <div style="clear:both;"></div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>