
<!-- DSelect -->
<script type="text/javascript" src="<?= base_url('plugins/dselect/dselect.js') ?>"></script>

<!--   Core JS Files   -->
<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/'.$root_page.'.js') ?>"></script>

<!-- Data Table -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>

  $('#myDataTable').DataTable({
      responsive: true
  });

  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>
</body>

</html>