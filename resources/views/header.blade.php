<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo"><b>Oeuvres</b>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="{{url('/signOut')}}">
                      @if (Session::get('id')!=0)
                        <span class="hidden-xs">Déconnexion</span>
                      @endif
                    </a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
