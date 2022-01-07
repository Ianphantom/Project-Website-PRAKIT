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
        h3{
            font-size: 22px;
        }
        .data{
            margin: 0 auto;
            font-size: 18px;
        }
        table{
            width: 100%;
        }

        table tr{
            margin: 4px;
        }

        table tr > :first-child{
            width: 35%;
            font-weight: 600;
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
        <h3>DEPARTEMEN TEKNOLOGI INFORMASI</h3>
        <h3><u>INSTITUT TEKNOLOGI SEPULUH NOVEMBER</u></h3>
    </div>

    <div class="title text-center mt-4" style="border:1px solid black; font-size: 18px; font-weight: bold; padding: 5px;">
        FORMULIR PENGAJUAN KERJA PRAKTEK/MAGANG
    </div>
    <div class="data text-left mt-4">
        <table>
            <tr>
                <td>Nama</td>
                <td>: <?php echo htmlentities($user1['nama']) ?></td>
            </tr>
            <tr>
                <td>NRP</td>
                <td>: <?php echo htmlentities($user1['nrp']) ?></td>
            </tr>
            <tr>
                <td>SKS Ditempuh (min 90 sks)</td>
                <td>: <?php echo htmlentities($kp1['sks']) ?></td>
            </tr>
            <tr>
                <td>Alamat Surat</td>
                <td>: <?php echo htmlentities($kp1['alamat']) ?></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>: <?php echo htmlentities($kp1['nomor_telepon']) ?></td>
            </tr>    
        </table>
    </div>
    <div class="data text-left mt-4">
        <table>
            <tr>
                <td>Nama</td>
                <td>: <?php echo htmlentities($user2['nama']) ?></td>
            </tr>
            <tr>
                <td>NRP</td>
                <td>: <?php echo htmlentities($user2['nrp']) ?></td>
            </tr>
            <tr>
                <td>SKS Ditempuh (min 90 sks)</td>
                <td>: <?php echo htmlentities($kp2['sks']) ?></td>
            </tr>
            <tr>
                <td>Alamat Surat</td>
                <td>: <?php echo htmlentities($kp2['alamat']) ?></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>: <?php echo htmlentities($kp2['nomor_telepon']) ?></td>
            </tr>    
        </table>
    </div>

    <div class="title text-center mt-4" style="font-size: 18px; font-weight: bold; font-style: italic;">
        Akan Melakukan Kegiatan Kerja Praktek Di :
    </div>

    <div class="data text-left mt-4">
        <table>
            <tr>
                <td>Nama Instansi / Perusahaan</td>
                <td>: <?php echo htmlentities($kp1['nama_perusahaan']) ?></td>
            </tr>
            <tr>
                <td>Alamat Perusahaan</td>
                <td>: <?php echo htmlentities($kp1['alamat_perusahaan']) ?></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>: <?php echo htmlentities($kp1['telepon_perusahaan']) ?></td>
            </tr>
            <tr>
                <td>Nama wakil instansi/perusahaan</td>
                <td>: <?php echo htmlentities($kp1['wakil_perusahaan']) ?></td>
            </tr>
            <tr>
                <td>Rencana tanggal pelaksanaan</td>
                <td>: <?php echo htmlentities($kp1['tanggal_pelaksanaan']) ?> sampai <?php echo htmlentities($kp1['tanggal_selesai']) ?></td>
            </tr>    
        </table>
    </div>

    <div class="data text-right mt-4">
        Surabaya ,_____________________________
    </div>

    <!-- <div class="row mt-4">
        <div class="col-md-6 text-center">
            <p>Pemohon 1</p><br><br><br>
            <p>( __________________________ )</p>
        </div>
        <div class="col-md-6 text-center">
            <p>Pemohon 2</p><br><br><br>
            <p>( __________________________ )</p>
        </div>
    </div> -->

    <div class="flex-container mt-4" style="display:flex">
        <div class="siswa1 text-center">
            <p>Pemohon 1</p><br><br><br>
            <p>( __________________________ )</p></div>
        <div class="siswa1 text-center">
            <p>Pemohon 2</p><br><br><br>
            <p>( __________________________ )</p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <p>Menyetujui,</p>
        <p>Dosen Wali Mahasiswa</p><br><br><br>
        <p>( __________________________ )</p>
    </div>

    <div class="mt-4">
        *) Tiap kelompok mengisi 1 lembar formulir
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
