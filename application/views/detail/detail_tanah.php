<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong>DETAIL DATA TANAH TERSEDIA</strong></h4>
            </div><!-- /.box-header -->
            <hr>
            <section>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Lokasi Tanah</th>
                        <td><?php echo $detail->lokasi ?></td>
                    </tr>

                    <tr>
                        <th>Ukuran Tanah (m2)</th>
                        <td><?php echo $detail->ukuran ?></td>
                    </tr>

                    <tr>
                        <th>Harga Sewa</th>
                        <td><?php echo $detail->biaya ?></td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td><?php echo $detail->status ?></td>
                    </tr>


                </table>
                <a href="<?php echo base_url('Tanah/index') ?> " class="btn btn-primary fa fa-reply-all"> Kembali</a>

            </section>


        </div>
</div>