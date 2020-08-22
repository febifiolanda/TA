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
             <h3 class="box-title">Penilaian Dosen Pembimbing Mahasiswa KP</h3>
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
                  <table class="table table-bordered table-striped" id="table-nilaiakhir">
                  <thead>
                            <tr>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Nilai Teman</th>
                            <th>Nilai Pembimbing</th>
                            <th>Nilai Penguji</th>
                            <th>Nilai Instansi</th>
                            <th>Nilai Akhir</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if (!empty($mahasiswa))
                              <th>{{$mahasiswa->nama}}</th>
                              @else
                              <th></th>
                          @endif
                          @if (!empty($mahasiswa))
                              <th>{{$mahasiswa->nim}}</th>
                              @else
                              <th></th>
                          @endif
                          @if (!empty($resultTeman2))
                              <th>{{$resultTeman2}}</th>
                              @else
                              <th></th>
                          @endif
                          @if (!empty($resultDospem2))
                              <th>{{$resultDospem2}}</th>
                              @else
                              <th></th>
                          @endif 
                          @if (!empty($resultPenguji2))
                              <th>{{$resultPenguji2}}</th>
                              @else
                              <th></th>
                          @endif 
                          @if (!empty($resultInstansi2))
                              <th>{{$resultInstansi2}}</th>
                              @else
                              <th></th>
                          @endif
                          @if (!empty($finalResult))
                              <th>{{$finalResult}}</th>
                              @else
                              <th></th>
                          @endif 
                          </tbody>
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
<!-- <script  type="text/javascript">
 var tableGroup;
  $(document).ready(function(){
    tableGroup = $('#table-nilaiakhir').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-nilaiAkhir/'.$id_mahasiswa) }}",
            type: "GET",
        },
        columns: [
            { mahasiswa: 'id_mahasiswa', name:'id_mahasiswa', visible:false},
            { mahasiswa: 'nama', name:'nama', visible:true},
            
        ],
      });
  });
</script> -->
@endsection