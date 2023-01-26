<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="inicio" class="brand-link">
        <img src="assest/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema AGUA</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assest/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" id="usuarioLogin"><?php echo $_SESSION["NombreUsuario"]; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
            <?php if ($_SESSION["perfil"] == "Administrador") {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VUsuario" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista de usuarios</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
            <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Chofer") {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>
                    Clientes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VCliente" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista de clientes</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
            <?php if ($_SESSION["perfil"] == "Administrador") {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                    Productos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VProducto" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista de productos</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
            <?php if ($_SESSION["perfil"] == "Administrador") {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cash-register"></i>
                  <p>
                    Ventas
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">         
                  <li class="nav-item">
                    <a href="FormVenta" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nota de Venta</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="VFactura" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reporte de NV</p>
                    </a>
                  </li>
                <?php
              }
                ?>
                <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Chofer") {
                ?>
                  <li class="nav-item">
                    <a href="FNotaEntrega" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nota de Entrega</p>
                    </a>
                  </li>
                <?php
                }
                ?>
                <?php if ($_SESSION["perfil"] == "Administrador") {
                ?>
                  <li class="nav-item">
                    <a href="VNotaEntrega" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reporte NE</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-people-carry"></i>
                  <p>
                    Personal
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VPersonal" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista del Personal</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-shuttle-van"></i>
                  <p>
                    Vehiculos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">


                  <li class="nav-item">
                    <a href="VVehiculo" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista de Vehículos</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
                }
            ?>
            <!--          <li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-cog"></i>
<p>
Opciones
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">


<li class="nav-item">
<a href="#" class="nav-link" onclick="">
<i class="far fa-circle nav-icon"></i>
<p>Otros</p>
</a>
</li>
</ul>
</li>
-->

            <li class="nav-item">
              <a href="salir" class="nav-link">
                <i class="fas fa-power-off nav-icon"></i>
                <p>
                  Salir
                </p>
              </a>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>