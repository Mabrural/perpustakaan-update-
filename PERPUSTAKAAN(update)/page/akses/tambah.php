<script type="text/javascript">
    function validasi(form){
        if (form.username.value=="") {
            alert("Username Tidak Boleh Kosong");
            form.username.focus();
            return(false);
        }if (form.password.value=="") {
            alert("Password Tidak Boleh Kosong");
            form.password.focus();
            return(false);
        }if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return(false);
        }if (form.level.value=="") {
            alert("Level Tidak Boleh Kosong");
            form.level.focus();
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
                            <label>Username</label>
                            <input class="form-control" name="username" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" />
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <select class="form-control" name="nama">
                          <?php
                                $sql = $koneksi->query("select * from tb_anggota order by no_kartu");

                                while ($data=$sql->fetch_assoc()) {
                                    echo "<option value='$data[nama]'>$data[nama]</option>";
                                }
                            ?>
                            </select>
                        </div>

                        <!--  <div class="form-group">
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
                                <option value="Teknik Elektronika Daya & Komunikasi" <?php if ($prodi=='Teknik Elektronika Daya & Komunikasi') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Elektronika Daya & Komunikasi</option>
                                <option value="Teknik Mekatronika" <?php if ($prodi=='Teknik Mekatronika') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Mekatronika</option>
                                <option value="Teknik Pengelasan" <?php if ($prodi=='Teknik Pengelasan') {
                                    echo "selected=\"selected\"";
                                } ?>>Teknik Pengelasan</option>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label>Hak Akses</label>
                            <select class="form-control" name="level">
                                <option value="admin" <?php if ($level=='admin') {
                                    echo "selected=\"selected\"";
                                } ?>>Admin</option>
                                <option value="user" <?php if ($level=='user') {
                                    echo "selected=\"selected\"";
                                } ?>>User</option>

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

    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $nama         = $_POST['nama'];
    $prodi        = $_POST['prodi'];
    $level        = $_POST['level'];

    $simpan       = $_POST['simpan'];

    if ($simpan) {
        $sql = $koneksi->query("insert into tb_user(username, password, nama, level) values('$username', '$password', '$nama', $prodi '$level')"); 
        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Disimpan");
                    window.location.href="?page=akses";
                </script>
            <?php
        }
    }
?>