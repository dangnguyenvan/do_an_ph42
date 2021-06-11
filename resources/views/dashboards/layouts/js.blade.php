{{-- declare all file script use global --}}
<!-- jQuery -->
<script src="/dashboard_template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/dashboard_template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/dashboard_template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/dashboard_template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/dashboard_template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/dashboard_template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/dashboard_template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/dashboard_template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/dashboard_template/plugins/moment/moment.min.js"></script>
<script src="/dashboard_template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/dashboard_template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/dashboard_template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/dashboard_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dashboard_template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dashboard_template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard_template demo (This is only for demo purposes) -->
<script src="/dashboard_template/dist/js/pages/dashboard.js"></script>


{{-- declare other file script use private --}}
@stack('js')