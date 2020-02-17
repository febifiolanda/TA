@extends('layout.welcome')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Dosen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="max-height: 100px; border: solid #DDD" class="profile-user-img img-responsive img-circle" src="https://pklkomsi.000webhostapp.com/assets/images/foto-profil/dosen/" onerror="this.src='https://pklkomsi.000webhostapp.com/assets/dist-4/img/avatar.png'" alt="User profile picture"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">IMAM FAHRURROZI M.Cs</h3>
                <p class="text-muted text-center"><b>NIP</b>d001</p>
                
              </div>
              <!-- /.card-body -->
            </div>
            </div>
           
            <!-- /.card -->

           
                

               
            <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Detail Profil</h3>
                        </div>

          <div class="card-body">
            <div class="row">
							<div class="col-md-3">
								<strong><i class="fas fa-envelope mr-1"></i> Email</strong>
								<p class="text-muted">imam.fahrurrozi@ugm.ac.id</p>
							</div>
							<div class="col-md-3">
								<strong><i class="fas fa-pencil-alt mr-1"></i>Slot</strong>
								<p class="text-muted">penuh</p>
							</div>
							<div class="col-md-3">
                <strong><i class="fa fa-phone mr-1"></i> No Handphone </strong>
								<p class="text-muted">083869281843</p>
							</div>
              <div class="col-md-3">
                <strong><i class="fas fa-file-profile mr-1"></i>NIP</strong>
								<p><a class="text-muted">d001</a></p>
							</div>
						</div>
               
               

               <br>
			   <br>
                <div class="row justify-content-center">
                <td class="project-actions text-right">
                  <a class="btn btn-primary btn-sm float-right" href="edit_profil">
                    <i class="fas fa-pencil-alt"></i>
                      Edit
                  </a>
                </td>
				</div>
            </div>
        </div>
    </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection
