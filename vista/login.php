<body class="hold-transition login-page">
  <div id="back"></div>
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Sistema</b>Distribucion</a>
    </div>

    <!-- #e0e5ff12; -->
    <!-- #a1a5b159 -->
    <!-- /.login-logo -->
    <div class="card" style="border-radius: 20px; background-color:#ffffff1f; box-shadow: 10px 5px 5px #000000a6;">
      <div class="card-body login-card-body" style="border-radius: 20px; background-color:#a1a5b159;">
        <p class="login-box-msg">Acceso al sistema</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Login de usuario" name="usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">

            </div>
            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary  btn-block  " style="border-radius: 50px">Iniciar Sesión</button>
            </div>
            <!-- /.col -->
          </div>

          <?php
          $login = new ControladorUsuario();
          $login->ctrIngresoUsuario();
          ?>

        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assest/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assest/dist/js/adminlte.min.js"></script>
</body>

</html>