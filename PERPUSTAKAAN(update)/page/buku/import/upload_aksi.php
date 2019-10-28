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
        $id_buku = $data->val($i, 1);
        $judul = addslashes($data->val($i, 2));
        $pengarang = addslashes($data->val($i, 3));
        $penerbit = addslashes($data->val($i, 4));
        $isbn = $data->val($i, 5);
		$tahun_pengadaan = $data->val($i, 6);	
		$sumber_dana = $data->val($i, 7);
        $jumlah_buku = $data->val($i, 8);   
        $tgl_input = $data->val($i, 9);
        if($id_buku !="" && $judul !="" && $pengarang !="" && $penerbit !="" && $tahun_pengadaan !="" && $isbn !="" && $sumber_dana !="" && $jumlah_buku !="" && $tgl_input !=""){
            //input data ke database (tabel data_pegawai)
            mysqli_query($koneksi, "INSERT into tb_buku values('$id_buku', '$judul', '$pengarang', '$penerbit', '$tahun_pengadaan', '$isbn', '$sumber_dana', '$jumlah_buku', '$tgl_input')");
            $berhasil++;
        }
    }
    //hapus kembali file .xls yang diupload tadi
    unlink($_FILES['file']['name']);
    //alihkan halaman ke index.php
    header("location:index.php?berhasil=$berhasil");
?>