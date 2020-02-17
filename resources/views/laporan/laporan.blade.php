@extends('layout.welcome')
@section('content')
<section class="content-header">
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="row justify-content-center">
          <div class="alert alert-success alert-info">
					<h4></i> Kelompok yang telah mengumpulkan Laporan
			          	</div>
                  </div>  
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Kelompok</th>
                      <th>Status</th>
					            <th>Judul</th>
					            <th>Laporan</th>
					            <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                      <td>1</td>
                      <td>2016</td>
                      <td>Diponegoro</td>
                      <td>
						          <span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      
                      <td><a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf">View</a></td>
                      <td>12 Feb 2020</td>
                </tr>
                <tr>
                      <td>2</td>
                      <td>2017</td>
                      <td>Diponegoro</td>
                      <td>
					          	<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      <td><a class="btn btn-primary view-pdf" href="cv.marsekal-rama.net/files/CV-Rama.pdf">View</a></td>
                      <td>12 Feb 2020</td>
                </tr>
                <tr>
                      <td>3</td>
                      <td>2018</td>
                      <td>Diponegoro</td>
                      <td>
					          	<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      <td><a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf">View</a></td>
                      <td>12 Feb 2020</td>
                </tr>
                <tr>
                      <td>4</td>
                      <td>2019</td>
                      <td>Diponegoro</td>
                      <td>
					          	<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      <td><a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf">View</a></td>
                      <td>12 Feb 2020</td>
                </tr>
                <tr>
                      <td>5</td>
                      <td>2019</td>
                      <td>Diponegoro</td>
                      <td>
					          	<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      <td><a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf">View</a></td>
                      <td>12 Feb 2020</td>
                </tr>
                <tr>
                      <td>6</td>
                      <td>2019</td>
                      <td>Diponegoro</td>
                      <td>
					          	<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      <td><a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf">View</a></td>
                      <td>12 Feb 2020</td>
                </tr>
                <tr>
                      <td>7</td>
                      <td>2019</td>
                      <td>Diponegoro</td>
                      <td>
					          	<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      <td><a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf">View</a></td>
                      <td>12 Feb 2020</td>
                </tr>
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
  $(function () {
    $("#example1").DataTable();
  });
  (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
$(function(){    
    $('.view-pdf').on('click',function(){
        var pdf_link = $(this).attr('href');
        var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
        $.createModal({
        title:'Laporan Akhir',
        message: iframe,
        closeButton:true,
        scrollable:false
        });
        return false;        
    });    
})
</script>

@endsection
	
