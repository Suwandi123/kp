<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h4 class="box-title"><strong> LAPORAN DATA PENYEWA</strong></h4>
            </div><!-- /.box-header -->
            <hr>

            <div class="card">
                <div class="card-header">
                    <div class="rows">
                        <div class="col-md-5 ">
                            <button onclick="window.print()" class="btn btn-outline-secondary btn-warning "><i class="fa fa-print"></i>Print</button>
                            <a class="btn btn-outline-secondary btn-danger " href="<?php echo base_url('Penyewa/excel') ?>"><i class="fa fa-file "></i>Export Excel</a>
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
                            <th class="text-center">NIK </th>
                            <th class="text-center">NAMA PENYEWA/GARAP </th>
                            <th class="text-center">ALAMAT </th>
                            <th class="text-center">KEDUSUNAN </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($penduduk as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $row->nik ?></td>
                                <td class="text-center"><?= $row->nama ?></td>
                                <td class="text-center"><?= $row->alamat ?></td>
                                <td class="text-center"><?= $row->kedusunan ?></td>
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