<?php

	$no_kartu    = $_GET['id'];

	$sql    = $koneksi->query("select * from tb_anggota where no_kartu='$no_kartu'");

	$tampil = $sql->fetch_assoc();

	$jk1 = $tampil['jk'];
	$prodi = $tampil['prodi'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <form method="POST">
                        <div class="form-group">
                            <label>No. Kartu</label>
                            <input class="form-control" name="no_kartu" value="<?php echo $tampil['no_kartu'];?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama" value="<?php echo $tampil['nama'];?>"/>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input class="form-control" name="tmpt_lahir" value="<?php echo $tampil['tempat_lahir'];?>" />
                        </div>

                        <div class="form-group">
                            <label>Tanggal lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir'];?>"/>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <label class="radio-inline">
                                <input type="radio" value="l" name="jk" <?php echo($jk1==l)?"checked":""; ?>/>Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="p" name="jk" <?php echo($jk1==p)?"checked":""; ?>/>Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Rombel Saat ini</label>
                            <input class="form-control" name="rombel" value="<?php echo $tampil['rombel'];?>"/>
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
        $sql = $koneksi->query("update tb_anggota set no_kartu='$no_kartu', nama='$nama', tempat_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', jk='$jk', rombel='$rombel', prodi='$prodi' where no_kartu='$no_kartu'"); 
        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Diubah!");
                    window.location.href="?page=anggota";
                </script>
            <?php
        }
    }
?>