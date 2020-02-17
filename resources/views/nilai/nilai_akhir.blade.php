@extends('layout.welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
    </section>
    <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box-header">
             <h3 class="box-title">Penilaian Dosen Pembimbing Mahasiswa PKL</h3>
             </div>
                <section class="content">
			<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="alert alert-success alert-info">
					<h4><i class="icon fa fa-check"></i> Pastikan Anda telah memberi Nilai!</h4>
					Pastikan Anda telah memberi nilai bagi Mahasiswa yang telah selesai melakukan magang. Terimakasih
				</div>
			</div>
		</div>
    <br>
    <br>
    <div class="box-body">
						<div class="col-md-12 text-center">
                        <div class="col-md-1"> </div>
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <span class="badge badge-success"> 5 </span>
                                <br>Sangat Baik
                            </div>
							
                            <div class="col-md-2"> 
                                <span class="badge badge-primary"> 4 </span>
                                <br>Baik
                            </div>

                            <div class="col-md-2">
                                <span class="badge badge-warning"> 3 </span>
                                <br>Cukup
                            </div>
							<div class="col-md-2">
                                <span class="badge badge-danger"> 2 </span>
                                <br>Kurang
                            </div>
							
                            <div class="col-md-2">
                                <span class="badge badge-secondary"> 1 </span>
                                <br>Sangat Kurang
                            </div>
						</div>
                    </div>
      </div>
      <br>
      <br>
      <br>
        <div class="row justify-content-center">
                  <div class="col-md-12">
                  <table class="table table-bordered table-striped">
                    <tr>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Status PKL</th>
                      <th>Nilai Instansi</th>
                      <th>Nilai Dosen</th>
                      <th>Nilai Tim Penguji</th>
                      <th>Nilai Kelompok</th>
                    </tr>
                      <tr>
                      <td>17/386088/SV/09474</td>
                      <td>marsekal rama</td>
                      <td>
						<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>1.3</td>
                      <td>1.06</td>
                      <td>1.25</td>
                      <td>2.0</td>
                    </tr>
                                      </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                                    </div>
              </div><!-- /.box -->
            </div>
			<div class="col-md-4">
												  
				<div class="row">
					<div class="col-md-12">
											</div>
				</div>
			</div>
        </div>
		    </section>
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