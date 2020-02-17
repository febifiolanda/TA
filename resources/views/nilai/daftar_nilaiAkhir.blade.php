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
              <h2 class="card-title"><b>Detail Kelompok</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p>Kelompok 1</p>
                <div>
                    <b>Dosen Pembimbing &emsp; : </b> &emsp; <a href="">Imam Fakhrurrozi, M.Cs</a><br/>
                    <b>Tempat Magang&emsp;&emsp;&emsp;: </b> &emsp; PT. GMF AeroAsia Tbk<br/>
                    <b>Mentor &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;: </b> &emsp; <a href=""> Adji Bowo</a> <br/>
                    <b>Waktu Magang &emsp;&emsp;&emsp;    : </b> &emsp; 24 Juni 2019 - 10 Agustus 2019<br/>
                    <b>Lokasi Magang &emsp;&emsp;&emsp;   : </b> &emsp; 
                    

                </div>
                <!-- <div class="row">
                    <div class="col-sm-2"><b>Tempat Magang&emsp;: </b></div>
                    <div class="col-sm-4"> PT. GMF AeroAsia Tbk</div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><b>Mentor&emsp; &emsp; &emsp;: </b></div>
                    <div class="col-sm-4"> PT. GMF AeroAsia Tbk</div>
                </div> -->
                <br>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>No.HP</th>
                  <th>Status</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>17/410000/SV/13000</td>
                  <td>marsekal
                  </td>
                  <td>979807890</td>
                  <td>Ketua</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="/nilai_akhir" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>17/420000/SV/14000</td>
                  <td>nofa
                  </td>
                  <td>89695</td>
                  <td>Anggota</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="nilai_akhir" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>17/430000/SV/13000</td>
                  <td>dear
                  </td>
                  <td>997896</td>
                  <td>Anggota</td> 
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="nilai_akhir" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
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