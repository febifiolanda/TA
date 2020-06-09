@extends('layout.welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-10">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Detail Info Penilaian</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h4 id="kelompok"></h4><br>
                 <div class="row">
                    <div class="col-2"><b class="badge badge-info">Nama Dosen</b></div>
                    <div class="col-3" id="nama_dosen"></div>
                  </div>
                  <div class="row">
                    <div class="col-2"><b class="badge badge-info">Periode</b>
                    </div>
                    <div class="col-3" id="tahun_periode"></div>
                  </div>
                  <div class="row">
                    <div class="col-2"><b class="badge badge-info">Mulai Praktik Kerja</b>
                    </div>
                    <div class="col-3" id="tanggal_mulai">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2"><b class="badge badge-info">selesai Praktik Kerja</b>
                    </div>
                    <div class="col-3" id="tanggal_selesai">
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-2"><b class="badge badge-info">Instansi</b>
                    </div>
                    <div class="col-3" id="nama_instansi">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2"><b class="badge badge-info">Lokasi</b>
                    </div>
                    <div class="col-3" id="lokasi_instansi"></div>
                  </div>
                </div>
                    <a href="/detail_nilai" class="col-3 btn btn-success float-right btn-sm"><i class="fas fa-plus">&emsp; Input Nilai</i></a> <br><br>
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
<script>
  $(document).ready(function(){
    var id;
    id = {{$id_kelompok}};
    $.ajax({
        type: "GET",
        url: "{{ url('/detail_inputNilai') }}" + "/" + id,
        dataType: "json",
        success: function(data){
          console.log(data);
          $('#kelompok').text(data.nama_kelompok);
          $('#nama_dosen').text(data.dosen.nama);
          $('#tahun_periode').text(data.periode.tahun_periode);
          $('#tanggal_mulai').text(data.periode.tgl_mulai);
          $('#tanggal_selesai').text(data.periode.tgl_selesai);
          $('#nama_instansi').text(data.nama);
          $('#lokasi_instansi').text(data.alamat);

        },
        error: function(error){
          console.log(error);
        }
    });
  });
</script>
<!-- <script>

  $(document).on('click','.accbtn', function(e){
    e.preventDefault();

    id_daftar_lowongan = $(this).attr('id');
    id_kelompok = $('#idkelompok').val();
    id_instansi = $('#idinstansi').val();
    var status = $('#statusacc').val();

    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        url: "/api/admin/persetujuanlowongan/",
        cache:false,
        dataType: "json",
        data: {'id_daftar_lowongan': id_daftar_lowongan, 'status': status, 'id_kelompok': id_kelompok, 'id_instansi': id_instansi},
        success: function(data){
          toastr.options.closeButton = true;
          toastr.options.closeMethod = 'fadeOut';
          toastr.options.closeDuration = 100;
          toastr.success(data.message);
          window.location.reload();
        },
        error: function(error){
          console.log(error);
        }
    });
  });
</script> -->
@endsection
	
