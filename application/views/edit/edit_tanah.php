<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> EDIT DATA TANAH TERSEDIA</strong></h4>
            </div><!-- /.box-header -->
            <hr>
            <?php foreach ($tanah as $row) { ?>
                <form method="post" action="<?php echo base_url('Tanah/update') ?>">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                        <label>LOKASI TANAH</label>
                        <input type="text" name="lokasi" class="form-control" value="<?php echo $row->lokasi ?>">
                    </div>
                    <div class="form-group">
                        <label>UKURAN TANAH (m2)</label>
                        <input type="text" name="ukuran" class="form-control" value="<?php echo $row->ukuran ?>">
                    </div>
                    <div class="form-group">
                        <label>HARGA SEWA </label>
                        <input type="text" name="biaya" class="form-control" value="<?php echo $row->biaya ?>">
                    </div>
                    <div class="form-group">
                        <label>STATUS </label>
                        <input type="text" name="status" class="form-control" value="<?php echo $row->status ?>">
                    </div>
                    <a href="<?php echo base_url('Tanah/index') ?> " class="btn btn-danger fa fa-reply-all"> Kembali</a>
                    <button type="Submit" class="btn btn-primary fa fa-paper-plane"> Simpan</button>
                </form>
            <?php } ?>
        </div>
    </section>
</div>