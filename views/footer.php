    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.2
        </div>
        <strong>Copyright &copy; <?php echo date('Y')?> <a href="http://adminlte.io">Nixsms-Center</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo BASE_URL.'public/plugins/jquery/jquery.min.js'?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL.'public/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
<!-- Select2 -->
<script src="<?php echo BASE_URL.'public/plugins/select2/js/select2.full.min.js'?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo BASE_URL.'public/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'?>"></script>
<!-- InputMask -->
<script src="<?php echo BASE_URL.'public/plugins/moment/moment.min.js'?>"></script>
<script src="<?php echo BASE_URL.'public/plugins/inputmask/min/jquery.inputmask.bundle.min.js'?>"></script>
<!-- date-range-picker -->
<script src="<?php echo BASE_URL.'public/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo BASE_URL.'public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo BASE_URL.'public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'?>"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo BASE_URL.'public/plugins/bootstrap-switch/js/bootstrap-switch.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL.'public/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL.'public/dist/js/demo.js'?>"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>