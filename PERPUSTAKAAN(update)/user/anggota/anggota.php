
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Anggota
                        </div>
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
                                            <td><?php echo $data['rombel']; ?></td>
                                            <td><?php echo $prodi;?></td>
                                          
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>