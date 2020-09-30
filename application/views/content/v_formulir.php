<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Form Inventarisasi Data Pokok Anggota Pemuda Persis Cabang Banjaran</h2>
    </div>
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
                        <?php echo form_open_multipart('formulir/tambah_anggota'); ?>
                            <h3>Data Pribadi</h3>
                            <div class="form-group">
                                <label>Nomor Anggota</label>
                                <input type="text" class="form-control" name="nomor_anggota">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required="">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" required="">
                            </div>
                            <div class="form-group">
                                <label>Status Menikah</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="status_nikah" value="N" checked=""> Belum Menikah
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status_nikah" value="Y"> Menikah
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="A+" checked=""> A+
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="A-"> A-
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="B+"> B+
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="B-"> B-
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="AB+"> AB+
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="AB-"> AB-
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="golongan_darah" value="O"> O
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Aktif</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" name="telepon">
                            </div>
                            <div class="form-group">
                                <label>No WhatsApp Aktif</label>
                                <input type="number" class="form-control" name="whatsapp">
                            </div>
                            <div class="form-group">
                                <label>Alamat Tinggal Saat Ini</label>
                                <textarea name="alamat" class="form-control" rows="5" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <input type="number" class="form-control" name="nomor_ktp">
                            </div>
                            <div class="form-group">
                                <label>Tahun Masuk Anggota</label>
                                <input type="number" class="form-control" name="tahun_masuk">
                            </div>
                            <div class="form-group">
                                <label>Jamaah</label>
                                <select class="form-control" name="jamaah" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($jamaah as $j){
                                        echo '<option value="'.$j->jamaah_id.'">'.$j->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hobi</label>
                                <input type="text" class="form-control" name="hobi">
                            </div>
                            <div class="form-group">
                                <label>Keahlian</label>
                                <input type="text" class="form-control" name="keahlian">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Pokok</label>
                                <select id="pekerjaan" class="form-control" name="pekerjaan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pekerjaan as $k){
                                        echo '<option value="'.$k->pekerjaan_id.'">'.$k->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="lainnya" class="form-group" style="display: none;">
                                <label>Pekerjaan Lainnya</label>
                                <input type="text" class="form-control" name="pekerjaan_lain">
                            </div>
                            <div class="form-group">
                                <label>Nama Instansi Pekerjaan</label>
                                <input type="text" class="form-control" name="nama_instansi">
                            </div>
                            <div class="form-group">
                                <label>Apakah Mempunyai Pekerjaan Sampingan ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="sampingan" value="Y" checked=""> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sampingan" value="N"> Tidak
                                    </label>
                                </div>
                            </div>
                            <div id="pekerjaan_sampingan" class="form-group">
                                <label>Pekerjaan Sampingan</label>
                                <input type="text" class="form-control" name="pekerjaan_sampingan">
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control" name="pendidikan" required="">
                                    <option>-- Silakan Pilih</option>
                                    <?php
                                    foreach($pendidikan as $d){
                                        echo '<option value="'.$d->pendidikan_id.'">'.$d->nama.'</option>';
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
                                        echo '<option value="'.$t->pendapatan_id.'">'.$t->nama.'</option>';
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
                                        echo '<option value="'.$g->tanggungan_id.'">'.$g->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Apakah Anda Menjadi Anggota Organisasi Kemasyarakatan, Intra atau Ekstra Kampus ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="organisasi_lain" value="Y" checked=""> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="organisasi_lain" value="N"> Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" id="nama_organisasi">
                                <label>Jika Iya Sebutkan Nama Organisasinya</label>
                                <input type="text" class="form-control" name="nama_organisasi">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <h3>Data Keluarga</h3>
                            <div class="form-group">
                                <label>Nama Istri</label>
                                <input type="text" class="form-control" name="nama_istri">
                            </div>
                            <div class="form-group">
                                <label>Anggota Otonom Persis ?</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="anggota_otonom" value="Y" checked=""> Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="anggota_otonom" value="N"> Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Anak</label>
                                <input type="number" class="form-control" name="jumlah_anak">
                            </div>
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
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