@extends('layout.welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->

<section class="content-header">
        <h1>
            <i class="fas fa-tachometer" aria-hidden="true"></i> Dashboard
        </h1>
</section>
    <section class="content">
      <div class="row">
        <div class="col-md-12 text-center"> 
                <p><h2>Periode PKL <strong>2020</strong></h2><i class="text-muted">24 juni 2020</i></p>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <div class="alert alert-success alert-dismissible">
                                <i class="icon fas fa-calendar"></i> Saat ini adalah periode PKL.
                                <h3><b>2020</b> - <b>2021</b></h3>
                            </div>
                        </div>
                    </div>
                    <br>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <h3>12<sup style="font-size: 20px"> Kelompok</sup></h3>
                  <p>Status sedang <b>PKL</b></p>
                  </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="/kelompok" class="small-box-footer">Cek List Kelompok <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>4<sup style="font-size: 20px"> Kelompok</sup></h3>
                  <p>Telah dinilai oleh <b>Instansi</b></p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/" class="small-box-footer">Cek List Kelompok <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                  <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>2<sup style="font-size: 20px"> Kelompok</sup></h3>
                  <p>Total Buku Harian</p>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="/list_kegiatanHarian" class="small-box-footer">Cek List Buku Harian  <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                  <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>2<sup style="font-size: 20px"> Kelompok</sup></h3>
                  <p>Laporan Masuk</p>
                </div>
                <div class="icon">
                  <i class="ion ion-thumbsup"></i>
                </div>
                <a href="/laporan" class="small-box-footer">Cek List Laporan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
    </section>
    
 
   

@endsection

@section('scripts')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<!-- script Api dashboard -->
<!-- <script type="text/javascript">
  // fungsi untuk menampilkan dashboard
  jQuery(document).ready(function($) {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/dashboard?api_token=
       < ?= $_GET['api_token']?>',
      type: 'GET',
    })
    .done(function(result) {
      console.log(result);
      $(".namaProfile").text(result.user.nama_lengkap);
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });
</script> -->
@endsection