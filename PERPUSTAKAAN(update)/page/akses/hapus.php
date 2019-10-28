<?php
	$id = $_GET['id_user'];
	$koneksi->query("delete from tb_user where id_user= '$id'");
?>

<script type="text/javascript">
	window.location.href="?page=akses";
</script>
