<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div style = "position: fixed" class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php" class="site_title"><span> Obras Publicas</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo '../Uploads/'.$_SESSION['Photo'] ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2> <?php echo $_SESSION['Name'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                <li><a href="home.php"><i class="fa fa-home"></i> Inicio</a>
                  </li>
                  <?php if($_SESSION['Role'] == 1 || $_SESSION['Role'] == 2 || $_SESSION['Role'] == 3) { ?> 
                <li><a><i class="fa fa-bar-chart-o"></i> Consultas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Avances de obra</a></li>
                    </ul>
                  </li>
                
                <li><a><i class="fa fa-users"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="viewUsers.php">Ver Usuarios</a></li>
                      <li><a href="insertUser.php">Agregar Usuario</a></li>
                    </ul>
                  </li> <?php }?>
                  <li><a><i class="fa fa-file"></i> Fichas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="viewFichas.php">Ver Fichas</a></li>
                      <li><a href="insertFicha.php">Levantar Ficha</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i> Reportes de Obras<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="viewReports.php">Ver Reportes</a></li>
                      <li><a href="insertReport.php">Levantar Reporte</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesion" href="../controllers/login/salir.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo '../Uploads/'.$_SESSION['Photo'] ?>" alt=""><?php echo $_SESSION['Name']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="./profile.php"> Perfil</a></li>
                    <li><a href="../controllers/login/salir.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->