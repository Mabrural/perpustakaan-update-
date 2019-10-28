<script type="text/javascript">
    function validasi(form){
        if (form.no_kartu.value=="") {
            alert("No. Kartu Tidak Boleh Kosong");
            form.no_kartu.focus();
            return(false);
        }if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return(false);
        }if (form.tmpt_lahir.value=="") {
            alert("Tempat Lahir Tidak Boleh Kosong");
            form.tmpt_lahir.focus();
            return(false);
        }if (form.tgl.value=="") {
            alert("Tanggal Tidak Boleh Kosong");
            form.tgl.focus();
            return(false);
        }if (form.jk.value=="") {
            alert("Jenis Kelamin Tidak Boleh Kosong");
            form.jk.focus();
            return(false);
        }
        return(true);
    }
</script>



<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <form method="POST" onsubmit="return validasi(this)">
                        <div class="form-group">
                            <label>No. Kartu</label>
                            <input class="form-control" name="no_kartu" />
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama" />
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input class="form-control" name="tmpt_lahir" />
                        </div>

                        <div class="form-group">
                            <label>Tanggal lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir" />
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <label class="radio-inline">
                                <input type="radio" value="l" name="jk" />Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="p" name="jk" />Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Rombel Saat ini</label>
                            <input class="form-control" name="rombel" />
                        </div>

                        <div class="form-group">
                            <label>Program Studi</label>
                            <select class="form-control" name="prodi">
                                <option value="Teknik Komputer dan Jaringan" <?php if ($prodi=='Teknik Komputer dan Jaringan') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Komputer dan Jaringan</option>
                                <option value="Teknik Otomasi Industri" <?php if ($prodi=='Teknik Otomasi Industri') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Otomasi Industri</option>
                                <option value="Teknik Pemesinan" <?php if ($prodi=='Teknik Pemesinan') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Pemesinan</option>
                                <option value="Teknik Elektronika Daya dan Komunikasi" <?php if ($prodi=='Teknik Elektronika Daya dan Komunikasi') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Elektronika Daya dan Komunikasi</option>
                                <option value="Teknik Elektronika Industri" <?php if ($prodi=='Teknik Elektronika Industri') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Elektronika Industri</option>
                                <option value="Teknik Mekatronika" <?php if ($prodi=='Teknik Mekatronika') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Mekatronika</option>
                                <option value="Teknik Pengelasan" <?php if ($prodi=='Teknik Pengelasan') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Pengelasan</option>
                                
                            </select>
                        </div>
                        
                        <div>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<?php

    $no_kartu     = $_POST['no_kartu'];
    $nama         = addslashes($_POST['nama']);
    $tmpt_lahir   = addslashes($_POST['tmpt_lahir']);
    $tgl_lahir    = $_POST['tgl_lahir'];
    $jk           = $_POST['jk'];
    $rombel       = addslashes($_POST['rombel']);
    $prodi        = $_POST['prodi'];

    $simpan       = $_POST['simpan'];

    if ($simpan) {
        $sql = $koneksi->query("insert into tb_anggota(no_kartu, nama, tempat_lahir, tgl_lahir, jk, rombel,prodi) values('$no_kartu', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$rombel','$prodi')"); 
        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Disimpan");
                    window.location.href="?page=anggota";
                </script>
            <?php
        }
    }
?>