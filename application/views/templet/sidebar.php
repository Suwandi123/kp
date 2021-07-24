<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url() ?>assets/dist/img/grj2.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo ucfirst($this->fungsi->user_login()->username) ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li <?= $this->uri->segment(1) == 'Welcome' ? 'class="active"' : '' ?>>
                <a href="<?php echo site_url() ?>/Welcome/index">
                    <i class="fa fa-dashboard" aria-hidden="true"></i><span>Dashboard</span>
                </a>
            </li>

            <li <?= $this->uri->segment(1) == 'Penyewa' ? 'class="active"' : '' ?>>
                <a href="<?php echo site_url() ?>/Penyewa/index">
                    <i class="fa fa-user" aria-hidden="true"></i><span>Data Penyewa</span>
                </a>
            </li>

            <li <?= $this->uri->segment(1) == 'Pembayaran' ? 'class="active"' : '' ?>>
                <a href="<?php echo site_url() ?>/Pembayaran/index">
                    <i class="fa fa-credit-card" aria-hidden="true"></i><span>Sisa Pembayaran</span>
                </a>
            </li>

            <li <?= $this->uri->segment(1) == 'Tanah' ? 'class="active"' : '' ?>>
                <a href="<?php echo site_url() ?>/Tanah/index">
                    <i class="fa fa-database" aria-hidden="true"></i><span>Data Tanah Tersedia</span>
                </a>
            </li>

            <li class="treeview" name="laporan">
                <a href="#">
                    <i class="fa fa-print"></i>
                    <span>Laporan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url() ?>L_penyewa/index"><i class="fa fa-circle-o"></i> Data Penyewa</a></li>
                    <li><a href="<?php echo site_url() ?>L_tanah/index"><i class="fa fa-circle-o"></i> Data Tanah Tersedia</a></li>
                    <li><a href="<?php echo site_url() ?>L_sisa/index"><i class="fa fa-circle-o"></i> Sisa Pembayaran</a></li>
                </ul>
            </li>

            <br>
            <li class="header">
            <li>
                <a class="profile-pic " href="<?= base_url('login/logout') ?>">
                    <i class="fa fa-sign-out"></i>
                    <span class="text-white text-bold font-medium ">Logout</span></a>
            </li>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>