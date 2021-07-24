<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> EDIT DATA PENYEWA</strong></h4>
            </div><!-- /.box-header -->
            <hr>
            <?php foreach ($penduduk as $row) { ?>
                <form method="post" action="<?php echo base_url('Penyewa/update') ?>">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?php echo $row->nik ?>">
                    </div>
                    <div class="form-group">
                        <label>NAMA PENYEWA/GARAP</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $row->nama ?>">
                    </div>
                    <div class="form-group">
                        <label>ALAMAT </label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $row->alamat ?>">
                    </div>
                    <div>
                        <label>KEDUSUNAN</label>
                        <select name="kedusunan" id="">
                            <?= '<option class="form-group" value="' . $a[$i] . '">' . $row->kedusunan . '</option>' ?>;
                            <?php $a = array('Cimahpar', 'Geger', 'Gelarjaya', 'Girijaya', 'Sinarahayu');
                            for ($i = 0; $i < count($a); $i++) {

                                if ($a[$i] == $row->kedusunan) {
                                    continue;
                                } else {
                                    echo '<option class="form-group" value="' . $a[$i] . '">' . $a[$i] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                <?php } ?>
                <br>
                <div>
                    <a href="<?php echo base_url('Penyewa/index') ?> " class="btn btn-danger fa fa-reply-all"> Kembali</a>
                    <button type="Submit" class="btn btn-primary fa fa-paper-plane"> Simpan</button>
                </div>

                </form>

        </div>
    </section>
</div>