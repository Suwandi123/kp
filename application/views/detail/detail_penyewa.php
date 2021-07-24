<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> DETAIL DATA PENYEWA</strong></h4>
            </div><!-- /.box-header -->
            <hr>
            <section>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>NIK</th>
                        <td><?php echo $detail->nik ?></td>
                    </tr>

                    <tr>
                        <th>Nama Penyewa / Garap</th>
                        <td><?php echo $detail->nama ?></td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $detail->alamat ?></td>

                    </tr>
                    <tr>
                        <th>Kedusunan</th>
                        <td><?php echo $detail->kedusunan ?></td>
                    </tr>

                </table>
                <a href="<?php echo base_url('Penyewa/index') ?> " class="btn btn-primary fa fa-reply-all "> Kembali</a>

            </section>


        </div>
</div>