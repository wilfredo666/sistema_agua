<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; 2021-2022 <a href="https://ekesoft.es">Ekesoft</a>.</strong> Derechos reservados.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assest/plugins/jquery/jquery.min.js"></script>
<!-- ChartJS -->
<script src="assest/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="assest/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Bootstrap 4 -->
<script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assest/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assest/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assest/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assest/plugins/jszip/jszip.min.js"></script>
<script src="assest/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assest/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="assest/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- InputMask -->
<script src="assest/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="assest/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assest/js/usuario.js"></script>
<script src="assest/js/cliente.js"></script>
<script src="assest/js/producto.js"></script>
<script src="assest/js/factura.js"></script>
<!--<script src="assest/js/reporte.js"></script>-->
<script src="assest/js/personal.js"></script>
<script src="assest/js/vehiculo.js"></script>
<!-- Select2 -->
<script src="assest/plugins/select2/js/select2.full.min.js"></script>
<!-- dropzonejs -->
<script src="assest/plugins/dropzone/min/dropzone.min.js"></script>

<!--====================
seccion de modals
=====================-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content" id="content-default">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="content-lg">


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-lg2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="content-lg2">


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="content-xl">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jquery-validation -->
<script src="assest/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assest/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="assest/plugins/jquery-validation/localization/messages_es.js"></script>


<script>
  /*dataTable para productos*/
  $(function () {
    $("#DataTableProducto").DataTable({
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging":true,
      "searching":true,
      "ordering":true,
      "info":true,
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "ajax": "vista/producto/dataTableProducto.php",
      language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }

    }).buttons().container().appendTo('#DataTableProducto_wrapper .col-md-6:eq(0)');

  });

  $(function () {
    $("#DataTableProd").DataTable({

      "paging":true,
      "searching":true,
      "ordering":true,
      "info":true,
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,

      language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }

    }).buttons().container().appendTo('#DataTableProducto_wrapper .col-md-6:eq(0)');

  });

  /*dataTable para productos en Venta*/
  $(function () {
    $("#DataTableProductoVenta").DataTable({
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging":true,
      "searching":true,
      "ordering":true,
      "info":true,
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "ajax": "vista/producto/dataTableProductoVenta.php",
      language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }

    }).buttons().container().appendTo('#DataTableProducto_wrapper .col-md-6:eq(0)');

  });

  /*dataTable para productos en NOTA DE Venta*/
  $(function () {
    $("#DataTableProductoNotaVenta").DataTable({
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging":true,
      "searching":true,
      "ordering":true,
      "info":true,
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "ajax": "vista/producto/dataTableProductoNotaVenta.php",
      language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }

    }).buttons().container().appendTo('#DataTableProductoNotaVenta_wrapper .col-md-6:eq(0)');

  });

  /*dataTable para cliente*/
  $(function () {
    $("#DataTableCliente").DataTable({
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging":true,
      "searching":true,
      "ordering":true,
      "info":true,
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "ajax": "vista/cliente/dataTableCliente.php",
      language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }

    }).buttons().container().appendTo('#DataTableCliente_wrapper .col-md-6:eq(0)');

  });

  /*dataTable generico*/
  $(function () {
    $("#DataTable").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    }).buttons().container().appendTo('#DataTable_wrapper .col-md-6:eq(0)');

  });

  /*select2 para formulario NE*/
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

</script>


<script>
  //validacion para Nota de entrega
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        emitirNotaEntrega()
      }
    });
    $("#FNotaEntrega").validate({
      rules:{
        zonaVenta:{
          required:true,
          minlength: 3
        },
        chofer:{
          required:true
        },
        vehiculo:{
          required:true
        }
      },
      messages: {
        zonaVenta: {
          required: "El campo no puede estar vacio",
          minlength: "El campo no puede tener menos de 3 caracteres"
        },
        chofer: {
          required: "Seleccione un chofer"
        },
        vehiculo: {
          required: "Seleccione un vehiculo"
        }
      },

      //se crea el elemento span donde se escribira el mensaje
      errorElement:"span",
      errorPlacement: function(error, element){
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error) //cambiar a .imput-group ya que es el elemento padre del input
      },
      //destacar
      highlight:function(element, errorClass, validClass){
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight:function(element, errorClass, validClass){
        $(element).removeClass("is-invalid")
      }

    })
  })


</script>

<script>
  //validacion para Nota de venta
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        emitirFactura()
      }
    });
    $("#FNotaVenta").validate({
      rules:{
        numFactura:{
          required:true,
          minlength: 3
        },
        nitCliente:{
          required:true
        },
        rsCliente:{
          required:true
        },
        personal:{
          required:true
        }
      },
      messages: {
        numFactura: {
          required: "El campo no puede estar vacio",
          minlength: "El campo no puede tener menos de 3 caracteres"
        },
        nitCliente: {
          required: "Inserte o seleccione un nit/ci"
        },
        rsCliente: {
          required: "El campo no puede estar vacio"
        },
        personal: {
          required: "Seleccione personal"
        }
      },

      //se crea el elemento span donde se escribira el mensaje
      errorElement:"span",
      errorPlacement: function(error, element){
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error) //cambiar a .imput-group ya que es el elemento padre del input
      },
      //destacar
      highlight:function(element, errorClass, validClass){
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight:function(element, errorClass, validClass){
        $(element).removeClass("is-invalid")
      }

    })
  })


</script>

<script>
  //validar formulario nuevo cliente
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegCliente()
      }
    })

    $("#FormRegCliente").validate({
      rules: {
        rsCliente: {
          required: true,
          minlength: 3
        },
        NitCiCliente: {
          required: true,
          minlength: 3
        },
        dirCliente: {
          minlength: 3
        },
        telCliente: {
          minlength: 3
        },
        precioEntregaCli: {
          required: true,
        },

      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback')
        element.closest('.form-group').append(error)
      },

      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid')
        /* .is-invalid */
      },

      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid')
      }
    })

  })
</script>

<script>
  //validacion editar cliente
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        EditCliente()
      }
    })
    $("#FormEditCliente").validate({
      rules: {
        rsCliente: {
          required: true,
          minlength: 3
        },
        NitCiCliente: {
          required: true,
          minlength: 3
        },
        nombreCliente: {
          required: true,
          minlength: 3
        },
        dirCliente: {
          minlength: 3
        },
        telCliente: {
          minlength: 3
        },
        precioEntregaCli: {
          required: true,
        },

        /* perfilUsuario:"required" */
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback')
        element.closest('.form-group').append(error)
      },

      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid')
        /* .is-invalid */
      },

      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid')
      }
    })

  })
</script>


<!-- Bootstrap Switch -->
<script src="assest/plugins/bootstrap-switch/js/bootstrap-switch.js"></script>
<script>
  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  })
</script>
</body>
</html>
