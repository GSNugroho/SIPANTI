<?php
$this->load->view('mainmenu');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<!-- <link href="<?php //echo base_url('assets/vendor/fontawesome-free/css/all.min.css') 
                    ?>" rel="stylesheet" type="text/css"> -->
<!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/sb-admin-2.min.css') 
                                    ?>" /> -->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css') ?>">

<link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap/css/jquery-ui.css') ?>" rel="stylesheet">

<script src="<?php echo base_url('assets/js/my_js.js') ?>"></script>

<script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

<!-- <script src="<?php //echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')
                    ?>"></script> -->
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script type="text/javascript" src="<?php echo base_url('assets/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>

<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 20px;
    }
</style>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Perbaikan</h6>
    </div>
    <div class="card-body">
        <div class="row col-md-14">
            <div class="col-md-6">
                <h2 style="margin-top:0px"> </h2>
                <form action="<?php echo base_url() . 'perbaikan/create_action'; ?>" method="post">
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="kd_inv_pr">Kode Inventaris <?php //echo form_error('nm_inv') 
                                                                            ?></label>
                                    <input class="form-control" type="text" name="kd_inv_pr" id="vc_no_inv" placeholder="Kode Inventaris" readonly>
                                    <a href="#" class="btn btn-info" id="pilihBrg" data-toggle="modal" data-target="#modalBarang">Pilih Barang</a>
                                </div>
                                <div class="modal fade bd-example-modal-lg" id="modalBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog1" role="document" style="width:auto;margin-left:150px;margin-right:150px">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Data Inventaris IT</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <table class="table table-bordered" id="myTable" >
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Inventaris</th>
                                                            <th>Kode Aset</th>
                                                            <th>Nama Barang</th>
                                                            <th>Nama Pengguna</th>
                                                            <th>Ruang</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($get_barang as $row) {
                                                            $no = $i + 1;
                                                            echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $row->kd_inv . "<input type='hidden' name='kd_inv" . $i . "' class='form-control' readonly value='" . $row->kd_inv . "'></td>
                                            <td>" . $row->kd_aset . "<input type='hidden' name='kd_aset" . $i . "' class='form-control' readonly value='" . $row->kd_aset . "'></td>
                                            <td>" . $row->nm_inv . "<input type='hidden' name='nm_inv" . $i . "' class='form-control' readonly value='" . $row->nm_inv . "'</td>
                                            <td>" . $row->vc_nm_pengguna . "<input type='hidden' name='nm_pengguna" . $i . "' class='form-control' readonly value='" . $row->vc_nm_pengguna . "'</td>
                                            <td>" . $row->vc_n_gugus . "<input type='hidden' name='nm_ruang" . $i . "' class='form-control' readonly value='" . $row->vc_n_gugus . "'</td>
                                            <td><a href='#' onclick=ambil_value('" . $row->kd_inv . "','" . $row->id_ruang . "','" . $row->vc_n_gugus . "')>Pilih</a></td>
                                            </tr>";
                                                            $i++;
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        var table = $('#myTable').DataTable({
                                            // columnDefs: [{
                                            //     orderable: false,
                                            //     targets: [6]
                                            // }]
                                        });
                                    });

                                    function ambil_value(s, t, u) {
                                        document.getElementById('vc_no_inv').value = s;
                                        document.getElementById('nm_rng').value = u;
                                        document.getElementById('id_ruang').value = t;
                                        $('#modalBarang').modal('hide');
                                        var id = $('#vc_no_inv').val();
                                        var dataString = 'id=' + id;
                                        $.ajax({
                                            type: "GET",
                                            url: "<?php echo base_url('perbaikan/riwayat') ?>",
                                            data: dataString,
                                            success: function(trHtml) {
                                                console.log('sukses');
                                                $('#rwytprb').append(trHtml);
                                            }
                                        })
                                    }
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="id_inv_ruang">Ruang </label>
                                    <!-- <select name="id_ruang" class="form-control" id="id_ruang"> -->
                                    <!-- <option value="">--Pilih Ruang--</option> -->
                                    <?php
                                    // foreach ($dd_gr as $row) {
                                    //     echo "<option value='" . $row->vc_k_gugus . "'>" . $row->vc_n_gugus . "</option>";
                                    // }
                                    // echo "</select>"
                                    ?>
                                    <input type="text" name="nm_ruang" class="form-control" id="nm_rng" readonly>
                                    <input type="hidden" name="id_ruang" id="id_ruang">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="tgl_inv_pr">Tanggal Perbaikan Inventaris</label>
                                    <div class="input-group date" id="tgl1">
                                        <input class="form-control" type="text" name="tgl_inv_pr" id="tgl_inv_pr" placeholder="dd-mm-yyyy">
                                        <span class="input-group-addon" style="padding-right: 25px;padding-top: 9px;"><span class="glyphicon-calendar glyphicon"></span></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="jns_kr">Jenis Kerusakan</label>
                                    <select name="jns_kr" class="form-control" id="jns_kr">
                                        <option value="">--Pilih Kerusakan--</option>
                                        <option value="1">Ringan</option>
                                        <option value="2">Parah</option>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="jns_pr">Jenis Perbaikan</label>
                                    <select name="jns_pr" class="form-control" id="jns_pr">
                                        <option value="">--Pilih Perbaikan--</option>
                                        <option value="1">Pengecekan</option>
                                        <option value="2">Ganti Sparepart</option>
                                        <option value="3">Service</option>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="sp_gt">Sparepart</label>
                                    <input class="form-control" type="text" name="sp_gt" id="sp_gt" placeholder="Sparepart">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="sp_by">Biaya</label>
                                    <input class="form-control" type="number" name="sp_by" id="sp_by" pattern="[0-9]*" placeholder="Biaya">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <input class="form-control" type="text" name="ket" id="ket" placeholder="Keterangan">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="<?php echo site_url('perbaikan') ?>" class="btn btn-danger">Batal</a>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </form>
                <script>
                    $(document).ready(function() {
                        $("#loading").hide();
                        $("#id_ruang").change(function() {
                            $("#kd_inv_pr").hide();
                            $("#loading").show();

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url("perbaikan/list_inv"); ?>",
                                data: {
                                    id_ruang: $("#id_ruang").val()
                                },
                                dataType: "json",
                                beforeSend: function(e) {
                                    if (e && e.overrideMimeType) {
                                        e.overrideMimeType("application/json;charset=UTF-8");
                                    }
                                },
                                success: function(response) {
                                    $("#loading").hide();
                                    $("#pop").html(response.list_inv).show();
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                                }
                            });
                        });
                    });

                    $(function() {
                        $("#sp_gt").autocomplete({
                            minLength: 0,
                            delay: 0,
                            source: '<?php echo site_url('perbaikan/autocomplete/?'); ?>',
                            select: function(event, ui) {
                                $('#sparepart').val(ui.item.sp_gt);
                            }
                        });
                    });
                </script>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered" id="rwytprb" style="overflow-y:auto; height:200px; width:500px; display:block;">
                    <tr>
                        <th>Tanggal Perbaikan</th>
                        <th>Kerusakan</th>
                        <th>Biaya</th>
                        <th>Keterangan</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
</div>
<script>
    $(function() {
        $('#tgl1').datetimepicker({
            locale: 'id',
            format: "DD-MM-YYYY"
        });
    });
</script>
</body>

</html>