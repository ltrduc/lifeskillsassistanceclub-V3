<footer class="main-footer">
  <div class="footer-right">
    <a class="font-weight-bold" href="https://www.facebook.com/lsa.lifeskillsassistanceclub">@lsa.lifeskillsassistanceclub · Cộng đồng</a></a>
  </div>
  <div class="footer-right">
  </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="source/public/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="source/public/bundles/prism/prism.js"></script>
<script src="source/public/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="source/public/bundles/datatables/datatables.min.js"></script>
<script src="source/public/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="source/public/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
<script src="source/public/bundles/datatables/export-tables/buttons.flash.min.js"></script>
<script src="source/public/bundles/datatables/export-tables/jszip.min.js"></script>
<script src="source/public/bundles/datatables/export-tables/pdfmake.min.js"></script>
<script src="source/public/bundles/datatables/export-tables/vfs_fonts.js"></script>
<script src="source/public/js/page/toastr.js"></script>
<script src="source/public/bundles/datatables/export-tables/buttons.print.min.js"></script>
<script src="source/public/js/page/datatables.js"></script>
<script src="source/public/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="source/public/js/page/index.js"></script>
<!-- Template JS File -->
<script src="source/public/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="source/public/js/custom.js"></script>

<!-- JS main -->
<script src="source/public/js/main.js"></script>
<script>
  DisplayReset();

  function showMessage() {
    <?php if (count($data['Notification']) > 0) { ?>
      iziToast.<?php echo $data['Notification']['status'] ?>({
        title: "Thông báo!",
        message: "<?php echo $data['Notification']['message'] ?>",
        position: "bottomRight"
      });
    <?php } ?>
  };
</script>
</body>

</html>