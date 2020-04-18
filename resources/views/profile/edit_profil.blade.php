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
	
	<div class="col-12">
        <div class="card">
            <div class="card-body">
				<form  method="post" enctype="multipart/form-data" action="#">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">         
							<label>CV</label>                       
								<div class="input-group input-group">
									<input type="file" class="form-control required" id="cv" name="cv">
									<span class="input-group-append">
										<button type="button" class="btn btn-info btn-flat">Save</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</form>	
				</div>  
			</div>
		</div>


		<div class="col-12">
			<div class="card">
			<form  method="post" enctype="multipart/form-data" action="{{route('profil.update', $dosen->id_dosen)}}">
			{{ csrf_field() }}
				<div class="card-body">
					<div class="card-body card-primary  table-responsive p-0"></br>
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="fname">NIP </label>
											<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ $dosen->nip}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="fname">Nama Lengkap</label>
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $dosen->nama }}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="fname">No.HP </label>
											<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No.HP" value="{{ $dosen->no_hp }}" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="fname">Email </label>
											<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $dosen->email }}" >
										</div>
									</div>
								</div>
							</div>
						</div>
						
					
						</table><br/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								</div>
							</div>
						</div>	
					</div>
					</br>
					<div class="box-footer float-right">
						<button type="submit" class="btn btn-info"> Save </button>
					</div>
				</div>                     
          	</form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
