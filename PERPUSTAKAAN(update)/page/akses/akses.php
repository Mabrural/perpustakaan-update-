            
			<a href="?page=akses&aksi=tambah" class="btn btn-info" style="margin-bottom: 8px;"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Akses Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username Login</th>
                                            <th>Password Login</th>
                                            <th>Nama Anggota Perpustakaan</th>
                                            <th>Hak Akses</th>
                                            <th>Aksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql = $koneksi->query("select * from tb_user");

                                    		while ($data=$sql->fetch_assoc()) {
                                              							
                       							$jk = ($data['jk']==l)? "Laki-laki":"Perempuan"; 

                                                $prodi = $data['prodi'];

                                                $tgl_lahir = $data['tgl_lahir'];

                                                $tgl_lahir1 = date('d-m-Y', strtotime ($tgl_lahir));
                
                                    		
                                    	?>
                                    	<tr> 
                                    		<td><?php echo $no++; ?></td>
                                            <td><?php echo $data['username'];?></td>
                                    		<td><?php echo $data['password'];?></td>
                                    		<td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['level'];?></td>
                                    		<td>
                                    			<a href="?page=akses&aksi=ubah&id=<?php echo $data['id_user'];?>" class="btn btn-warning"><i  class="fa fa-edit fa-1x"></i> Ubah</a> 
                                    			
                                    		</td>
                                            <td>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data ini?')" href="?page=akses&aksi=hapus&id_user=<?php echo $data['id_user'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                    	</tr>

                                    	<?php } ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>