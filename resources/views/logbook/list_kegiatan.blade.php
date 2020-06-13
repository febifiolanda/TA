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
              <h3 class="card-title">Daftar Mahasiswa </h3>
            </div>
              <table id="table-buku-harian" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Datang</th>
                  <th>pulang</th>
                  <th>kegiatan</th>
                  <!-- <th>Status</th> -->
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>            
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
  var tableGroup;
  // var id_mahasiswa 
  $(document).ready(function(){
    tableGroup = $('#table-buku-harian').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-bukuharian/'.$id) }}",
            type: "GET",
        },
        columns: [
            { data: 'id_mahasiswa', name:'id_mahasiswa', visible:false},
            { data: 'tanggal', name:'tanggal', visible:true},
            { data: 'waktu_mulai', name:'waktu_mulai', visible:true},
            { data: 'waktu_selesai', name:'waktu_selesai', visible:true},
            { data: 'kegiatan', name:'kegiatan', visible:true},
            { data: 'action', name:'action', visible:true},
        ],
      });
  });
</script>
@endsection