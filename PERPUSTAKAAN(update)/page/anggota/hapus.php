<?php
	$no_kartu = $_GET['id'];
	$koneksi->query("delete from tb_anggota where no_kartu= '$no_kartu'");
?>

<script type="text/javascript">
	window.location.href="?page=anggota";
</script>
