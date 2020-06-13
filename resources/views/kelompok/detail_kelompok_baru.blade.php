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
              <h3 class="card-title">Detail Kelompok </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form">
                  <div class="col-sm-12">
                  
                      <!-- select -->
                      
                     
                </form>
                </div>
                <div class="col-md-12">
                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="card-body box-profile">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item list-group-unbordered">

                                                      @if (!empty($instansi))
                                                        <p> <h5><i class="fas fa-building" ></i> Magang di <strong>{{$instansi->nama}}</strong></h5></p>
                                                      @else
                                                      <p> <h5><i class="fas fa-building" ></i> Magang di <strong></strong></h5></p>
                                                      @endif   
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="text-center">
                                        @if (!empty($instansi))
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('/images/users/'.$instansi->foto) }}"
                                                alt="User profile picture">
                                                      @else
                                                      <img class="profile-user-img img-fluid img-circle"
                                                src=""
                                                alt="User profile picture">
                                                      @endif 
                                           
                                        </div>
                                        
                                        @if (!empty($instansi))
                                                        <p> <h3 class="profile-username text-center">{{$instansi->nama}}</h3></p>
                                                      @else
                                                      <p> <h3 class="profile-username text-center"></h3></p>
                                                      @endif 

                                                      @if (!empty($instansi))
                                                      <p class="text-muted text-center"><i class="fas fa-map-marker-alt"></i> {{$instansi->alamat}}</p>
                                                      @else
                                                      <p class="text-muted text-center"><i class="fas fa-map-marker-alt"></i></p>
                                                      @endif 
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body box-profile">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                <p><b>Website</b></p>
                                                @if (!empty($instansi))
                                                <p>{{$instansi->website}}</li>
                                                      @else
                                                      <p></li>
                                                      @endif 
                                               
                                               
                                                <li class="list-group-item">
                                                <p><b>Deskripsi</b></p>
                                                @if (!empty($instansi))
                                                <p>{{$instansi->deskripsi}}</li>
                                                      @else
                                                      <p></li>
                                                      @endif 
                                                <p></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                  </div>
                        <table id="table-groupdetail" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <!-- <th>No</th> -->
                              <th>Foto</th>
                              <th>Nama Mahasiswa</th>
                              <th>Nim</th>
                              <th>Angkatan</th>
                              <th>Kontak</th>
                              <th>Status</th>
                            </tr>
                          <!-- <th>1</th>
                          <th>1</th>
                          <th>rama.jpg</th>
                          <th>Marsekal rama</th>
                          <th>17/410839/SV/12766</th>
                          <th>2017</th>
                          <th>Ketua</th> -->
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
<script type="text/javascript">
  var tableGroup;
  $(document).ready(function(){
    tableGroup = $('#table-groupdetail').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url:"{{ url('table/data-detailKelompok/'.$id_kelompok) }}",
            type: "GET",
        },
        columns: [
            { data: 'id_kelompok_detail', name:'id_kelompok_detail', visible:false},
            // { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'foto', name: 'foto',
                    render: function( data, type, full, meta ) {
                        return "<img src="+ data +" height=\"50\"/>";
                    }
                },
            // { data: 'foto', name:'foto', visible:true},
            { data: 'nama', name:'nama', visible:true},
            { data: 'nim', name:'nim', visible:true},
            { data: 'angkatan', name:'angkatan', visible:true},
            { data: 'no_hp', name:'no_hp', visible:true},
            { data: 'status_keanggotaan', name:'status_keanggotaan', visible:true},
        ],
      });
  });
</script>
@endsection