<?php
$producto=ControladorProducto::ctrCantidadProductos();
$cliente=ControladorCliente::ctrCantidadClientes();
$usuario=ControladorUsuario::ctrCantidadUsuarios();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Panel de control</h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $producto["producto"];?></h3>
              <p>Productos registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-filing"></i>
            </div>
            <a href="VProducto" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $usuario["usuario"];?></h3>
              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="VUsuario" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $cliente["cliente"];?></h3>
              <p>Clientes registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="VCliente" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <!--boton de reporte ventas-->
      <div class="form-group">
        <div class="input-group">
          <button type="button" class="btn btn-default float-right" id="daterange-btn" onchange="reporteVentas()">
            <span>
              <i class="far fa-calendar-alt"></i> Rango de fecha
            </span>
            <i class="fas fa-caret-down"></i>
          </button>
        </div>
      </div>

      <!--grafica de ventas-->

      <!-- solid sales graph -->
      <div class="card bg-gradient-info">
        <div class="card-header border-0">
          <h3 class="card-title">
            <i class="fas fa-th mr-1"></i>
            Reporte de ventas
          </h3>

          <div class="card-tools">
            <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent">
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
