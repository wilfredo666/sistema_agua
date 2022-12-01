<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
   <h4>Lista de Usuarios</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Login</th>
          <th>Perfil</th>
          <th>Estado</th>
          <th>Ultimo Acceso</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoUsuario()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $usuario=ControladorUsuario::ctrInfoUsuarios();
        
        foreach($usuario as $value){
          ?>
          <tr>
            <td><?php echo $value["id_usuario"];?></td>
            <td><?php echo $value["login_usuario"];?></td>
            <td><?php echo $value["perfil"];?></td>
            <?php 
            if($value["estado"]==1){
              ?>
              <td><span class="badge badge-success">Activo</span></td>
              <?php
            }else{
              ?>
              <td><span class="badge badge-danger">Inactivo</span></td>
              <?php
            }
            ?>
            
            <td><?php echo $value["ultimo_login"];?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-info" onclick="MVerUsuario(<?php echo $value["id_usuario"];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-secondary" onclick="MEditUsuario(<?php echo $value["id_usuario"];?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger" onclick="MEliUsuario(<?php echo $value["id_usuario"];?>)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          
          <?php
        }
        ?>

      </tbody>
    </table>

  </section>
</div>