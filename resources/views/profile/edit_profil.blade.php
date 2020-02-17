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
            <h1>Edit Profil Dosen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

            <!-- Profile Image -->
          
            <div class="card card-outline card-info">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="max-height: 100px; border: solid #DDD" class="profile-user-img img-responsive img-circle" src="https://pklkomsi.000webhostapp.com/assets/images/foto-profil/dosen/" onerror="this.src='https://pklkomsi.000webhostapp.com/assets/dist-4/img/avatar.png'" alt="User profile picture"
                       alt="User profile picture">
                </div>
                

                <h3 class="profile-username text-center">IMAM FAHRURROZI M.Cs</h3>
                <p class="text-muted text-center"><b>NIP </b>d001</p>
                
                <div class="row">
                  <div class="col-md-6">     
                    <div class="form-group">
    					<input type="file" class="form-control required" id="foto" name="foto">
                        <p class="text-muted"><small><i>*Max ukuran 1 MB, JPG|PNG</i></small></p>
					</div>
                </div>

                                                 
				<div class="form-group float-right">						
					<input type="submit" class="btn btn-primary btn-block" value="Ubah Foto">
				</div>
			</div>
        </div>
              <!-- /.card-body -->
            </div>
          </div>
           
            <!-- /.card -->

           
                

           <form>    
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Detail Profil</h3>
                    </div>
            
            <div class="card-body">
                  <form class="form-horizontal">
					        	<div class="row">
						        	<div class="col-md-6">
							        	<div class="form-group">
								          <label for="fname">Nama</label>
								  <input type="text" class="form-control required" id="nama_mahasiswa" placeholder="Nama Lengkap">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label for="fname">NIP </label>
								  <input type="text" class="form-control" id="nip" name="nim" placeholder="NIP" >
								  <input type="hidden" class="form-control required" id="id_dosen" name="id_dosen">
								</div>
							</div>
						</div>
           			 <div class="row">

							<div class="col-md-6">
								<div class="form-group">
								  <label for="fname">Email</label>
								  <input type="email" class="form-control required" id="email" name="email" placeholder="Email">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								  <label for="fname">Nomor Handphone <small><font color="grey" style="font-weight: 100">(WhatsApp)</font></small></label>
								  <input type="text" class="form-control required" id="no_hp_mahasiswa" name="no_hp_mahasiswa" placeholder="contoh : 0858xxx">
								</div>
							</div>
						</div>

            <br>
            <br>
            <div class="profile-username text-center">
				<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="/profil" class="btn btn-default" data-toggle="tab" aria-expanded="true">Batal</a>
				</div>
    		</div>
       </form>

    </section>
    <!-- /.content -->
  </div>
  @endsection
