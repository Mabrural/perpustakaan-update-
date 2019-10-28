<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <form method="POST">
                        <div class="form-group">
                            <label>Judul</label>
                            <input class="form-control" name="judul" />
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input class="form-control" name="pengarang" />
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input class="form-control" name="penerbit" />
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input class="form-control" name="isbn" />
                        </div>
                        <div class="form-group">
                            <label>Tahun Pengadaan</label>
                            <select class="form-control" name="tahun_pengadaan">
                                <?php
                                    $tahun = date("Y");

                                    for ($i=$tahun-29; $i <= $tahun; $i++) { 
                                        echo ' 
                                            <option value="'.$i.'">'.$i.'</option>
                                        ';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sumber Dana</label>
                            <select class="form-control" name="sumber">
                                <option value="BOS" <?php if ($sumber_dana=='BOS') {
                                    echo "selected=\"selected\"";
                                } ?>>BOS</option>
                                <option value="Mandiri" <?php if ($sumber_dana=='Mandiri') {
                                    echo "selected=\"selected\"";
                                } ?>>Mandiri</option>
                                <option value="Sumbangan" <?php if ($sumber_dana=='Sumbangan') {
                                    echo "selected=\"selected\"";
                                } ?>>Sumbangan</option>
                                <option value="Komite" <?php if ($sumber_dana=='Komite') {
                                    echo "selected=\"selected\"";
                                } ?>>Komite</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input class="form-control" type="number" name="jumlah"/>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Input</label>
                            <input class="form-control" name="tanggal" type="date" />
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

    $judul     = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit  = $_POST['penerbit'];
    $tahun     = $_POST['tahun_pengadaan'];
    $isbn      = $_POST['isbn'];
    $sumber    = $_POST['sumber'];
    $jumlah    = $_POST['jumlah'];
    $tanggal   = $_POST['tanggal'];
    $simpan    = $_POST['simpan'];

    if ($simpan) {
        $sql = $koneksi->query("insert into tb_buku (judul, pengarang, penerbit, tahun_pengadaan, isbn, sumber_dana,jumlah_buku, tgl_input) values('$judul', '$pengarang', '$penerbit', '$tahun', '$isbn', '$sumber','$jumlah', '$tanggal')"); 
        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Disimpan");
                    window.location.href="?page=buku";
                </script>
            <?php
        }
    }
?>