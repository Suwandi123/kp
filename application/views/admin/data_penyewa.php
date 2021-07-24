<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> DATA PENYEWA</strong></h4>
            </div><!-- /.box-header -->
            <hr>

            <button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#exampleModal" style=" margin: 0px 0px 10px 10px;"> Tambah Data</button>

            <div class="navbar-form navbar-right">
                <?php echo form_open('Penyewa/search') ?>
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
                            <th class="text-center">NIK </th>
                            <th class="text-center">NAMA PENYEWA/GARAP </th>
                            <th class="text-center">TANGGAL LAHIR </th>
                            <th class="text-center">ALAMAT </th>
                            <th class="text-center">KEDUSUNAN </th>
                            <th colspan="3" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($penduduk as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $row->nik ?></td>
                                <td class="text-center"><?= $row->nama ?></td>
                                <td class="text-center"><?= $row->ttl ?></td>
                                <td class="text-center"><?= $row->alamat ?></td>
                                <td class="text-center"><?= $row->kedusunan ?></td>

                                <td class=" text-center" onclick="javascript: return confirm('Anda Yakin Ingin Menghapus')">
                                    <?php echo anchor('Penyewa/hapus/' . $row->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</div>') ?>
                                </td>


                                <td class="text-center">
                                    <?php echo anchor('Penyewa/edit_penyewa/' . $row->id, '<div class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>Update</div>') ?>
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
                        <h3 class="modal-title" id="exampleModalLabel">Form Input Data Penyewa</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url('Penyewa/tambah_aksi') ?>">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" min="0" name="nik" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>NAMA PENYEWA/GARAP</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>TANGGAL LAHIR</label>
                                <input type="date" name="ttl" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>ALAMAT</label>
                                <input type="text" name="alamat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>KEDUSUNAN</label>
                                <select class="form-control" name="kedusunan" required>
                                    <option>Pilih Kedusunan</option>
                                    <option>Cimahpar</option>
                                    <option>Geger</option>
                                    <option>Girijaya</option>
                                    <option>Gelarjaya</option>
                                    <option>Sinarahayu</option>
                                </select>
                            </div>
                            <button type="reset" class="btn btn-danger fa fa-times" data-dismiss="modal"> Batal</button>
                            <button type="submit" class="btn btn-primary fa fa-paper-plane"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>

</html>