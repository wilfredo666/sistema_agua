<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header pb-0">
    <div class="container-fluid">
      <h4>Reporte de ventas por personal</h4>
    </div><!-- /.container-fluid -->
  </section>

  <div class="modal-body" style="padding-bottom: 0; padding-top: 1;">
    <div class="card">
      <form id="ReporteDePersonal">
        <div class="card-body" style="padding-bottom: 0;">
          <div class="container col-md-12">
            <div class="row">
              <div class="form-group col-md-4">
                <label>Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
              </div>
              <div class="form-group col-md-6">
                <label>Seleccionar Personal:</label>
                <select class="form-control" name="idPersonal" id="idPersonal">
                  <option value="">-- Seleccionar --</option>
                  <?php
                  $personal = ControladorPersonal::ctrInfoVentasPersonal();
                  foreach ($personal as $value) {
                    $idPersonal = $value["id_personal"];
                    $nomPersonal = $value['nombre_personal'];
                    $apellidoPat = $value['ap_pat_personal'];
                    $apellidoMat = $value['ap_mat_personal'];
                  ?>
                    <option value="<?php echo $idPersonal ?>"> <?php echo $nomPersonal . " " . $apellidoPat . " " . $apellidoMat ?> </option>
                  <?php
                  }
                  ?>
                </select>
                <p class="text-danger" id="error-nomConductor"></p>
              </div>

              <div class="form-group col-md-2" style=" display: flex; align-items: center; margin-top: 13px;">
                <button type="button" class="btn btn-navbar bg-warning" onclick="reportePersonal();">
                  <i class="fas fa-search "></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <section class="content">
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#Factura</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="repVentasPersonal">
      </tbody>
    </table>

  </section>
</div>