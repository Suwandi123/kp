<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> SISA PEMBAYARAN</strong></h4>
            </div><!-- /.box-header -->
            <hr>

            <button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#exampleModal" style=" margin: 0px 0px 10px 10px;"> Tambah Data</button>

            <button type="button" class="btn btn-warning fa fa-credit-card" data-toggle="modal" id="pembayaran2" data-target="#pembayaran" style=" margin: 0px 0px 10px 10px;"> Pembayaran</button>

            <div class="navbar-form navbar-right">
                <?php echo form_open('Pembayaran/search') ?>
                <input type="text" name="keyword" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-success fa fa-search"> Cari</button>
                <?php echo form_close() ?>

            </div>

            <div class="table-responsive col-sm-12">
                <table class="table table-bordered table-striped">
                    <?php echo $this->session->flashdata('pesan'); ?>

                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">NAMA PENYEWA/GARAP </th>
                            <th class="text-center">LOKASI TANAH SEWA </th>
                            <th class="text-center">HARGA SEWA</th>
                            <th class="text-center">AWAL SEWA</th>
                            <th class="text-center">AKHIR SEWA</th>
                            <th class="text-center">SISA PEMBAYARAN</th>
                            <th colspan="3" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pembayaran as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $row->nik ?></td>
                                <td class="text-center"><?= $row->nama ?></td>
                                <td class="text-center"><?= $row->lokasi ?></td>
                                <td class="text-center"><?= $row->biaya ?></td>
                                <td class="text-center"><?= $row->tgl_awal ?></td>
                                <td class="text-center"><?= $row->tgl_akhir ?></td>
                                <td class="text-center"><?php if ($row->sisa == 0) {
                                                            echo "Lunas";
                                                        } else {
                                                            echo $row->sisa;
                                                        }
                                                        ?></td>

                                <td class=" text-center" onclick="javascript: return confirm('Anda Yakin Ingin Menghapus')">
                                    <?php echo anchor('Pembayaran/hapus/' . $row->id_pembayaran, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</div>') ?>
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
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Form Input Penyewa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="sewa">

                    <div class="form-group">
                        <label>Nama Penyewa/ Garap</label>
                        <select name="nama" class="form-control">
                            <?php foreach ($penduduk as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->nama  ?> &nbsp;&nbsp; <?= $row->nik  ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lokasi Tanah Sewa</label>
                        <select name="lokasi" class="lokasi form-control">
                            <?php foreach ($tanah as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->lokasi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Awal Sewa</label>
                        <input type="date" name="tgl_awal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Lama Sewa</label>
                        <input type="text" name="lama_sewa" class="lama_sewa form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="uang form-control" name="uang" disabled required>
                    </div>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <input type="text" class="pembayaran form-control" name="pembayaran">
                        </select>
                    </div>
                    <button type="reset" class="btn btn-danger fa fa-times" data-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-primary fa fa-paper-plane"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" id="pembayaran" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Update Pembayaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="bayar">
                    <div class="form-group">
                        <label>Penyewa</label>
                        <select name="id_pembayaran" class="nomor form-control">
                            <?php foreach ($belum as $row) { ?>
                                <option value="<?= $row->id_pembayaran ?>"><?= $row->nama ?>&nbsp;&nbsp;&nbsp;<?= $row->nik ?></option>
                            <?php  } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lokasi Tanah Sewa</label>
                        <input type="text" class="lokasi form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <input type="text" class="uang form-control" name="uang">
                        </select>
                    </div>

                    <button type="reset" class="btn btn-danger fa fa-times" data-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-primary fa fa-paper-plane kirim"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

</body>

</html>