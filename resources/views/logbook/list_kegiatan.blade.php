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
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr>
                  <td>1</td>
                  <td>2020-03-04</td>
                  <td>07:30:00</td>
                  <td>17:30:00</td>
                  <td>meeting client</td>
                  <td class="text-center py-0 align-middle">
                      <a href="#" class="btn-sm btn-info"><i class="fas fa-check"></i></a>
                      <a href="#" class="btn-sm btn-danger"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>2020-03-04</td>
                  <td>07:30:00</td>
                  <td>17:30:00</td>
                  <td>meeting client</td>
                  <td class="text-center py-0 align-middle">
                      <a href="#" class="btn-sm btn-info"><i class="fas fa-check"></i></a>
                      <a href="#" class="btn-sm btn-danger"><i class="fas fa-times"></i></a>
                    </td>
                </tr> -->
                
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

  // DECLINE
  $(document).on('click','.declinebtn', function(e){
        e.preventDefault();

        var persetujuan = 'ditolak';
        id_kelompok = $(this).attr('id');

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/admin/tolak_kelompok/",
            cache:false,
            dataType: "json",
            data: {'persetujuan': persetujuan, 'id_kelompok': id_kelompok},
            success: function(data){
              toastr.options.closeButton = true;
              toastr.options.closeMethod = 'fadeOut';
              toastr.options.closeDuration = 100;
              toastr.success(data.message);
              $('#persetujuan_data').DataTable().ajax.reload();
            },
            error: function(error){
              console.log(error);
            }
        });
    });
</script>
@endsection