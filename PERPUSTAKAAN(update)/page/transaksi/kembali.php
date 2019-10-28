<?php

	$id =  $_GET['id_transaksi'];
	$judul =  $_GET['judul'];

	$sql = $koneksi->query("update tb_transaksi set status='Kembali' where id_transaksi='$id'");

	$sql = $koneksi->query("update tb_buku set jumlah_buku = (jumlah_buku+1) where judul='$judul'");

	?>
		<script type="text/javascript">
			alert("Proses Kembalikan Buku Berhasil");
			window.location.href="?page=transaksi";
		</script>

	<?php
?>