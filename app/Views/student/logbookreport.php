<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            width: 21cm;
            height: 29.7cm; 
            margin: 0 auto;
        }

        hr{
            border: 1px solid black;
        }
        h3{
            font-size: 22px;
        }
        .biodata{
            font-size: 18px;
        }
        .data{
            margin: 0 auto;
            font-size: 16px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .siswa1{
            flex-basis: 50%;
        }

        @page {
            size: A4;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;        
            }
        }
    </style>
    <title>Form Pengajuan Kp</title>
    
  </head>
  <body>
    <div class="kop-surat text-center">
        <h3>LOGBOOK</h3>
        <h3>KERJA PRAKTEK (KP)</h3>
        <h3>DEPARTEMEN TEKNOLOGI INFORMASI</h3>
        <h3>INSTITUT TEKNOLOGI SEPULUH NOVEMBER</h3>
    </div>
    <hr>
    <div class="biodata mt-3">
        <p>Nama :</p>
        <ul>
            <?php foreach ($siswaKp as $e) : ?>
                <li><?php echo htmlentities($e->nama). " | " . htmlentities($e->nrp) ?></li>
            <?php endforeach ?>
        </ul>
    </div>


    <div class="data text-left mt-4">
        <table style="width:100%">
            <tr style="text-align: center;">
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th> 
                <th class="text-center">Deskripsi</th>
                <th class="text-center" style="width: 25%;">Foto Kegiatan</th>
            </tr>
            <?php
                $i = 0;  
                foreach ($data_logbook as $e) : $i++;?>
                <tr>
                    <td class="text-center"><?php echo htmlentities($i) ?></td>
                    <td class="text-center"><?php echo htmlentities($e['tanggal']) ?></td>
                    <td style="padding: 0px 7px;"><?php echo htmlentities($e['deskripsi_kegiatan']) ?></td>
                    <td style="width: 25%; text-align: center;"><img src="<?php echo base_url('assets/logbook/'.htmlentities($e['file'])) ?>" style="width: 90%;"></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    

    <div class="container">
        <link href="../assets/dataTables/datatables.min.css">
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>
</html>
