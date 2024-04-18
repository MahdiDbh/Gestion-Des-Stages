
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="image">
                <a href="{{route('home')}}" class="brand-link">

                        <img src="{{asset('dist/img/logo-round.png')}}" class="" alt="Algerie Poste" height="40" width="40" style="margin-left: 5px; margin-top: 5px;">

                    <span class="brand-text custom-brand-text" style=".custom-brand-text {
                        font-family: Lato, sans-serif;
                        font-size: 24px;
                        font-weight: bold;
                        color: #007bff;
                        text-decoration: underline;
                        }">AP-InterneShip</span>
                </a>
            </div>
                <!-- Sidebar -->
            <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt "></i>
                                <p>
                                    Accueil
                                    <i class="fa-duotone fa-gauge"></i>
                                </p>
                                </a>
                            </li>
                    </ul>
                    @can('user-list')
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Utilisateurs
                                    <i class=""></i>
                                </p>
                                </a>
                            </li>
                    </ul>

                    @endcan
                    @can('role-list')
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('roles.index')}}" class="nav-link active">
                                <i class="nav-icon fab fa-critical-role"></i>
                                <p>
                                   Roles
                                    <i class=""></i>
                                </p>
                                </a>
                            </li>
                    </ul>
                    @endcan

                    @can('permission-list')
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('permissions.index')}}" class="nav-link active">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    Permissions
                                    <i class=""></i>
                                </p>
                                </a>
                            </li>
                    </ul>
                    @endcan
                            @can('paliers-list')
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{route('paliers.index')}}" class="nav-link active">
                                <i class="nav-icon fas fa-coins"></i>
                                <p>
                                   Couts
                                    <i class=""></i>
                                </p>
                                </a>
                            </li>
                            </ul>
                            @endcan


                            @can('stage-list')
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{route('stage.index')}}" class="nav-link active">
                                <i class="nav-icon fas fa-coins"></i>
                                <p>
                                   Stage
                                    <i class=""></i>
                                </p>
                                </a>
                            </li>
                            </ul>
                            @endcan

                            @can('sujet-list')
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{route('sujet.index')}}" class="nav-link active">
                                <i class="fa-solid fas fa-file"></i>
                                <p>
                                   Sujet
                                    <i class=""></i>
                                </p>
                                </a>
                            </li>
                            </ul>
                            @endcan

                </nav>
                <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

  </aside>
