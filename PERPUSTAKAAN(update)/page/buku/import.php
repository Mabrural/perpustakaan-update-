<?php
    session_start();

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    include 'function.php';

    $koneksi = new mysqli ("localhost","root","78789898","db_perpustakaan1");

    if ($_SESSION['admin'] || $_SESSION['user']) {
      
    
?>            
            
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Buku	
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="file">File Excel</label>
                                    <input type="file" name="file" id="file" class="form-control" required>
                                </div>
                                <div class="form-group pull-left">
                                    <input type="submit" name="import" value="import" class="btn btn-success">
                                </div>
                            </form>
                         </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        include "excel_reader2.php";
        // if(isset($_POST['import'])){
        //     $file = $_FILES['file']['name'];
        //     $ekstensi = explode(".", $file);
        //     $file_name = "file-".round(microtime(true)).".".end($ekstensi);
        //     $sumber = $_FILES['file']['tmp_name'];
        //     $target_dir = "../_file/";
        //     $target_file = $target_dir.$target_file;
        //     $upload = move_uploaded_file($sumber, $target_file);
        // }

        //upload file xls
        $target = basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $target);

        //beri permisi agar file xls dapat dibaca
        chmod($_FILES['file']['name'],0777);

        //mengambil isi fifle xls
        $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'], false);

        //menghitung jumlah baris data yang ada
        $jumlah_baris = $data->rowcount($sheet_index=0);

        //juymlah default data yang berhasil diimport
        $berhasil = 0
        for($i=2; $i<=$jumlah_baris; $i++){
            //menagkap data dan memasukkan ke variabel sesuai dengan kolomnya masing-masing
            $no_kartu = $data->val($i, 1)
            $nama = $data = $data->val($i, 2);
            $tempat_lahir = $data->val($i, 3);
            $tgl_lahir = $data->val($i, 4);
            $jk = $data->val($i, 5);
            $prodi = $data->val($i, 6);

            if ($no_kartu !="" && $nama !="" && $tempat_lahir !="" $tgl_lahir !="" $jk !="" $prodi !="") {
                 //input data ke database(tabel data_pegawai)
                mysql_query($koneksi, "INSERT into tb_anggota values('$no_kartu', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$prodi')");
                $berhasil++;
             } 
        }

        //hapus kembali file .xls yang diupload tadi
        unlink($_FILES['file']['name']);

        //alihkan halaman ke index.php
        header("location:index.php?page=anggota");

     ?>