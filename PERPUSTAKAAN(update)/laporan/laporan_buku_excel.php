<?php 
	ob_start();
	session_start();
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	$koneksi = new mysqli('localhost', 'root', '78789898', 'db_perpustakaan1');

	$filename = "buku_excel-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename=$filename");
	header("content-type: application/vdn.ms-excel");


 ?>

	<h2 style="text-align: center;">Laporan Buku</h2>
	<div class="panel-body">
        <div class="table-responsive">
			<table border="1" class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>ISBN</th>
                    <th>Tahun Pengadaan</th>
                    <th>Sumber Dana</th>
                    <th>Jumlah Buku</th>
			    </tr>
			</thead>
			<tbody>
				<?php
            		$no = 1;

            		$sql = $koneksi->query("select * from tb_buku");

            		while ($data=$sql->fetch_assoc()) {
            		
            	?>

				<tr>
            		<td><?php echo $no++; ?></td>
            		<td><?php echo $data['judul'];?></td>
            		<td><?php echo $data['pengarang'];?></td>
            		<td><?php echo $data['penerbit'];?></td>
            		<td><?php echo $data['isbn'];?></td>
                    <td><?php echo $data['tahun_pengadaan']; ?></td>
                    <td><?php echo $data['sumber_dana'];?></td>
            		<td><?php echo $data['jumlah_buku'];?></td>
            	</tr>

	        	<?php } ?>
	        	</tbody>
			</table>

		</div>

	</div>