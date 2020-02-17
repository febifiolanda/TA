@extends('layout.welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Penilaian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h4>Kelompok 1</h4><br>
                <div>
                    <b>Dosen Pembimbing &emsp; : </b> &emsp; Imam Fakhrurrozi, M.Cs<br/>
                    <b>Tempat Magang&emsp;&emsp;&emsp;: </b> &emsp; PT. GMF AeroAsia Tbk<br/>
                    <b>Mentor &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;: </b> &emsp; Adji Bowo <br/>
                    <b>Waktu Magang &emsp;&emsp;&emsp;    : </b> &emsp; 24 Juni 2019 - 10 Agustus 2019<br/>
                    <b>Lokasi Magang &emsp;&emsp;&emsp;   : </b> &emsp;<br>
                    <b>Jobdesk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  : </b> &emsp;<br>
                    <a href="/detail_nilai" class="btn btn-success float-right btn-sm"><i class="fas fa-plus">&emsp; Input Nilai</i></a> <br><br>
                </br>
              
                


      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection
	
