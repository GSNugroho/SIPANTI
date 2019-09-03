<?php
    $this->load->view('mainmenu');
?>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">

    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/jquery-ui.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/my_js.js')?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
    <script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    
	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>"></script>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Perbaikan</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url().'report/get_riwayat_perbaikan'?>" method="post">
                <table>
                <tr>
                <td>
                <div class="form-group">
                <label for="id_ruang">Ruang <?php //echo form_error('id_ruang') ?></label>
                <select require name="id_ruang" class="form-control" id="id_ruang">
                    <option value="">--Pilih Ruang--</option>
                    <?php
                        foreach ($dd_gr as $row) {  
                            echo "<option value='".$row->vc_k_gugus."'>".$row->vc_n_gugus."</option>";
                            }
                            echo"
                        </select>"
                    ?>
                
                </td>
                </tr>
                <tr>
                <td>
                    <div class="form-group">
                    <label for="kd_inv_pr">Kode Inventaris <?php //echo form_error('nm_inv') ?></label>
			        <input class="form-control" type="text" name="kd_inv" id="vc_no_inv" placeholder="Kode Inventaris" onclick="div_show()">
                    </div>
                    <div id="abc">
                        <div id="popupContact">
                        <img id="close" src="<?php echo base_url('assets/bootstrap/image/3.png')?>" onclick ="div_hide()">
                        <h5>Daftar Inventaris</h5>
                        <table id="pop" border="1">
                        <tr><td><b>Kode Inventaris</b></td><td><b>Kode Aset</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>
                        </table>
                        </div>
                    </div>
                </td>
                </tr>
                <tr>
                <td>
                <button type="submit" class="btn btn-primary">Cetak</button>
                </td>
                </tr>
            </table>    
            </form>
            </div></div></div>
            
    <footer class="sticky-footer bg-white">
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
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

	<!-- Page level plugins -->
	<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

	<!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/js/datatables-demo.js')?>"></script>    
    
    <script>

        $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
            // Kita sembunyikan dulu untuk loadingnya
            $("#loading").hide();
            
            $("#id_ruang").change(function(){ // Ketika user mengganti atau memilih data provinsi
            $("#kd_inv_mts").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya
            
            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("Mutasi/list_inv"); ?>", // Isi dengan url/path file php yang dituju
                data: {id_ruang : $("#id_ruang").val()}, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
                },
                success: function(response){ // Ketika proses pengiriman berhasil
                $("#loading").hide(); 

                $("#pop").html(response.list_inv).show();
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
            });
        });
        </script>

</body>
</html>