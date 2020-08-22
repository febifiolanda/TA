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
        @if (!empty($periode))
                <p><h2>Periode Kerja Praktek <strong>{{$periode->tahun_periode}}</strong></h2><i class="text-muted">{{$date}}</i></p>
              @else
                <p><h2>Periode KP <strong>tidak aktif</strong></h2></p>
              @endif
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <div class="alert alert-success alert-dismissible">
                            @if (!empty($periode))
                              <i class="icon fas fa-calendar"></i> Saat ini adalah periode Kerja Praktek .
                              <h3><b>{{Carbon\Carbon::parse($periode->tgl_mulai)->translatedFormat('d F Y')}}</b> - <b>{{Carbon\Carbon::parse($periode->tgl_selesai)->translatedFormat('d F Y')}}</b></h3>
                            @else
                            <i class="icon fas fa-calendar"></i> Saat ini tidak ada periode KP yang aktif .
                            @endif
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
                  <div class="inner" id="kelompokcount">
                  <!-- <h3>12<sup style="font-size: 20px"> Kelompok</sup></h3> -->
                  <p>Status sedang <b>KP</b></p>
                  </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="/group" class="small-box-footer">Cek List Kelompok <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><sup style="font-size: 20px">Profile</sup></h3>
                  <p>Dosen</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/profile" class="small-box-footer">Cek profile <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                  <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><sup style="font-size: 20px"> Cek Buku Harian</sup></h3>
                  <p>mahasiswa</p>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="/list_kegiatanHarian" class="small-box-footer">Cek list buku harian  <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                  <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner" id="laporanCount"> 
                  <!-- <h3>2<sup style="font-size: 20px">Kelompok</sup></h3> -->
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
<script>
  
  $(document).ready(function(){
    $.ajax({
      type: 'GET',
      url: '/kelompokcount',
      dataType: 'JSON',
      success: function (response) {
        var kel = "<h3>"+response.kelompok+"<sup style='font-size: 20px'>kelompok</sup></h3>"+
        "";
        $("#kelompokcount").append(kel);
      }
    });
    $.ajax({
      type: 'GET',
      url: '/laporancount',
      dataType: 'JSON',
      success: function (response) {
        var kel2 = "<h3>"+response.kelompok+"<sup style='font-size: 20px'>Kelompok</sup></h3>"+
        "<p></p>";
        $("#laporanCount").append(kel2);
      }
    });
  });
</script>

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