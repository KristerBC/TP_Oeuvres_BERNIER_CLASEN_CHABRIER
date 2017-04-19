<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          @if (Session::get('id')!=0)
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Session::get('prenom') }} {{ Session::get('nom') }}</p> <!-- replace with the user's name -->
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          @else
            <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
          @endif

        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            @if (Session::get('id')==0)
              <li class="active"><a href="login"><span>Se connecter</span></a></li>
            @else
              <li class="active"><a href="home"><span>Accueil</span></a></li>
              <li><a href="reservations"><span>Reservations</span></a></li>
              <li><a href="oeuvres"><span>Oeuvres</span></a></li>
              <li><a href="formOeuvre"><span>Ajouter une oeuvre</span></a></li>
            @endif
            <!--<li class="treeview">
                <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>-->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
