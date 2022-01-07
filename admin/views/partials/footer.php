<footer class="main-footer">
  <div class="footer-left">
    <a href="https://www.facebook.com/lsa.lifeskillsassistanceclub">Life Skills Assistance Club</a></a>
  </div>
  <div class="footer-right">
  </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="public/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="public/assets/bundles/prism/prism.js"></script>
<script src="public/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="public/assets/bundles/datatables/datatables.min.js"></script>
<script src="public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="public/assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
<script src="public/assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
<script src="public/assets/bundles/datatables/export-tables/jszip.min.js"></script>
<script src="public/assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
<script src="public/assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
<script src="public/assets/js/page/toastr.js"></script>
<script src="public/assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
<script src="public/assets/js/page/datatables.js"></script>
<script src="public/assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="public/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="public/assets/js/custom.js"></script>
<!-- JS main -->
<script src="public/js/main.js"></script>
<script>
  DisplayReset();

  function showMessage() {
    <?php if (isset($dataMessage)) { ?>
      iziToast.<?php echo $dataMessage->status ?>({
        message: "<?php echo $dataMessage->message ?>",
        position: "topRight"
      });
    <?php } ?>
  };
</script>
</body>

</html>