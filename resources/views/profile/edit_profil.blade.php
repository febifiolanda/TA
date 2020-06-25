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
      <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <form id="editdosen">
                            @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="nama" value="{{ $dosen->nama }}">                                       
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="email" class="col-sm-3 col-form-label">Email *</label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" required name="email" value="{{ $dosen->email }}">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label">No HP *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="no_hp" value="{{ $dosen->no_hp }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 col-form-label">NIP *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="nip" value="{{ $dosen->nip }}">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_dosen" id="id_dosen" value="{{ $dosen->id_dosen }}">
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                        <button type="reset"class="btn btn-danger">Cancel</button>
                                        </span>
                                        <span>
                                        <button type="submit" id="submit" class="btn btn-primary" >Save</button>
                                        </span>
                                   </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
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
    <!-- /.content -->
  </div>
  @endsection
  @section('scripts')
  <script>

$('#editdosen').on('submit', function(e){
      var id = $('#id_dosen').val();

      e.preventDefault();
      $.ajax({
          type: "POST",
          url: "/api/ubah_profile/"+id,
          // dataType:'json',
          // contentType: false,
          // cache: false,
          // processData: false,
          
          data: $(this).serialize(),
          // data: new FormData(this),
          success: function(data){
              window.location.reload();
              // window.location = "/profile/"+$('#id_instansi').val(); ini error
              redirect('/profile');
              toastr.options.closeButton = true;
              toastr.options.closeMethod = 'fadeOut';
              toastr.options.closeDuration = 100;
              toastr.success(data.message);
          },
          error: function(error){
          console.log(error);
          }
      });
    });
</script>
@endsection