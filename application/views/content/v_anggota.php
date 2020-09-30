<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

switch($page){

case 'index':
?>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Data Anggota <!-- <a href="<?php echo base_url('formulir/riwayat/tambah/'.$anggota_id) ?>" class="btn btn-primary" style="float:right">+ Tambah</a> --></h2>
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
                Daftar Data Anggota
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Anggota</th>
                            <th>Nama Lengkap</th>
                            <th>Jamaah</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach($anggota as $list){
                            echo '<tr>
                                    <td class="center" width="10">'.$i.'</td>
                                    <td>'.$list->nomor_anggota.'</td>
                                    <td>'.$list->nama_lengkap.'</td>
                                    <td>'.$list->jamaah.'</td>
                                    <td class="center"><a target="_blank" href="'.base_url('media/foto/'.$list->foto).'">Lihat Foto</a></td>
                                    <td class="center">'.anchor('anggota/detail/'.$list->anggota_id, 'Detail').' | '.anchor('anggota/edit/'.$list->anggota_id, 'Edit').' | '.anchor('anggota/hapus/'.$list->anggota_id, 'Hapus', 'onclick="return confirm(\'Apakah Anda yakin akan menghapus data anggota ini ?\')"').'</td>
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

case 'detail':
?>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Detail Data Anggota <a href="<?php echo base_url('anggota') ?>" class="btn btn-primary" style="float:right"><i class="fa fa-angle-double-left"></i> Kembali</a></h2>
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
                Data Pribadi & Data Keluarga
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php foreach($detail as $data){ ?>
                            <h3>Data Pribadi</h3>
                            <div class="form-group">
                                <label>Nomor Anggota</label>
                                <input readonly type="text" class="form-control" name="nomor_anggota" value="<?php echo $data->nomor_anggota ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input readonly type="text" class="form-control" name="nama_lengkap" required="" value="<?php echo $data->nama_lengkap ?>">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input readonly type="text" class="form-control" name="tempat_lahir" required="" value="<?php echo $data->tempat_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input readonly type="date" class="form-control" name="tanggal_lahir" required="" value="<?php echo $data->tanggal_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label>Status Menikah</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="status_nikah" value="N" <?php if($data->status_nikah=='N') echo ' checked'; ?>> Belum Menikah
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="status_nikah" value="Y" <?php if($data->status_nikah=='Y') echo ' checked'; ?>> Menikah
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="golongan_darah" value="A+" <?php if($data->golongan_darah=='A+') echo ' checked'; ?>> A+
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="golongan_darah" value="A-" <?php if($data->golongan_darah=='A-') echo ' checked'; ?>> A-
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="golongan_darah" value="B+" <?php if($data->golongan_darah=='B+') echo ' checked'; ?>> B+
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="golongan_darah" value="B-" <?php if($data->golongan_darah=='B-') echo ' checked'; ?>> B-
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="golongan_darah" value="AB+" <?php if($data->golongan_darah=='AB+') echo ' checked'; ?>> AB+
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="golongan_darah" value="AB-" <?php if($data->golongan_darah=='AB-') echo ' checked'; ?>> AB-
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="golongan_darah" value="O" <?php if($data->golongan_darah=='O') echo ' checked'; ?>> O
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Aktif</label>
                                <input readonly type="email" class="form-control" name="email" value="<?php echo $data->email ?>">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input readonly type="number" class="form-control" name="telepon" value="<?php echo $data->telepon ?>">
                            </div>
                            <div class="form-group">
                                <label>No WhatsApp Aktif</label>
                                <input readonly type="number" class="form-control" name="whatsapp" value="<?php echo $data->whatsapp ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Tinggal Saat Ini</label>
                                <textarea readonly="" name="alamat" class="form-control" rows="5" required=""><?php echo $data->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <input readonly type="number" class="form-control" name="nomor_ktp" value="<?php echo $data->nomor_ktp ?>">
                            </div>
                            <div class="form-group">
                                <label>Tahun Masuk Anggota</label>
                                <input readonly type="number" class="form-control" name="tahun_masuk" value="<?php echo $data->tahun_masuk ?>">
                            </div>
                            <div class="form-group">
                                <label>Jamaah</label>
                                <select readonly class="form-control" name="jamaah" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($jamaah as $j){
                                        echo '<option value="'.$j->jamaah_id.'"'; if($data->jamaah_id==$j->jamaah_id) echo ' selected'; echo '>'.$j->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hobi</label>
                                <input readonly type="text" class="form-control" name="hobi" value="<?php echo $data->hobi ?>">
                            </div>
                            <div class="form-group">
                                <label>Keahlian</label>
                                <input readonly type="text" class="form-control" name="keahlian" value="<?php echo $data->keahlian ?>">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Pokok</label>
                                <select readonly id="pekerjaan" class="form-control" name="pekerjaan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pekerjaan as $k){
                                        echo '<option value="'.$k->pekerjaan_id.'"'; if($data->pekerjaan_id==$k->pekerjaan_id) echo ' selected'; echo '>'.$k->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="lainnya" class="form-group" <?php if($data->pekerjaan_id!=6) echo ' style="display: none;"'; ?>>
                                <label>Pekerjaan Lainnya</label>
                                <input readonly type="text" class="form-control" name="pekerjaan_lain" value="<?php echo $data->pekerjaan_lain ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Instansi Pekerjaan</label>
                                <input readonly type="text" class="form-control" name="nama_instansi" value="<?php echo $data->nama_instansi ?>">
                            </div>
                            <div class="form-group">
                                <label>Apakah Mempunyai Pekerjaan Sampingan ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="sampingan" value="Y" <?php if($data->sampingan=='Y') echo ' checked'; ?>> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="sampingan" value="N" <?php if($data->sampingan=='N') echo ' checked'; ?>> Tidak
                                    </label>
                                </div>
                            </div>
                            <div id="pekerjaan_sampingan" class="form-group" <?php if($data->sampingan=='N') echo ' style="display: none;"'; ?>>
                                <label>Pekerjaan Sampingan</label>
                                <input readonly type="text" class="form-control" name="pekerjaan_sampingan" value="<?php echo $data->pekerjaan_sampingan ?>">
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select readonly class="form-control" name="pendidikan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pendidikan as $d){
                                        echo '<option value="'.$d->pendidikan_id.'" '; if($data->pendidikan_id==$d->pendidikan_id) echo ' selected'; echo '>'.$d->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pendapatan Total Rata-Rata Selama Sebulan</label>
                                <select readonly class="form-control" name="pendapatan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pendapatan as $t){
                                        echo '<option value="'.$t->pendapatan_id.'" '; if($data->pendapatan_id==$t->pendapatan_id) echo ' selected'; echo '>'.$t->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Berapa Jumlah Tanggungan</label>
                                <select readonly class="form-control" name="tanggungan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($tanggungan as $g){
                                        echo '<option value="'.$g->tanggungan_id.'" '; if($data->tanggungan_id==$g->tanggungan_id) echo ' selected'; echo '>'.$g->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Apakah Anda Menjadi Anggota Organisasi Kemasyarakatan, Intra atau Ekstra Kampus ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="organisasi_lain" value="Y" <?php if($data->organisasi_lain=='Y') echo ' checked'; ?>> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="organisasi_lain" value="N" <?php if($data->organisasi_lain=='N') echo ' checked'; ?>> Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" id="nama_organisasi" <?php if($data->organisasi_lain=='N') echo ' style="display: none;"'; ?>>
                                <label>Jika Iya Sebutkan Nama Organisasinya</label>
                                <input readonly type="text" class="form-control" name="nama_organisasi" value="<?php echo $data->nama_organisasi ?>">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <p class="help-block"><?php if($data->foto) echo '<a target="_blank" href="'.base_url('media/foto/'.$data->foto).'">Lihat Foto</a>' ?></p>
                            </div>

                            <h3>Data Keluarga</h3>
                            <div class="form-group">
                                <label>Nama Istri</label>
                                <input readonly type="text" class="form-control" name="nama_istri" value="<?php echo $data->nama_istri ?>">
                            </div>
                            <div class="form-group">
                                <label>Anggota Otonom Persis ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="anggota_otonom" value="Y" <?php if($data->anggota_otonom=='Y') echo ' checked'; ?>> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input disabled="" type="radio" name="anggota_otonom" value="N" <?php if($data->anggota_otonom=='N') echo ' checked'; ?>> Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Anak</label>
                                <input readonly type="number" class="form-control" name="jumlah_anak" value="<?php echo $data->jumlah_anak ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

        
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Riwayat Pendidikan
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach($riwayat as $list){
                            echo '<tr>
                                    <td class="center" width="10">'.$i.'</td>
                                    <td>'.$list->tingkat.'</td>
                                    <td>'.$list->nama_sekolah.'</td>
                                    <td>'.$list->jurusan.'</td>
                                    <td>'.$list->tahun_masuk.'</td>
                                    <td>'.$list->tahun_lulus.'</td>
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
        <h2 class="page-header">Edit Data Anggota <a href="<?php echo base_url('anggota') ?>" class="btn btn-primary" style="float:right"><i class="fa fa-angle-double-left"></i> Kembali</a></h2>
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
                Data Pribadi & Data Keluarga
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php foreach($edit as $data){ ?>
                        <?php echo form_open_multipart('anggota/edit_anggota/'.$anggota_id); ?>
                            <h3>Data Pribadi</h3>
                            <div class="form-group">
                                <label>Nomor Anggota</label>
                                <input type="text" class="form-control" name="nomor_anggota" value="<?php echo $data->nomor_anggota ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required="" value="<?php echo $data->nama_lengkap ?>">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required="" value="<?php echo $data->tempat_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" required="" value="<?php echo $data->tanggal_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label>Status Menikah</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="status_nikah" value="N" <?php if($data->status_nikah=='N') echo ' checked'; ?>> Belum Menikah
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status_nikah" value="Y" <?php if($data->status_nikah=='Y') echo ' checked'; ?>> Menikah
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="A+" <?php if($data->golongan_darah=='A+') echo ' checked'; ?>> A+
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="A-" <?php if($data->golongan_darah=='A-') echo ' checked'; ?>> A-
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="B+" <?php if($data->golongan_darah=='B+') echo ' checked'; ?>> B+
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="B-" <?php if($data->golongan_darah=='B-') echo ' checked'; ?>> B-
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="AB+" <?php if($data->golongan_darah=='AB+') echo ' checked'; ?>> AB+
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="AB-" <?php if($data->golongan_darah=='AB-') echo ' checked'; ?>> AB-
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="O" <?php if($data->golongan_darah=='O') echo ' checked'; ?>> O
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Aktif</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $data->email ?>">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" name="telepon" value="<?php echo $data->telepon ?>">
                            </div>
                            <div class="form-group">
                                <label>No WhatsApp Aktif</label>
                                <input type="number" class="form-control" name="whatsapp" value="<?php echo $data->whatsapp ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Tinggal Saat Ini</label>
                                <textarea name="alamat" class="form-control" rows="5" required=""><?php echo $data->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <input type="number" class="form-control" name="nomor_ktp" value="<?php echo $data->nomor_ktp ?>">
                            </div>
                            <div class="form-group">
                                <label>Tahun Masuk Anggota</label>
                                <input type="number" class="form-control" name="tahun_masuk" value="<?php echo $data->tahun_masuk ?>">
                            </div>
                            <div class="form-group">
                                <label>Jamaah</label>
                                <select class="form-control" name="jamaah" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($jamaah as $j){
                                        echo '<option value="'.$j->jamaah_id.'"'; if($data->jamaah_id==$j->jamaah_id) echo ' selected'; echo '>'.$j->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hobi</label>
                                <input type="text" class="form-control" name="hobi" value="<?php echo $data->hobi ?>">
                            </div>
                            <div class="form-group">
                                <label>Keahlian</label>
                                <input type="text" class="form-control" name="keahlian" value="<?php echo $data->keahlian ?>">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Pokok</label>
                                <select id="pekerjaan" class="form-control" name="pekerjaan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pekerjaan as $k){
                                        echo '<option value="'.$k->pekerjaan_id.'"'; if($data->pekerjaan_id==$k->pekerjaan_id) echo ' selected'; echo '>'.$k->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="lainnya" class="form-group" <?php if($data->pekerjaan_id!=6) echo ' style="display: none;"'; ?>>
                                <label>Pekerjaan Lainnya</label>
                                <input type="text" class="form-control" name="pekerjaan_lain" value="<?php echo $data->pekerjaan_lain ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Instansi Pekerjaan</label>
                                <input type="text" class="form-control" name="nama_instansi" value="<?php echo $data->nama_instansi ?>">
                            </div>
                            <div class="form-group">
                                <label>Apakah Mempunyai Pekerjaan Sampingan ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="sampingan" value="Y" <?php if($data->sampingan=='Y') echo ' checked'; ?>> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sampingan" value="N" <?php if($data->sampingan=='N') echo ' checked'; ?>> Tidak
                                    </label>
                                </div>
                            </div>
                            <div id="pekerjaan_sampingan" class="form-group" <?php if($data->sampingan=='N') echo ' style="display: none;"'; ?>>
                                <label>Pekerjaan Sampingan</label>
                                <input type="text" class="form-control" name="pekerjaan_sampingan" value="<?php echo $data->pekerjaan_sampingan ?>">
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control" name="pendidikan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pendidikan as $d){
                                        echo '<option value="'.$d->pendidikan_id.'" '; if($data->pendidikan_id==$d->pendidikan_id) echo ' selected'; echo '>'.$d->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pendapatan Total Rata-Rata Selama Sebulan</label>
                                <select class="form-control" name="pendapatan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pendapatan as $t){
                                        echo '<option value="'.$t->pendapatan_id.'" '; if($data->pendapatan_id==$t->pendapatan_id) echo ' selected'; echo '>'.$t->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Berapa Jumlah Tanggungan</label>
                                <select class="form-control" name="tanggungan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($tanggungan as $g){
                                        echo '<option value="'.$g->tanggungan_id.'" '; if($data->tanggungan_id==$g->tanggungan_id) echo ' selected'; echo '>'.$g->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Apakah Anda Menjadi Anggota Organisasi Kemasyarakatan, Intra atau Ekstra Kampus ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="organisasi_lain" value="Y" <?php if($data->organisasi_lain=='Y') echo ' checked'; ?>> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="organisasi_lain" value="N" <?php if($data->organisasi_lain=='N') echo ' checked'; ?>> Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" id="nama_organisasi" <?php if($data->organisasi_lain=='N') echo ' style="display: none;"'; ?>>
                                <label>Jika Iya Sebutkan Nama Organisasinya</label>
                                <input type="text" class="form-control" name="nama_organisasi" value="<?php echo $data->nama_organisasi ?>">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                                <input type="hidden" name="old_foto" value="<?php echo $data->foto ?>">
                                <p class="help-block"><?php if($data->foto) echo '<a target="_blank" href="'.base_url('media/foto/'.$data->foto).'">Lihat Foto</a>' ?></p>
                            </div>

                            <h3>Data Keluarga</h3>
                            <div class="form-group">
                                <label>Nama Istri</label>
                                <input type="text" class="form-control" name="nama_istri" value="<?php echo $data->nama_istri ?>">
                            </div>
                            <div class="form-group">
                                <label>Anggota Otonom Persis ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="anggota_otonom" value="Y" <?php if($data->anggota_otonom=='Y') echo ' checked'; ?>> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="anggota_otonom" value="N" <?php if($data->anggota_otonom=='N') echo ' checked'; ?>> Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Anak</label>
                                <input type="number" class="form-control" name="jumlah_anak" value="<?php echo $data->jumlah_anak ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                        <?php } ?>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

        <h2 style="text-align: right;"><a href="<?php echo base_url('anggota/tambah_riwayat/'.$anggota_id) ?>" class="btn btn-primary">+ Tambah</a></h2>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Riwayat Pendidikan
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
                        foreach($riwayat as $list){
                            echo '<tr>
                                    <td class="center" width="10">'.$i.'</td>
                                    <td>'.$list->tingkat.'</td>
                                    <td>'.$list->nama_sekolah.'</td>
                                    <td>'.$list->jurusan.'</td>
                                    <td>'.$list->tahun_masuk.'</td>
                                    <td>'.$list->tahun_lulus.'</td>
                                    <td class="center">'.anchor('formulir/riwayat/edit/'.$anggota_id.'/'.$list->riwayat_id, 'Edit').' | '.anchor('formulir/hapus_riwayat/'.$list->riwayat_id, 'Hapus', 'onclick="return confirm(\'Apakah Anda yakin akan menghapus data riwayat pendidikan ini ?\')"').'</td>
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
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php
break;
} 
?>