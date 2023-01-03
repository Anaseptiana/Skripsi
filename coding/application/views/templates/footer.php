            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Hamidah Rent Car <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="<?= base_url('administrator/auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
            <script src="<?= base_url() . 'assets/js/dropify.min.js' ?>"></script>
            <script src="<?= base_url() . 'assets/vendor/summernote-master/summernote-bs4.min.js' ?>"></script>
            <script src="<?= base_url() . 'assets/vendor/chart.js/Chart.min.js' ?>"></script>

            <!-- Page level plugins -->
            <script src="<?= base_url() . 'assets/vendor/datatables/jquery.dataTables.min.js' ?>"></script>
            <script src="<?= base_url() . 'assets/vendor/datatables/dataTables.bootstrap4.min.js' ?>"></script>

            <script src="<?= base_url('assets/'); ?>js/dataTables.buttons.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/jszip.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/pdfmake.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/vfs_fonts.js"></script>
            <script src="<?= base_url('assets/'); ?>js/buttons.html5.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/colvis.js"></script>

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('administrator/admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('administrator/admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });

                $('#summernote').summernote({
                    height: 500,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture', 'hr']],
                        ['view', ["fullscreen", "codeview", "help"]],
                    ],

                    onImageUpload: function(files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    }

                });

                function sendFile(file, editor, welEditable) {
                    data = new FormData();
                    data.append("file", file);
                    $.ajax({
                        data: data,
                        type: "POST",
                        url: "<?php echo site_url() ?>blog/konten",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(url) {
                            editor.insertImage(welEditable, url);
                        }
                    });
                }

                $('.dropify').dropify({
                    messages: {
                        default: 'Drag atau drop untuk memilih gambar',
                        replace: 'Ganti',
                        remove: 'Hapus',
                        error: 'error'
                    }
                });

                $(document).ready(function() {
                    $('#pilih_mobil').change('click', function() {
                        let id_mobil = $(this).val();
                        console.log(id_mobil);
                        document.location.href = "<?= base_url('administrator/mobil/gambar/tambah/'); ?>" + id_mobil;
                    });
                });

                $(document).ready(function() {
                  $('.table').DataTable({
                    dom: 'lBfrtip',
                    buttons: [
                        {
                          extend: 'excelHtml5',
                          exportOptions: {
                                columns: ':visible:not(:contains(Aksi))'
                            },
                        },
                        {
                          extend: 'pdfHtml5',
                          exportOptions: {
                                columns: ':visible:not(:contains(Aksi))'
                            },
                        },
                        // {
                        //   extend: 'colvis',
                        // },
                    ],
                  });
                });

                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;
                    var css = '@page { size: potrait; }',
                        head = document.head || document.getElementsByTagName('head')[0],
                        style = document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    } else {
                        style.appendChild(document.createTextNode(css));
                    }

                    head.appendChild(style);
                    window.print();

                    document.body.innerHTML = originalContents;
                }
            </script>

            </body>

            </html>