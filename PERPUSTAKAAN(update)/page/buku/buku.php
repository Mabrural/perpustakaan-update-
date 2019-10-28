            
			<a href="?page=buku&aksi=tambah" class="btn btn-info" style="margin-bottom: 8px;"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
            <a href="./laporan/laporan_buku_excel.php" target="blank" class="btn btn-default" style="margin-bottom: 8px;"><i class="fa fa-upload"></i> ExportToExcel</a>
            <a href="page/buku/import/index.php" type="file" class="btn btn-success" style="margin-bottom: 8px;"><i class="fa fa-download"></i> import From Excel</a>
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
                                            <th>Aksi</th>
                                            <th>Aksi</th>
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
                                    		<td>
                                    			<a href="?page=buku&aksi=ubah&id_buku=<?php echo $data['id_buku'];?>" class="btn btn-warning btn-sm"><i  class="fa fa-edit fa-1x"></i> Ubah</a>
                                    		</td>
                                            <td>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data ini?')" href="?page=buku&aksi=hapus&id_buku=<?php echo $data['id_buku'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i> Hapus</a>
                                            </td>
                                    	</tr>

                                    	<?php } ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>