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
              <table id="table-laporan" class="table table-bordered table-striped ">
                <thead>
                <tr>
                      <th>id</th>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Kelompok</th>
					            <th>Judul</th>
					            <th>Laporan</th>
					            <th>Tanggal Upload</th>
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
  $(function () {
    $("#example1").DataTable();
  });
  (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog modal-lg">';html+='<div class="modal-content modal-lg">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
// $(function(){    
//     $('.view-pdf').on('click',function(){
//         var pdf_link = $(this).attr('href');
//         var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
//         $.createModal({
//         title:'Laporan Akhir',
//         message: iframe,
//         closeButton:true,
//         scrollable:false
//         });
//         return false;        
//     });    
// })
</script>
<script type="text/javascript">
  var tableLaporan;
  $(document).ready(function(){
    tableLaporan = $('#table-laporan').DataTable({
        processing	: true,
        language: {
                    search: "Search",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-laporan') }}",
            type: "GET",
        },
        columns: [
            { data: 'id_laporan', name:'id_laporan', visible:false},
            { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'group.periode.tahun_periode', name:'group.periode.tahun_periode', visible:true},
            { data: 'group.nama_kelompok', name:'group.nama_kelompok', visible:true},
            { data: 'judul', name:'judul', visible:true},
            { data: 'action', name:'action', visible:true},
            { data: 'tgl_upload', name:'tgl_upload', visible:true},
        ],
      });
  });



$('body').on('click', '.lihatBerkas', function lihatBerkas() {

var berkas = $(this).data('id');

// var pdf_link = $(this).attr('href');
        var iframe = '<div class="iframe-container" ><iframe src="'+berkas+'" style="width:100%; height:700px;" frameborder="0"  ></iframe></div>'
        $.createModal({
        title:'Laporan Akhir',
        message: iframe,
        closeButton:true,
        scrollable:false
        });
        return false;  

});

</script>

@endsection
	
