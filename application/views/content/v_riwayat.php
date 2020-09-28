<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

switch($page){

case 'index':
?>

<body>

<div id="wrapper">

<div id="page-wrapper" style="margin: 0">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form Sensus Anggota <a href="<?php echo base_url('formulir/riwayat/tambah/'.$anggota_id) ?>" class="btn btn-primary" style="float:right">+ Tambah</a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php
            if(isset($_SESSION['notify'])){
                echo '<div class="alert alert-'.$_SESSION['notify']['type'].' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$_SESSION['notify']['message'].'</div>';
                unset($_SESSION['notify']);
            }            
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Riwayat Pendidikan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tingkat</th>
                                <th>Nama Sekolah</th>
                                <th>Jurusan</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Lulus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($data['riwayat'] as $list){
                                echo '<tr>
                                        <td class="center" width="10">'.$i.'</td>
                                        <td>'.$list->tingkat.'</td>
                                        <td>'.$list->nama_sekolah.'</td>
                                        <td>'.$list->jurusan.'</td>
                                        <td>'.$list->tahun_masuk.'</td>
                                        <td>'.$list->tahun_lulus.'</td>
                                        <td class="center"><a href="'.base_url('formulir/riwayat/edit/'.$list->riwayat_id).'">Edit</a> | <a href="'.base_url('process/riwayat/delete/'.$list->riwayat_id).'" onclick="return confirm(\'Apakah Anda yakin akan menghapus riwayat pendidikan ini ?\')">Hapus</a></td>
                                     </tr>';
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
break;

case 'tambah':
?>

<body>

<div id="wrapper">

<div id="page-wrapper" style="margin: 0">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form Sensus Anggota <a href="<?php echo base_url('formulir/riwayat/index/'.$anggota_id) ?>" class="btn btn-primary" style="float:right"><i class="fa fa-angle-double-left"></i> Kembali</a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php
    if(isset($_SESSION['notify'])){
        echo '<div class="alert alert-'.$_SESSION['notify']['type'].' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$_SESSION['notify']['message'].'</div>';
        unset($_SESSION['notify']);
    }            
    ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Tambah Riwayat Pendidikan
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <?php echo form_open('formulir/tambah_riwayat/'.$anggota_id); ?>
                                <h3>Data Riwayat Pendidikan</h3>
                                <div class="form-group">
                                    <label>Tingkat</label>
                                    <input type="text" class="form-control" name="tingkat">
                                </div>
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input type="text" class="form-control" name="nama_sekolah">
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Masuk</label>
                                    <input type="number" class="form-control" name="tahun_masuk">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lulus</label>
                                    <input type="number" class="form-control" name="tahun_lulus">
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
break;

case 'edit':
?>

<body>

<div id="wrapper">

<div id="page-wrapper" style="margin: 0">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form Sensus Anggota <a href="<?php echo base_url('formulir/riwayat/index/'.$anggota_id) ?>" class="btn btn-primary" style="float:right"><i class="fa fa-angle-double-left"></i> Kembali</a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php
    if(isset($_SESSION['notify'])){
        echo '<div class="alert alert-'.$_SESSION['notify']['type'].' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$_SESSION['notify']['message'].'</div>';
        unset($_SESSION['notify']);
    }            
    ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Edit Riwayat Pendidikan
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <?php foreach($data['edit'] as $edit){ ?>
                            <?php echo form_open('formulir/edit_riwayat/'.$anggota_id); ?>
                                <h3>Data Riwayat Pendidikan</h3>
                                <div class="form-group">
                                    <label>Tingkat</label>
                                    <input type="text" class="form-control" name="tingkat" value="<?php echo $edit->tingkat ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $edit->nama_sekolah ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan" value="<?php echo $edit->jurusan ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Masuk</label>
                                    <input type="number" class="form-control" name="tahun_masuk" value="<?php echo $edit->tahun_masuk ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Lulus</label>
                                    <input type="number" class="form-control" name="tahun_lulus" value="<?php echo $edit->tahun_lulus ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            <?php echo form_close(); ?>
                            <?php } ?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
break;
} 
?>