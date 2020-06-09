@extends('layout.welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content">
      
      <div class="col-12">
        <div class="card">
          <div class="card-body">
              <!-- Main content -->
              <section class="content">
              <div class="container-fluid">
                  <div class="row">
                  <div class="col-md-3">

                      <!-- Profile Image -->
                      <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                          <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                          </div>

                          <h3 class="profile-username text-center" id="ketua_name"></h3>
                          <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                              <b>NIM  </b> <a class="float-right" id="ketua_nim"></a>
                          </li>
                          <li class="list-group-item">
                              <i class="nav-icon fas fa-users"></i> <a class="float-right">Ketua</a>
                          </li>
                          <div class="card-header p-2">
                          <ul class="nav nav-pills">
                                <!-- tab-pane -->
                              <li class="nav-item" class="float-center"><a class="nav-link" href="/" data-toggle="tab">Kelompok</a></li>
                          </ul>
                      </div>
                      </div>
                      <!-- /.card-body -->
                      </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-9">
                      <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="Kelompok">
                                    <div id="div-anggota">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <!-- anggota pertama -->
                                                <div class="card-body box-profile">
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item list-group-unbordered">
                                                            <h5><i class="fa fa-user" ></i><strong>Anggota</strong></h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <img class="profile-user-img img-fluid img-circle"
                                                        src="../../dist/img/user4-128x128.jpg"
                                                        alt="User profile picture">
                                                </div>
                                                <h3 class="profile-username text-center">Nofa Dwi Adelia</h3>
                                            
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body box-profile">
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                        <b>NIM</b> <a class="pull-right">17/410000/SV/12000</a>
                                                        </li>
                                                        <li class="list-group-item">
                                                        <b>Angkatan</b> <a class="pull-right">2017</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- tab-pane magang -->
                            <div class="tab-pane" id="Magang">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="card-body box-profile">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item list-group-unbordered">
                                                    <h5><i class="fas fa-building" ></i> Magang di <strong>PT KAI</strong></h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="../../dist/img/user4-128x128.jpg"
                                                alt="User profile picture">
                                        </div>
                                        
                                        <h3 class="profile-username text-center">PT KAI</h3>
                                        <p class="text-muted text-center"><i class="fas fa-map-marker-alt"></i> Jakarta Timur, DKI Jakarta <br>13640</p>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body box-profile">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                <p><b>Contact</b></p>
                                                <p>121 / (021) 121</li>
                                                <li class="list-group-item">
                                                <p><b>Alamat Instansi</b></p>
                                                <p> PT Indonesia Comnets Plus
                                                Kawasan PLN Cawang,
                                                Jl. Mayjend Sutoyo No. 1, Cililitan
                                                Jakarta Timur, 13640.</p>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
              </section>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
    $(document).ready(function(){
        // getData();

        $.ajax({
          url: "{{url('api/kelompok/detail/1')}}",
          type: "GET",
          success: function(response) {
               console.log(response);
               console.log(response.ketua.length);

               $('#ketua_name').text(response.ketua[0].nama);
               $('#ketua_nim').text(response.ketua[0].nim);

               for (var i=0; i < response.ketua.length; i++){
                var newDiv = document.createElement("div");
                var newheading = document.createElement("h2");
                newheading.innerText = response.anggota[i].nama;
                newDiv.id='r'+i;
                newDiv.id='h'+i;
                newDiv.innerHTML = response.anggota[i].nama;
                newDiv.className = 'ansbox';
                $('div-anggota').appendChild(newheading);
                $('div-anggota').appendChild(newDiv);
               }
          },
          error: function(xhr) {
            console.log(xhr);
          }
        });
    });

    // function getData(){

    // }
</script>

@endsection