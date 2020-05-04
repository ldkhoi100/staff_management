<!-- Footer -->
<footer class="sticky-footer bg-white" style="margin-top: auto">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="sb-admin-2/#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="sb-admin-2/login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="sb-admin-2/vendor/jquery/jquery.min.js"></script>
<script src="sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="sb-admin-2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="sb-admin-2/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="sb-admin-2/js/demo/chart-area-demo.js"></script>
<script src="sb-admin-2/js/demo/chart-pie-demo.js"></script>
<script src="sb-admin-2/js/demo/chart-bar-demo.js"></script>

<script src="sb-admin-2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="sb-admin-2/js/demo/datatables-demo.js"></script>

<script>
    // Script Ckeditor 4
    CKEDITOR.replace("content");

    //Image onchange
    function readURL(event) {
        if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function () {
        let output = document.getElementById('zoom');
        output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        }
    }

</script>

</body>

</html>