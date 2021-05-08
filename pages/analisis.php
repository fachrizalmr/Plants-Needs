<?php
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$kategori = $_POST['kategori'];
$keadaan = $_POST['keadaan'];
$keterangan = $_POST['keterangan'];
$suhu = $_POST['suhu'];
$kelembaban = $_POST['kelembaban'];
$kualitas = $_POST['kualitas'];

///////////////////////////////////////SUHU//////////////////////////////////////////
// untuk suhu dingin
if ($suhu <= 15)
{ $temp[0] = 1;}
else if ($suhu > 15 && $suhu <= 20)
{  $temp[0] = (20-$suhu)/(20-15); }
else
{ $temp[0] = 0;}

// untuk suhu normal
if ($suhu <= 15)
{ $temp[1] = 0;}
else if ($suhu > 15 && $suhu <= 20)
{ $temp[1] = ($suhu-15)/(20-15);}
else if ($suhu > 20 && $suhu <= 40)
{ $temp[1] = (40-$suhu)/(40-20);}
else
{ $temp[1] = 0;}

// untuk suhu panas
if ($suhu <= 20)
{ $temp[2] = 0;}
else if ($suhu > 20 && $suhu <= 40)
{ $temp[2] = ($suhu-20)/(40-20);}
else
{ $temp[2] = 1;}

///////////////////////////////////////KELEMBABAN//////////////////////////////////////////
// untuk RH kering
if ($kelembaban <= 40)
{ $rh[0] = 1;}
else if ($kelembaban > 40 && $kelembaban <= 80)
{  $rh[0] = (80 - $kelembaban)/(80 - 40); }
else
{ $rh[0] = 0;}

// untuk RH normal
if ($kelembaban <= 40)
{ $rh[1] = 0;}
else if ($kelembaban > 40 && $kelembaban <= 80)
{ $rh[1] = ($kelembaban-40)/(80-40);}
else if ($kelembaban > 80 && $kelembaban <= 120)
{ $rh[1] = (120-$kelembaban)/(120 - 80);}
else
{ $rh[1] = 0;}

// untuk RH basah
if ($kelembaban <= 80)
{ $rh[2] = 0;}
else if ($kelembaban > 80 && $kelembaban <= 120)
{ $rh[2] = ($kelembaban-80)/(120-80);}
else
{ $rh[2] = 1;}

///////////////////////////////////////KUALITAS//////////////////////////////////////////
// untuk Q Buruk
if ($kualitas <= 10)
{ $q[0] = 1;}
else if ($kualitas > 10 && $kualitas <= 25)
{ $q[0] = (25 - $kualitas)/(25-10); }
else
{ $q[0] = 0;}

// untuk Q kurang baik
if ($kualitas <= 10)
{ $q[1] = 0;}
else if ($kualitas > 10 && $kualitas <= 25)
{ $q[1] = ($kualitas-10)/(25-10);}
else if ($kualitas > 25 && $kualitas <= 50)
{ $q[1] = (50-$kualitas)/(50-25);}
else
{ $q[1] = 0;}

//untuk Q Cukup
if ($kualitas <= 25)
{ $q[2] = 0;}
else if ($kualitas > 25 && $kualitas <= 50)
{ $q[2] = ($kualitas-25)/(50-25);}
else if ($kualitas > 50 && $kualitas <= 75)
{ $q[2] = (75-$kualitas)/(75-50);}
else
{ $q[2] = 0;}

//untuk Q Baik
if ($kualitas <= 50)
{ $q[3] = 0;}
else if ($kualitas > 50 && $kualitas <= 75)
{ $q[3] = ($kualitas-50)/(75-50);}
else if ($kualitas > 75 && $kualitas <= 90)
{ $q[3] = (90-$kualitas)/(90-75);}
else
{ $q[3] = 0;}

//untuk Q Sangat Baik
if ($kualitas <= 75)
{ $q[4] = 0;}
else if ($kualitas > 75 && $kualitas <= 90)
{ $q[4] = ($kualitas-75)/(90-75);}
else
{ $q[4] = 1;}
//////////////////////////////////////////////////////////////////////////////
//cek minimaltemperature//
if ($temp[0]==0) {$cekT0 = ($temp[0]+100);}
else {$cekT0 = $temp[0];}
if ($temp[1]==0) {$cekT1 = ($temp[1]+100);}
else {$cekT1 = $temp[1];}
if ($temp[2]==0) {$cekT2 = ($temp[2]+100);}
else {$cekT2 = $temp[2];}
//cek minimal kelembaban//
if ($rh[0]==0) {$cekR0 = ($rh[0]+100);}
else {$cekR0 = $rh[0];}
if ($rh[1]==0) {$cekR1 = ($rh[1]+100);}
else {$cekR1 = $rh[1];}
if ($rh[2]==0) {$cekR2 = ($rh[2]+100);}
else {$cekR2 = $rh[2];}
//cek minimal kualitas//
if ($q[0]==0) {$cekQ0 = ($q[0]+100);}
else {$cekQ0 = $q[0];}
if ($q[1]==0) {$cekQ1 = ($q[1]+100);}
else {$cekQ1 = $q[1];}
if ($q[2]==0) {$cekQ2 = ($q[2]+100);}
else {$cekQ2 = $q[2];}
if ($q[3]==0) {$cekQ3 = ($q[3]+100);}
else {$cekQ3 = $q[3];}
if ($q[4]==0) {$cekQ4 = ($q[4]+100);}
else {$cekQ4 = $q[4];}
$checkT=min($cekT0,$cekT1,$cekT2);
$checkQ=min($cekQ0,$cekQ1,$cekQ2,$cekQ3,$cekQ4);
$checkR=min($cekR0,$cekR1,$cekR2);
///////////////////////////////////////////NILAI MAX/////////////////////////////////////////////////////
//Darurat
$D1=min($temp[0],$rh[0],$q[0]);
$D2=min($temp[0],$rh[2],$q[0]);
$D3=min($temp[2],$rh[0],$q[0]);
$D4=min($temp[2],$rh[2],$q[0]);
$D5=min($temp[0],$rh[0],$q[1]);
$D6=min($temp[0],$rh[2],$q[1]);
$D7=min($temp[2],$rh[0],$q[1]);
$D8=min($temp[2],$rh[2],$q[1]);
$D9=min($temp[0],$rh[2],$q[2]);
$D10=min($temp[2],$rh[0],$q[2]);
$D11=min($temp[2],$rh[2],$q[2]);
$maxdarurat=max($D1,$D2,$D3,$D4,$D5,$D6,$D7,$D8,$D9,$D10,$D11);
//Peringatan
$P1=min($temp[0],$rh[1],$q[0]);
$P2=min($temp[1],$rh[0],$q[0]);
$P3=min($temp[1],$rh[2],$q[0]);
$P4=min($temp[2],$rh[1],$q[0]);
$P5=min($temp[0],$rh[1],$q[1]);
$P6=min($temp[1],$rh[0],$q[1]);
$P7=min($temp[1],$rh[2],$q[1]);
$P8=min($temp[2],$rh[1],$q[1]);
$P9=min($temp[0],$rh[0],$q[2]);
$P10=min($temp[0],$rh[1],$q[2]);
$P11=min($temp[1],$rh[0],$q[2]);
$P12=min($temp[1],$rh[2],$q[2]);
$P13=min($temp[2],$rh[1],$q[2]);
$P14=min($temp[0],$rh[0],$q[3]);
$P15=min($temp[0],$rh[1],$q[3]);
$P16=min($temp[0],$rh[2],$q[3]);
$P17=min($temp[1],$rh[0],$q[3]);
$P18=min($temp[1],$rh[2],$q[3]);
$P19=min($temp[2],$rh[0],$q[3]);
$P20=min($temp[2],$rh[1],$q[3]);
$P21=min($temp[2],$rh[2],$q[3]);
$P22=min($temp[0],$rh[0],$q[4]);
$P23=min($temp[0],$rh[1],$q[4]);
$P24=min($temp[1],$rh[0],$q[4]);
$P25=min($temp[1],$rh[2],$q[4]);
$P26=min($temp[2],$rh[1],$q[4]);
$maxperingatan=max($P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11,$P12,$P13,$P14,$P15,$P16,$P17,$P18,$P19,$P20,$P21,$P22,$P23,$P24,$P25,$P26);
//Kekeliruan
$K1=min($temp[0],$rh[2],$q[4]);
$K2=min($temp[2],$rh[0],$q[4]);
$K3=min($temp[2],$rh[2],$q[4]);
$maxkekeliruan=max($K1,$K2,$K3);
//Perhatian
$PE1=min($temp[1],$rh[1],$q[0]);
$PE2=min($temp[1],$rh[1],$q[1]);
$PE3=min($temp[1],$rh[1],$q[2]);
$maxperhatian=max($PE1,$PE2,$PE3);
//Sehat
$S1=min($temp[1],$rh[1],$q[3]);
$S2=min($temp[1],$rh[1],$q[4]);
$maxsehat=max($S1,$S2);
////////////////////////////////////////////////////hasil//////////////////////////////////////////////
$Total=@((10+20)*$maxdarurat+(30+40+55)*$maxperingatan+(65+70)*$maxkekeliruan+(80+85)*$maxperhatian+(90+100)*$maxsehat)/((2*$maxdarurat)+(3*$maxperingatan)+(2*$maxkekeliruan)+(2*$maxperhatian)+(2*$maxsehat));
$hasil=number_format($Total,2);
////////////////////////////////////////////////////nilai tegas///////////////////////////////////////
//DARURAT//
if ($hasil <= 10)
{ $st[0] = 1;}
else if ($hasil > 10 && $hasil <= 30)
{  $st[0] = (30 - $hasil)/(30 - 10); }
else
{ $st[0] = 0;}
//PERINGATAN//
if ($hasil <= 10)
{ $st[1] = 0;}
else if ($hasil > 10 && $hasil <= 30)
{ $st[1] = ($hasil-10)/(30-10);}
else if ($hasil >= 30 && $hasil <= 55)
{ $st[1] = 1;}
else if ($hasil > 55 && $hasil <= 65)
{ $st[1] = (65-$hasil)/(65 - 55);}
else
{ $st[1] = 0;}
//KEKELIRUAN//
if ($hasil <= 55)
{ $st[2] = 0;}
else if ($hasil > 55 && $hasil <= 65)
{ $st[2] = ($hasil-55)/(65-55);}
else if ($hasil >= 65 && $hasil <= 70)
{ $st[2] = 1;}
else if ($hasil > 70 && $hasil <= 80)
{ $st[2] = (80-$hasil)/(80 - 70);}
else
{ $st[2] = 0;}
//PERHATIAN//
if ($hasil <= 70)
{ $st[3] = 0;}
else if ($hasil > 70 && $hasil <= 80)
{ $st[3] = ($hasil-70)/(80-70);}
else if ($hasil >= 80 && $hasil <= 85)
{ $st[3] = 1;}
else if ($hasil > 85 && $hasil <= 90)
{ $st[3] = (90-$hasil)/(85 - 90);}
else
{ $st[3] = 0;}
//SEHAT//
if ($hasil <= 85)
{ $st[4] = 0;}
else if ($hasil > 85 && $hasil <= 90)
{ $st[4] = ($hasil-85)/(90-85);}
else
{ $st[4] = 1;}
/////////////////////////////////////////
$modiv=max($st[0],$st[1],$st[2],$st[3],$st[4]);//ini jaga-jaga//
////////////////////////////////////////
if ($hasil>0 &&$hasil <=20){
  $status="DARURAT";
  $warna="danger";
  $span="Kritis!";
  $pesan="Rawatlah segerah tumbuhan anda, tumbuhan anda sedang mengalami masa-masa kritis, tolonglah dan jadikan sebagai tindakan menjaga bumi kita tercinta!";
  $simbol="fa-ban";
  $gambar="";
  $warnaF="red";
}
else if ($hasil>=20 &&$hasil <=60){
  $status="PERINGATAN";
  $warna="warning";
  $span="Butuh Penanganan!";
  $pesan="Tumbuhan Anda sedang tidak dalam kondisi yang baik, lakukan pemeliharaan sekarang juga sebelum tumbuhan anda menjadi kritis.Demi Bumi kita yang sehat!";
  $simbol="fa-exclamation-triangle";
  $gambar="";
  $warnaF="orange";
}
else if ($hasil>=60 &&$hasil <=65){
  $status="KEKELIRUAN";
  $warna="secondary";
  $span="Data tidak valid!";
  $pesan="<br>Lihatlah kembali tumbuhan anda dan lakukan pengukuran dan pengecekkan<br><br><br>";
  $simbol="fa-times-circle";
  $gambar="";
  $warnaF="grey";
}
else if ($hasil>=65 &&$hasil <=85){
  $status="PERHATIAN";
  $warna="info";
  $span="Hey mereka kesepian Loh!";
  $pesan="<br>Berilah perhatian ke tumbuhan anda agar dapat menaikkan kualitas kehidupan mereka.<br><br>";
  $simbol="fa-info";
  $gambar="";
  $warnaF="#17a2b8";
}
else{
  $status="SEHAT";
  $warna="success";
  $span="Good JOB!";
  $pesan="<br>Terimakasih telah menjaga mereka, Yakinlah bahwa hanya mereka yang bisa membantu kita dalam menjaga BUMI :D<br><br>";
  $simbol="fa-check";
  $gambar="";
  $warnaF="green";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="../dist/img/1.png">
  <title>Analisis</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Profile</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ">
      <li><a class="nav-link" href="#">Fachrizal MR</a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/1.png" alt="Tumbuhan" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Plantsneed</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="../Introduction.html" class="nav-link" >
              <i class="nav-icon fas fa-seedling"></i>
              <p>
                Introduction
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="../pages/fuzzy-logic.html" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Fuzzy Logic
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="../pages/input.html" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Input
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="../pages/Analisis.html" class="nav-link active bg-<?=$warna?>">
              <i class="nav-icon fas fa-chart-area "></i>
              <p>
                Analisis
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="../index.html" class="nav-link">
              <i class="nav-icon fas fa-atom"></i>
              <p>
                Keluar
                <i class="fas fa-sign-out-alt right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="alert alert-<?=$warna?> alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas <?=$simbol?>"></i> <?=$span?></h5>
              <?=$pesan?>
            </div>
            <div class="card card-<?=$warna?>">
              <div class="card-header">
                <h3 class="card-title">Keterangan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-heart mr-1"></i> Keadaan</strong>
                <p class="text-muted">
                  <?=$keadaan?>
                </p>
                <hr>
                <strong><i class="fas fa-dna mr-1"></i> Kategori</strong>
                <p class="text-muted"><?=$kategori?></p>
                <hr>
                <strong><i class="fas fa-calendar-day mr-1"></i> Hari ini</strong>
                <p class="text-muted">
                  <?php
                  date_default_timezone_set('Asia/Jakarta');
                  echo date('d-m-Y (H:i:s)');
                  ?>
                </p>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-3">
            <div class="card card-<?=$warna?> card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/1.png"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?=$nama?></h3>
                <p class="text-muted text-center"><?=$jenis?></p>
                <h2 class="text-muted text-center"><span class="badge bg-<?=$warna?> mb-3"><?=$hasil?>%</span></h2>

                <ul class="list-group list-group-unbordered mb-2">
                  <li class="list-group-item">
                    <b>SUHU</b> <a class="float-right"><?=$suhu;?>°C</a>
                  </li>
                  <li class="list-group-item">
                    <b>KELEMBABAN</b> <a class="float-right"><?=$kelembaban?>RH</a>
                  </li>
                  <li class="list-group-item">
                    <b>KUALITAS</b> <a class="float-right"><?=$kualitas?>%</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-<?=$warna?> btn-block btn-lg mt-4 mb-1"><b><?=$status?></b></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
                <div class="card card-<?=$warna?> card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                      <li class="pt-2 px-3"><h3 class="card-title"><i class="fas fa-tools"></i> Ambil Tindakan</h3></li>
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><i class="fas <?=$simbol?>"></i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Keterangan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Detail</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body mb-1">
                    <hr>
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="../dist/img/7.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="../dist/img/6.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="../dist/img/9.jpg" alt="Third slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                        <strong><i class="fas fa-book mr-1"></i> Keterangan</strong>
                        <p class="text-muted">
                        <?=$keterangan?>
                        </p>
                        <hr>
                        <div class="card">
                          <div class="card-body">
                        <h1>Y* = <?=$Total?>%</h1>
                      </div>
                      </div>
                        <hr>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                        <div class="card text-center">
                        <span>STATUS TANAMAN</span><h3 style="color:<?=$warnaF?>;"><i class="fas <?=$simbol?>"></i> <?=$status?></h3>
                      </div>
                        <table class="table table-bordered" style="text-align:center;vertical-align:top;">
                              <tr>
                                <td>Max</td>
                                <td><i class="btn btn-block bg-gradient-danger btn-sm">DARURAT</i></td>
                                <td><span class="badge bg-black" style="font-size:15px;"><?=$maxdarurat?></span></td>
                              </tr>
                              <tr>
                                <td>Max</td>
                                <td><i class="btn btn-block bg-gradient-success btn-sm">SEHAT</i></td>
                                <td><span class="badge bg-black" style="font-size:15px;"><?=$maxsehat?></span></td>
                              </tr>
                              <tr>
                                <td>Max</td>
                                <td><i class="btn btn-block bg-gradient-warning btn-sm">PERINGATAN</i></td>
                                <td><span class="badge bg-black" style="font-size:15px;"><?=$maxperingatan?></span></td>
                              </tr>
                              <tr>
                                <td>Max</td>
                                <td><i class="btn btn-block bg-gradient-secondary btn-sm">KEKELIRUAN</i></td>
                                <td><span class="badge bg-black" style="font-size:15px;"><?=$maxkekeliruan?></span></td>
                              </tr>
                              <tr>
                                <td>Max</td>
                                <td><i class="btn btn-block bg-gradient-info btn-sm">PERHATIAN</i></td>
                                <td><span class="badge bg-black" style="font-size:15px;"><?=$maxperhatian?></span></td>
                              </tr>
                            </table>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
        </div>
      </div>
        <div class="row">
          <div class="col-12">
            <div class="card card-dark collapsed-card">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-info-circle"></i> NK</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <table class="table table-bordered" style="text-align:center;vertical-align:top;">
                    <thead>
                      <tr>
                        <th colspan="3">SUHU</th>
                        <th colspan="3">KELEMBABAN</th>
                        <th colspan="5">KUALITAS</th>
                      </tr>
                      <tr>
                        <td><i class="btn btn-block bg-gradient-primary btn-sm">DINGIN</i></td>
                        <td><i class="btn btn-block bg-gradient-success btn-sm">NORMAL</i></td>
                        <td><i class="btn btn-block bg-gradient-danger btn-sm">PANAS</i></td>
                        <td><i class="btn btn-block bg-gradient-warning btn-sm">KERING</i></td>
                        <td><i class="btn btn-block bg-gradient-success btn-sm">NORMAL</i></td>
                        <td><i class="btn btn-block bg-gradient-primary btn-sm">BASAH</i></td>
                        <td><i class="btn btn-block bg-gradient-danger btn-sm">BURUK</i></td>
                        <td><i class="btn btn-block bg-gradient-orange btn-sm">KURANG BAIK</i></td>
                        <td><i class="btn btn-block bg-gradient-yellow btn-sm">CUKUP</i></td>
                        <td><i class="btn btn-block btn-sm" style="background-color:#20c997; color:white;">BAIK</i></td>
                        <td><i class="btn btn-block bg-gradient-success btn-sm">SANGAT BAIK</i></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$temp[0]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$temp[1]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$temp[2]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$rh[0]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$rh[1]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$rh[2]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$q[0]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$q[1]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$q[2]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$q[3]?></span></td>
                        <td><span class="badge bg-black" style="font-size:15px;"><?=$q[4]?></span></td>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
          <div class="col-12">
            <div class="card card-<?=$warna?>">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-dot-circle"></i> ATURAN</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table" style="text-align:center;vertical-align:top;">
                  <thead>
                    <tr>
                      <th>Rule</th>
                      <th><i class="fas fa-temperature-low"></i> Suhu</th>
                      <th><i class="fas fas fa-tint"></i> Kelembaban</th>
                      <th><i class="fas fas fa-leaf"></i> Kualitas</th>
                      <th><i class="fas fas fa-info"></i> NK</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      ////////////////////////////////////////////////////////////////////
                      ////////////////////////////RULES45///////////////////////////////////
                      //RULE1
                      if(($temp[0]>0)&&($rh[0]>0)&&($q[0]>0)){
                        echo "<td> R#1</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>DARURAT (" . min($temp[0],$rh[0],$q[0]), ")<tr>";}
                      //RULE2
                      if(($temp[0]>0)&&($rh[1]>0)&&($q[0]>0)){
                        echo "<td> R#2</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>PERINGATAN (" . min($temp[0],$rh[1],$q[0]), ")<tr>";}
                      //RULE3
                      if(($temp[0]>0)&&($rh[2]>0)&&($q[0]>0)){
                        echo "<td> R#3</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>DARURAT (" . min($temp[0],$rh[2],$q[0]), ")<tr>";}
                      //RULE4
                      if(($temp[1]>0)&&($rh[0]>0)&&($q[0]>0)){
                        echo "<td> R#4</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>PERINGATAN (" . min($temp[1],$rh[0],$q[0]), ")<tr>";}
                      //RULE5
                      if(($temp[1]>0)&&($rh[1]>0)&&($q[0]>0)){
                        echo "<td> R#5</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>PERHATIAN (" . min($temp[1],$rh[1],$q[0]), ")<tr>";}
                      //RULE6
                      if(($temp[1]>0)&&($rh[2]>0)&&($q[0]>0)){
                        echo "<td> R#6</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>PERINGATAN (" . min($temp[1],$rh[2],$q[0]), ")<tr>";}
                      //RULE7
                      if(($temp[2]>0)&&($rh[0]>0)&&($q[0]>0)){
                        echo "<td> R#7</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>DARURAT (" . min($temp[2],$rh[0],$q[0]), ")<tr>";}
                      //RULE8
                      if(($temp[2]>0)&&($rh[1]>0)&&($q[0]>0)){
                        echo "<td> R#8</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>PERINGATAN (" . min($temp[2],$rh[1],$q[0]), ")<tr>";}
                      //RULE9
                      if(($temp[2]>0)&&($rh[2]>0)&&($q[0]>0)){
                        echo "<td> R#9</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=BURUK (" .	$q[0],	") </td><td>DARURAT (" . min($temp[2],$rh[2],$q[0]), ")<tr>";}
                      //RULE10
                      if(($temp[0]>0)&&($rh[0]>0)&&($q[1]>0)){
                        echo "<td> R#10</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>DARURAT (" . min($temp[0],$rh[0],$q[1]), ")<tr>";}
                      //RULE11
                      if(($temp[0]>0)&&($rh[1]>0)&&($q[1]>0)){
                        echo "<td> R#11</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>PERINGATAN (" . min($temp[0],$rh[1],$q[1]), ")<tr>";}
                      //RULE12
                      if(($temp[0]>0)&&($rh[2]>0)&&($q[1]>0)){
                        echo "<td> R#12</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>DARURAT (" . min($temp[0],$rh[2],$q[1]), ")<tr>";}
                      //RULE13
                      if(($temp[1]>0)&&($rh[0]>0)&&($q[1]>0)){
                        echo "<td> R#13</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>PERINGATAN (" . min($temp[1],$rh[0],$q[1]), ")<tr>";}
                      //RULE14
                      if(($temp[1]>0)&&($rh[1]>0)&&($q[1]>0)){
                        echo "<td> R#14</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>PERHATIAN (" . min($temp[1],$rh[1],$q[1]), ")<tr>";}
                      //RULE15
                      if(($temp[1]>0)&&($rh[2]>0)&&($q[1]>0)){
                        echo "<td> R#15</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>PERINGATAN (" . min($temp[1],$rh[2],$q[1]), ")<tr>";}
                      //RULE16
                      if(($temp[2]>0)&&($rh[0]>0)&&($q[1]>0)){
                        echo "<td> R#16</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>DARURAT (" . min($temp[2],$rh[0],$q[1]), ")<tr>";}
                      //RULE17
                      if(($temp[2]>0)&&($rh[1]>0)&&($q[1]>0)){
                        echo "<td> R#17</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>PERINGATAN (" . min($temp[2],$rh[1],$q[1]), ")<tr>";}
                      //RULE18
                      if(($temp[2]>0)&&($rh[2]>0)&&($q[1]>0)){
                        echo "<td> R#18</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=KURANG BAIK (" .	$q[1],	") </td><td>DARURAT (" . min($temp[2],$rh[2],$q[1]), ")<tr>";}
                      //RULE19
                      if(($temp[0]>0)&&($rh[0]>0)&&($q[2]>0)){
                        echo "<td> R#19</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>PERINGATAN (" . min($temp[0],$rh[0],$q[2]), ")<tr>";}
                      //RULE20
                      if(($temp[0]>0)&&($rh[1]>0)&&($q[2]>0)){
                        echo "<td> R#20</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>PERINGATAN (" . min($temp[0],$rh[1],$q[2]), ")<tr>";}
                      //RULE21
                      if(($temp[0]>0)&&($rh[2]>0)&&($q[2]>0)){
                        echo "<td> R#21</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>DARURAT (" . min($temp[0],$rh[2],$q[2]), ")<tr>";}
                      //RULE22
                      if(($temp[1]>0)&&($rh[0]>0)&&($q[2]>0)){
                        echo "<td> R#22</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>PERINGATAN (" . min($temp[1],$rh[0],$q[2]), ")<tr>";}
                      //RULE23
                      if(($temp[1]>0)&&($rh[1]>0)&&($q[2]>0)){
                        echo "<td> R#23</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>PERHATIAN (" . min($temp[1],$rh[1],$q[2]), ")<tr>";}
                      //RULE24
                      if(($temp[1]>0)&&($rh[2]>0)&&($q[2]>0)){
                        echo "<td> R#24</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>PERINGATAN (" . min($temp[1],$rh[2],$q[2]), ")<tr>";}
                      //RULE25
                      if(($temp[2]>0)&&($rh[0]>0)&&($q[2]>0)){
                        echo "<td> R#25</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>DARURAT (" . min($temp[2],$rh[0],$q[2]), ")<tr>";}
                      //RULE26
                      if(($temp[2]>0)&&($rh[1]>0)&&($q[2]>0)){
                        echo "<td> R#26</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>PERINGATAN (" . min($temp[2],$rh[1],$q[2]), ")<tr>";}
                      //RULE27
                      if(($temp[2]>0)&&($rh[2]>0)&&($q[2]>0)){
                        echo "<td> R#27</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=CUKUP (" .	$q[2],	") </td><td>DARURAT (" . min($temp[2],$rh[2],$q[2]), ")<tr>";}
                      //RULE28
                      if(($temp[0]>0)&&($rh[0]>0)&&($q[3]>0)){
                        echo "<td> R#28</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[0],$rh[0],$q[3]), ")<tr>";}
                      //RULE29
                      if(($temp[0]>0)&&($rh[1]>0)&&($q[3]>0)){
                        echo "<td> R#29</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[0],$rh[1],$q[3]), ")<tr>";}
                      //RULE30
                      if(($temp[0]>0)&&($rh[2]>0)&&($q[3]>0)){
                        echo "<td> R#30</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[0],$rh[2],$q[3]), ")<tr>";}
                      //RULE31
                      if(($temp[1]>0)&&($rh[0]>0)&&($q[3]>0)){
                        echo "<td> R#31</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[1],$rh[0],$q[3]), ")<tr>";}
                      //RULE32
                      if(($temp[1]>0)&&($rh[1]>0)&&($q[3]>0)){
                        echo "<td> R#32</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>SEHAT (" . min($temp[1],$rh[1],$q[3]), ")<tr>";}
                      //RULE33
                      if(($temp[1]>0)&&($rh[2]>0)&&($q[3]>0)){
                        echo "<td> R#33</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[1],$rh[2],$q[3]), ")<tr>";}
                      //RULE34
                      if(($temp[2]>0)&&($rh[0]>0)&&($q[3]>0)){
                        echo "<td> R#34</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[2],$rh[0],$q[3]), ")<tr>";}
                      //RULE35
                      if(($temp[2]>0)&&($rh[1]>0)&&($q[3]>0)){
                        echo "<td> R#35</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[2],$rh[1],$q[3]), ")<tr>";}
                      //RULE36
                      if(($temp[2]>0)&&($rh[2]>0)&&($q[3]>0)){
                        echo "<td> R#36</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=BAIK (" .	$q[3],	") </td><td>PERINGATAN (" . min($temp[2],$rh[2],$q[3]), ")<tr>";}
                      //RULE37
                      if(($temp[0]>0)&&($rh[0]>0)&&($q[4]>0)){
                        echo "<td> R#37</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>PERINGATAN (" . min($temp[0],$rh[0],$q[4]), ")<tr>";}
                      //RULE38
                      if(($temp[0]>0)&&($rh[1]>0)&&($q[4]>0)){
                        echo "<td> R#38</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>PERINGATAN (" . min($temp[0],$rh[1],$q[4]), ")<tr>";}
                      //RULE39
                      if(($temp[0]>0)&&($rh[2]>0)&&($q[4]>0)){
                        echo "<td> R#39</td><td> S=DINGIN (" .	$temp[0],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>KEKELIRUAN (" . min($temp[0],$rh[2],$q[4]), ")<tr>";}
                      //RULE40
                      if(($temp[1]>0)&&($rh[0]>0)&&($q[4]>0)){
                        echo "<td> R#40</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>PERINGATAN (" . min($temp[1],$rh[0],$q[4]), ")<tr>";}
                      //RULE41
                      if(($temp[1]>0)&&($rh[1]>0)&&($q[4]>0)){
                        echo "<td> R#41</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>SEHAT (" . min($temp[1],$rh[1],$q[4]), ")<tr>";}
                      //RULE42
                      if(($temp[1]>0)&&($rh[2]>0)&&($q[4]>0)){
                        echo "<td> R#42</td><td> S=NORMAL (" .	$temp[1],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>PERINGATAN (" . min($temp[1],$rh[2],$q[4]), ")<tr>";}
                      //RULE43
                      if(($temp[2]>0)&&($rh[0]>0)&&($q[4]>0)){
                        echo "<td> R#43</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=KERING (" .	$rh[0],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>KEKELIRUAN (" . min($temp[2],$rh[0],$q[4]), ")<tr>";}
                      //RULE44
                      if(($temp[2]>0)&&($rh[1]>0)&&($q[4]>0)){
                        echo "<td> R#44</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=NORMAL (" .	$rh[1],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>PERINGATAN (" . min($temp[2],$rh[1],$q[4]), ")<tr>";}
                      //RULE45
                      if(($temp[2]>0)&&($rh[2]>0)&&($q[4]>0)){
                        echo "<td> R#45</td><td> S=PANAS (" .	$temp[2],	") </td><td> RH=BASAH (" .	$rh[2],	") </td><td> Q=SANGAT BAIK (" .	$q[4],	") </td><td>KEKELIRUAN (" . min($temp[2],$rh[2],$q[4]), ")<tr>";}
                      ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Min S= <?=$checkT?></th>
                    <th>Min RH= <?=$checkR?></th>
                    <th>Min Q= <?=$checkQ?></th>
                    <th>Nilai Kelayakan</th>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


        <footer class="main-footer">
          <div class="float-right d-none d-sm-block">
            <b>Versi</b> Pertama (1.0)
          </div>
          <strong>Dikembangkan Oleh <a href="" style="color:#28a745;">Muhammad Fachrizal Ramdani</a>.</strong>
        </footer>

      <!-- REQUIRED SCRIPTS -->

      <!-- jQuery -->
      <script src="../plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE -->
      <script src="../dist/js/adminlte.js"></script>

      <!-- OPTIONAL SCRIPTS -->
      <script src="../plugins/chart.js/Chart.min.js"></script>
      <script src="../dist/js/demo.js"></script>
      <script src="../dist/js/pages/dashboard3.js"></script>
      </body>
      </html>
