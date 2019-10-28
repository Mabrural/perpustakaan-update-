<?php

	$id_user    = $_GET['id'];

	$sql    = $koneksi->query("select * from tb_user where id_user='$id_user'");

	$tampil = $sql->fetch_assoc();

	$level = $tampil['level'];
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
                            <label>Username</label>
                            <input class="form-control" name="username" value="<?php echo $tampil['username'];?>" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" value="<?php echo $tampil['password'];?>"/>
                        </div>
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <input class="form-control" name="nama" value="<?php echo $tampil['nama'];?>" />
                        </div>

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
    $level        = $_POST['level'];

    $simpan       = $_POST['simpan'];

    if ($simpan) {
        $sql = $koneksi->query("update tb_user set username='$username', password='$password', nama='$nama', level='$level' where id_user='$id_user'"); 
        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Diubah!");
                    window.location.href="?page=akses";
                </script>
            <?php
        }
    }
?>