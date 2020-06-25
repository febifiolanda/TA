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
              <h3 class="card-title">Daftar Kelompok Nilai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form">
                  <div class="col-sm-4">
                  <p>Saring berdasarkan</p>
                      <!-- select -->
                      <div class="form-group">
                          <select class="form-control form-control-sm">
                            <option>Periode PKL</option>
                            <option>Angkatan</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                          </select>
                       </div>
                      <button type="submit" class="btn btn-default">Filter</button> <br><br>
                </form>
                  </div>
                        <table id="table-listpenguji" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>No</th>
                              <th>Nama Kelompok</th>
                              <th>Angkatan</th>
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
  $(document).ready(function(){
    tableGroup = $('#table-listpenguji').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-groupNilaiAkhirPenguji') }}",
            type: "GET",
        },
        columns: [
            { data: 'id_mahasiswa', name:'id_mahasiswa', visible:false},
            { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'group.nama_kelompok', name:'group.nama_kelompok', visible:true},
            { data: 'mahasiswa.nama', name:'mahasiswa.nama', visible:true},
            { data: 'mahasiswa.angkatan', name:'mahasiswa.angkatan', visible:true},
            { data: 'action', name:'action', visible:true},
        ],
      });
  });
</script>
@endsection