<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> LAPORAN SISA PEMBAYARAN</strong></h4>
            </div><!-- /.box-header -->
            <hr>
            <div class="card">
                <div class="card-header">
                    <div class="rows">
                        <div class="col-md-5 ">
                            <button onclick="window.print()" class="btn btn-outline-secondary btn-warning "><i class="fa fa-print"></i>Print</button>
                        </div>
                    </div>
                </div>
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
    </section>
</div>
</body>

</html>