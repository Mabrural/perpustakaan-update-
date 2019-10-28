<?php
	$nis = $_GET['id_buku'];
	$koneksi->query("delete from tb_buku where id_buku= '$nis'");
?>

<script type="text/javascript">
	window.location.href="?page=buku";
</script>
