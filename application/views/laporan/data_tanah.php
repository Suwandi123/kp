<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> LAPORAN DATA TANAH TERSEDIA</strong></h4>
            </div><!-- /.box-header -->
            <hr>

            <div class="card">
                <div class="card-header">
                    <div class="rows">
                        <div class="col-md-5 ">
                            <button onclick="window.print()" class="btn btn-outline-secondary btn-warning "><i class="fa fa-print"></i>Print</button>
                            <a class="btn btn-outline-secondary btn-danger " href="<?php echo base_url('Tanah/excel') ?>"><i class="fa fa-file "></i>Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive col-sm-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">Lokasi Tanah </th>
                            <th class="text-center">Ukuran Tanah (m2)</th>
                            <th class="text-center">Harga Sewa</th>
                            <th class="text-center">Status</th>
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