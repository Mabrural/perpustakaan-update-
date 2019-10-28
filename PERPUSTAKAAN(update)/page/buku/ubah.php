<?php
    $id = $_GET['id_buku'];

    $sql = $koneksi->query("select * from tb_buku where id_buku='$id'");

    $tampil = $sql->fetch_assoc();
    $tahun2 = $tampil['tahun_pengadaan'];
    $lokasi = $tampil['lokasi'];
    $sumber = $tampil['sumber_dana'];
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
                            <label>Judul</label>
                            <input class="form-control" name="judul" value="<?php echo $tampil['judul'];?>" />
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang'];?>" />
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit'];?>" />
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input class="form-control" name="isbn" value="<?php echo $tampil['isbn'];?>" />
                        </div>
                        <div class="form-group">
                            <label>Tahun Pengadaan</label>
                            <select class="form-control" name="tahun_pengadaan">
                                <?php
                                    $tahun = date("Y");

                                    for ($i=$tahun-29; $i <= $tahun; $i++) { 
                                        
                                            if($tahun2 == $i){
                                               echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            }else{
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sumber Dana</label>
                            <select class="form-control" name="sumber_dana">
                                <option value="BOS" <?php if ($sumber=='BOS') {
                                    echo "selected=\"selected\"";
                                } ?>>BOS</option>
                                <option value="Mandiri" <?php if ($sumber=='Mandiri') {
                                    echo "selected=\"selected\"";
                                } ?>>Mandiri</option>
                                <option value="Sumbangan" <?php if ($sumber=='Sumbangan') {
                                    echo "selected=\"selected\"";
                                } ?>>Sumbangan</option>
                                <option value="Komite" <?php if ($sumber=='Komite') {
                                    echo "selected=\"selected\"";
                                } ?>>Komite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input class="form-control" type="number" name="jumlah" value="<?php echo $tampil['jumlah_buku'];?>" />
                        </div>
                        <div class="form-group">
                            <label>Tanggal Input</label>
                            <input class="form-control" name="tanggal" type="date" value="<?php echo $tampil['tgl_input'];?>"/>
                        </div>
                        <div>
                            <input type="submit" name="simpan" value="Ubah" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<?php

    $judul     = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit  = $_POST['penerbit'];
    $tahun     = $_POST['tahun_pengadaan'];
    $isbn      = $_POST['isbn'];
    $sumber    = $_POST['sumber_dana']; 
    $jumlah    = $_POST['jumlah'];
    $tanggal   = $_POST['tanggal'];
    $simpan    = $_POST['simpan'];

    if ($simpan) {
        $sql = $koneksi->query("update tb_buku set judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_pengadaan='$tahun', isbn='$isbn', sumber_dana='$sumber', jumlah_buku='$jumlah', tgl_input='$tanggal' where id_buku='$id'"); 
        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Diubah!");
                    window.location.href="?page=buku";
                </script>
            <?php
        }
    }
?>