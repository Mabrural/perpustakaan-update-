            
			<a href="?page=anggota&aksi=tambah" class="btn btn-info" style="margin-bottom: 8px;"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
            <a href="./laporan/laporan_anggota_excel.php" target="blank" class="btn btn-default" style="margin-bottom: 8px;"><i class="fa fa-upload"></i> ExportToExcel</a>
            <a href="page/anggota/import/index.php" class="btn btn-success" style="margin-bottom: 8px;"><i class="fa fa-download"></i> import From Excel</a>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Anggota
                        </div>
                        <?php
                            if(isset($_GET['berhasil'])){
                                echo "<p>".$_GET['berhasil']." Data Berhasil Diimport.</p>";
                            }   
                        ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Kartu</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Rombel Saat ini</th>
                                            <th>Program Studi</th>
                                            <th>Aksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql = $koneksi->query("select * from tb_anggota");

                                    		while ($data=$sql->fetch_assoc()) {
                                              							
                       							$jk = ($data['jk']==l)? "Laki-laki":"Perempuan"; 

                                                $prodi = $data['prodi'];

                                                $tgl_lahir = $data['tgl_lahir'];

                                                $tgl_lahir1 = date('d-m-Y', strtotime ($tgl_lahir));
                
                                    		
                                    	?>
                                    	<tr> 
                                    		<td><?php echo $no++; ?></td>
                                            <td><?php echo $data['no_kartu'];?></td>
                                    		<td><?php echo $data['nama'];?></td>
                                    		<td><?php echo $data['tempat_lahir'];?></td>
                                            <td><?php echo $tgl_lahir1; ?></td>
                                    		<td><?php echo $jk;?></td>
                                            <td><?php echo $data['rombel'];?></td>
                                    		<td><?php echo $prodi;?></td>
                                    		<td>
                                    			<a href="?page=anggota&aksi=ubah&id=<?php echo $data['no_kartu'];?>" class="btn btn-warning btn-sm"><i  class="fa fa-edit fa-1x"></i> Ubah</a> 	
                                    		</td>
                                           <td>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data ini?')" href="?page=anggota&aksi=hapus&id=<?php echo $data['no_kartu'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                    	</tr>

                                    	<?php } ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>