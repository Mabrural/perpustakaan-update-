<html>
    <head>
        <title>Import Excel ke Mysql</title>
            <link rel="icon" type="image/png" href="img/title.png">
            <!-- <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->
             <!-- FONTAWESOME STYLES-->
            <link href="/assets/css/font-awesome.css" rel="stylesheet" />
                <!-- CUSTOM STYLES-->
            <link href="/assets/css/custom.css" rel="stylesheet" />
             <!-- GOOGLE FONTS-->
           <link href='/http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

            <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>
    <body>
        <style type="text/css">
            
            body{
                margin: 0 auto;
                font-family: sans-serif;
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
                cursor: pointer;
            }
            h2:hover{
                color: black;
            }
            ul{
                text-decoration: none;
                color: white;
            }
            a{
                font-family: 'Antonio';
                margin-left: 90px;
                background-color: #3071A9;
                text-decoration: none;
                color: white;
                padding: 8px 10px;
                border-radius: 4px;
                position: relative;
                top: 20px;
                text-shadow: 10px;
            }
            a:hover{
                font-family: 'Antonio';
                margin-left: 90px;
                background-color: #80a6f2;
                color: black;
            }
            form{
                /*margin-top: 20px;*/
                margin-left: 26px;
                font-family: 'Antonio';
                cursor: pointer;
            }
            input, file{
                width: auto; 
                padding: 9px 15px; 
                background: #617798; 
                border: 0; 
                font-size: 14px; 
                color: #FFFFFF;
                font-family: 'Antonio';
            }
            input, submit{
                width: auto; 
                padding: 9px 15px; 
                background-color: #617798; 
                border: 0; 
                font-size: 14px; 
                color: #FFFFFF;
            }
            .button{
                background-color: #617798;
                padding-top: 10px;
                padding-bottom: 10px;
                cursor: pointer;
                border: 1px solid #617798;
            }
            .button:hover{
                background-color: #8dabd9;
                border-radius: 5px;
                border: 1px solid #8dabd9;
            }
            .button::before{
                content: '';
                background-color: #fff;
                opacity: 1;
                display: block;
                -webkit-transform: translate(-50%, -50%) scale(0);
                transform: translate(-50%, -50%) scale(0);
            }
            .button span{
                font-family: 'Antonio';
                color: #fff;
            }
            .button span:hover{
                font-family: 'Antonio';
                color: black;
            }

        </style>
        <h2><ul href="#">Import Data Buku</ul></h2>

        <a href="index.php">Kembali</a>
        <br><br>
        <?php
            include "koneksi.php";
        ?>
        <br><br>
        <form action="upload_aksi.php" method="POST" enctype="multipart/form-data">
            Pilih File :
            <input type="file" name="file" required="required">
            <button type="submit" name="upload" class="button"><span>Import</span></button>
            <!-- <input type="submit" name="upload" value="Import"> -->
        </form>
        <br><br>

    </body>
</html>