<?php
    //menghubungkan dengan koneksi
    include "koneksi.php";
    //menghubungkan dengan library excel reader
    include "excel_reader2.php";
?>
<?php
    //upload file xls
    $target = basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    //beri permisi agar file xls dapat dibaca
    chmod($_FILES['file']['name'],0777);
    //mengambil isi file xls
    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);
    //menghitung jumlah baris data yang ada
    $jumlah_baris = $data->rowcount($sheet_index=0);
    //jumlah default data yang berhasil diimport
    $berhasil = 0;
    for($i=2; $i<=$jumlah_baris; $i++){
        //menangkap data dan memasukkan ke variabel sesuai dengan kolomnya masing-masing
        $no_kartu = $data->val($i, 1);
        $nama = addslashes($data->val($i, 2));
        $tempat_lahir = $data->val($i, 3);
		$tgl_lahir = $data->val($i, 4);
		$jk = $data->val($i, 5);
        $rombel = addslashes($data->val($i, 6));
		$prodi = $data->val($i, 7);
        if($no_kartu !="" && $nama != "" && $tempat_lahir !="" && $tgl_lahir !="" && $jk !="" && $rombel !="" && $prodi !=""){
            //input data ke database (tabel data_siswa)
            mysqli_query($koneksi, "INSERT into tb_anggota values('$no_kartu', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$rombel','$prodi')");
            $berhasil++;
        }
    }
    //hapus kembali file .xls yang diupload tadi
    unlink($_FILES['file']['name']);
    //alihkan halaman ke index.php
    header("location:index.php?berhasil=$berhasil");
?>