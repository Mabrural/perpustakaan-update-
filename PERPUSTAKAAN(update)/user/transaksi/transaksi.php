            <!-- <a href="?page=transaksi&aksi=tambah" class="btn btn-info" style="margin-bottom: 8px;"><i class="glyphicon glyphicon-plus"></i> Pinjam Buku</a> -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Peminjaman
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Judul</th>
                                            <th>No. Kartu</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql =$koneksi->query("select * from tb_transaksi where status='Pinjam'");

                                    		while ($data=$sql->fetch_assoc()) {
                                              							
 		
                                    	?>
                                    	<tr> 
                                    		<td><?php echo $no++; ?></td>
                                    		<td><?php echo $data['judul'];?></td>
                                            <td><?php echo $data['no_kartu'];?></td>
                                    		<td><?php echo $data['nama'];?></td>
                                    		<td><?php echo $data['tgl_pinjam'];?></td>
                                    		<td><?php echo $data['tgl_kembali'];?></td>
                        					<td>
                        						<?php

                        							$denda = 500;
                        							$tanggal_dateline = $data['tgl_kembali'];
                        							$tgl_kembali = date('Y-m-d');
                        							$lambat = terlambat($tanggal_dateline, $tgl_kembali);
                        							$denda1 = $lambat * $denda;

                        							if ($lambat>0) {
                        							 	echo "

                        							 		<font color='red'>$lambat hari<br>(Rp $denda1)</font>

                        							 	";
                        							 }else{
                        							 	echo $lambat."Hari";
                        							 }
                        						?>
                        					</td>
                                    		<td><?php echo $data['status'];?></td>

                                    	</tr>

                                    	<?php } ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>