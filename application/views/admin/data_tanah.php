<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> DATA TANAH TERSEDIA</strong></h4>
            </div><!-- /.box-header -->
            <hr>

            <button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#exampleModal" style=" margin: 0px 0px 10px 10px;"> Tambah Data</button>

            <!--pencarian filter status -->
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Pencarian Status</option>
                <option value="">Semua Data</option>
                <option value="1">Telah Disewa</option>
                <option value="0">Belum Disewa</option>

            </select>

            <!--Pencarian-->
            <div class="navbar-form navbar-right">
                <?php echo form_open('Tanah/search') ?>
                <input type="text" name="keyword" autocomplete="off" autofocus class="form-control" placeholder="Masukan Data Yang dicari!">
                <button type="submit" class="btn btn-success fa fa-search"> Cari</button>
                <?php echo form_close() ?>

            </div>
            <div class="table-responsive col-sm-12">
                <table class="table table-bordered table-striped">
                    <?php echo $this->session->flashdata('pesan'); ?>

                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">Lokasi Tanah </th>
                            <th class="text-center">Ukuran Tanah (m2)</th>
                            <th class="text-center">Harga Sewa</th>
                            <th class="text-center">Status</th>
                            <th colspan="1" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tanah as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $row->lokasi ?></td>
                                <td class="text-center"><?= $row->ukuran ?></td>
                                <td class="text-center"><?= $row->biaya ?></td>
                                <td class="text-center"><?php if ($row->status == 0) {
                                                            echo "Belum Disewa";
                                                        } else {
                                                            echo "Telah Disewa";
                                                        }
                                                        ?></td>

                                <td class=" text-center" onclick="javascript: return confirm('Anda Yakin Ingin Menghapus')">
                                    <?php echo anchor('Tanah/hapus/' . $row->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</div>') ?>
                                </td>


                                <td class="text-center">
                                    <?php echo anchor('Tanah/edit_tanah/' . $row->id, '<div class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>Update</div>') ?>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Form Input Data Tanah Tersedia</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url('Tanah/tambah_aksi') ?>">
                            <div class="form-group">
                                <label>LOKASI TANAH</label>
                                <input type="text" name="lokasi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>UKURAN TANAH (m2)</label>
                                <input type="text" name="ukuran" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>HARGA SEWA</label>
                                <input type="text" name="biaya" class="form-control" required>
                            </div>

                            <button type="reset" class="btn btn-danger fa fa-times" data-dismiss="modal"> Batal</button>
                            <button type="submit" class="btn btn-primary fa fa-paper-plane"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>
</body>

</html>