<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

switch($page){

case 'index':
?>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Data Tanggungan <a href="<?php echo base_url('tanggungan/tambah') ?>" class="btn btn-primary" style="float:right">+ Tambah</a></h2>
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
                Daftar Data Tanggungan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tanggungan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach($tanggungan as $list){
                            echo '<tr>
                                    <td class="center" width="10">'.$i.'</td>
                                    <td>'.$list->nama.'</td>
                                    <td class="center">'.anchor('tanggungan/edit/'.$list->tanggungan_id, 'Edit').' | '.anchor('tanggungan/hapus_tanggungan/'.$list->tanggungan_id, 'Hapus', 'onclick="return confirm(\'Apakah Anda yakin akan menghapus data tanggungan ini ?\')"').'</td>
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

<?php
break;

case 'tambah':
?>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tambah Data Tanggungan <a href="<?php echo base_url('tanggungan') ?>" class="btn btn-primary" style="float:right"><i class="fa fa-angle-double-left"></i> Kembali</a></h2>
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
                Form Tambah Data Tanggungan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php echo form_open('tanggungan/tambah_tanggungan'); ?>
                            <div class="form-group">
                                <label>Nama Tanggungan</label>
                                <input type="text" class="form-control" name="nama" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
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

<?php
break;

case 'edit':
?>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Edit Data Tanggungan <a href="<?php echo base_url('tanggungan') ?>" class="btn btn-primary" style="float:right"><i class="fa fa-angle-double-left"></i> Kembali</a></h2>
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
                Form Edit Data Tanggungan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php echo form_open('tanggungan/edit_tanggungan/'.$edit->tanggungan_id); ?>
                            <div class="form-group">
                                <label>Nama Tanggungan</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $edit->nama ?>" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
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

<?php
break;
} 
?>