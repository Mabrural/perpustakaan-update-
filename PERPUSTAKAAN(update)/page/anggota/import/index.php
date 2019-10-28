<html>
    <head>
        <title>Import Excel Ke Mysql</title>
            <link rel="icon" type="image/png" href="img/title.png">
       
            <link href="../assets/css/bootstrap.css" rel="stylesheet" />
             <!-- FONTAWESOME STYLES-->
            <link href="../assets/css/font-awesome.css" rel="stylesheet" />
                <!-- CUSTOM STYLES-->
            <link href="../assets/css/custom.css" rel="stylesheet" />
             <!-- GOOGLE FONTS-->
           <link href='../http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

            <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    </head>
    <body>
        <style type="text/css">
            body{
                margin: 0 auto;
                font-family: sans-serif;
                background-color: #FFFFFF;
            }
            a{
                font-family: 'Antonio';
                /*margin-left: 90px;*/
                background-color: #3071A9;
                text-decoration: none;
                color: white;
                padding: 8px 10px;
                border-radius: 4px;
                position: relative;
                top: 20px;
                text-shadow: 10px;
                left: 70px;
            }
            a:hover{
                background-color: #80a6f2;
                color: black;
            }
            table{
                text-align: center;
                margin: 20px 90px;
            }
            p{
                color: green;
            }
            h2{
                font-family: 'Antonio', arial;
                font-size: 24px;
                padding: 20px 40px;
                background-color: rgb(48, 87, 120);
                margin: 0 auto;
            }
            ul{
                text-decoration: none;
                color: white;
            }
            span{
                position: relative;
                left: 90px;
                margin-left: 20px;
                text-decoration: none;
                color: green;
            }
            table{
                border: 1px solid #999;
                border-collapse: collapse;
            }
            tr th{
                border: 1px solid #999;
                background-color: #888888;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 10px;
                padding-right: 10px;
                border-radius: 1px;
            }
            td{
                border: 1px solid #999;
                border-radius: 2px;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-right: 6px;
                padding-left: 6px;
                border-color: grey;
                background-color: none;
            }
            table tr:hover td {
              background: #f2f2f2;
              background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
              background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
            }
            p{
                padding-left: 90px;
            }
        </style>
        <h2><ul href="#">Import Data Anggota</ul></h2>
        <span>
        <!-- <?php
            if(isset($_GET['berhasil'])){
                    echo "<p>".$_GET['berhasil']." Data Berhasil Diimport.</p>";
            }     
        ?> -->
        </span>
        <a href="upload.php">Import Data</a> <a href="../../../index.php?page=anggota">Data Anggota</a><br> <br>
        <?php
            if(isset($_GET['berhasil'])){
                    echo "<p>".$_GET['berhasil']." Data Berhasil Diimport.</p>";
            }     
        ?>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example" border="1">
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
            <?php
                include "koneksi.php";
                $no=1;
                $data = mysqli_query($koneksi, 'select * from tb_anggota');
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['no_kartu'];?></td>
						<td><?php echo $d['nama'];?></td>
                        <td><?php echo $d['tempat_lahir'];?></td>
						<td><?php echo $d['tgl_lahir'];?></td>
						<td><?php echo $d['jk'];?></td>
                        <td><?php echo $d['rombel'];?></td>
						<td><?php echo $d['prodi'];?></td>
						
                    </tr>
                    <?php
                }
            ?>
        </table>

    </body>
</html>