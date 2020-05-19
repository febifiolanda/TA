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
  // $(document).on('click','.declinebtn', function(e){
  //       e.preventDefault();

  //       var persetujuan = 'ditolak';
  //       id_kelompok = $(this).attr('id');

  //       $.ajax({
  //           type: "POST",
  //           headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
  //           url: "/api/admin/tolak_kelompok/",
  //           cache:false,
  //           dataType: "json",
  //           data: {'persetujuan': persetujuan, 'id_kelompok': id_kelompok},
  //           success: function(data){
  //             toastr.options.closeButton = true;
  //             toastr.options.closeMethod = 'fadeOut';
  //             toastr.options.closeDuration = 100;
  //             toastr.success(data.message);
  //             $('#persetujuan_data').DataTable().ajax.reload();
  //           },
  //           error: function(error){
  //             console.log(error);
  //           }
  //       });
  //   });
    
  // $(document).on('click','.accbtn', function(e){
  //   e.preventDefault();
  //   id_daftar_lowongan = $(this).attr('id');
  //   var status = $('#statusacc').val();
  //   $.ajax({
  //       type: "POST",
  //       headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
  //       url: "/api/admin/persetujuanlowongan/",
  //       cache:false,
  //       dataType: "json",
  //       data: {'id_daftar_lowongan': id_daftar_lowongan, 'status': status},
  //       success: function(data){
  //         toastr.options.closeButton = true;
  //         toastr.options.closeMethod = 'fadeOut';
  //         toastr.options.closeDuration = 100;
  //         toastr.success(data.message);
  //         // $('#persetujuan_data').DataTable().ajax.reload();
  //       },
  //       error: function(error){
  //         console.log(error);
  //       }
  //   });
  // });

  // $(document).on('click','.declinebtn', function(e){
  //   e.preventDefault();
  //   id_daftar_lowongan = $(this).attr('id');
  //   var statusdecline = $('#statusdecline').val();
  //   $.ajax({
  //       type: "POST",
  //       headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
  //       url: "/api/admin/persetujuanlowongan/",
  //       cache:false,
  //       dataType: "json",
  //       data: {'id_daftar_lowongan': id_daftar_lowongan, 'status': statusdecline},
  //       success: function(data){
  //         toastr.options.closeButton = true;
  //         toastr.options.closeMethod = 'fadeOut';
  //         toastr.options.closeDuration = 100;
  //         toastr.success(data.message);
  //         // $('#persetujuan_data').DataTable().ajax.reload();
  //       },
  //       error: function(error){
  //         console.log(error);
  //       }
  //   });
  // });
</script>
@endsection