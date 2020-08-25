@extends('administracao.includes.app')
@section('estilo')
@endsection
@section('conteudo')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
				  <div>
					<h4 class="mb-3 mb-md-0">Benvindo ao Dashboard</h4>
				  </div>
				  <div class="d-flex align-items-center flex-wrap text-nowrap">
				
					<button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
					  <i class="btn-icon-prepend" data-feather="printer"></i>
					  Print
					</button>
					<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
					  <i class="btn-icon-prepend" data-feather="download-cloud"></i>
					  Baixar Report
					</button>
				  </div>
				</div>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Subscritores (Total)</h6>
                      <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{number_format($clientesTotal,2,'.',',')}}</h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span></span>
                            
                          </p>
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Subscrições e facturações (Diarias)</h6>
                      <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h5 class="mb-2">{{number_format($subscricoesDiarias,2,'.',',')}}</h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-info">
                            <span>{{number_format($facturacoesDiarias,2,'.',',')}} (MT)</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                          </p>
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Subscrições e facturações (Mensais) </h6>
                      <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                         </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{number_format($subscricoesMensais,2,'.',',')}}</h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span>{{number_format($facturacoesMensais,2,'.',',')}} (MT)</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                          </p>
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->

        <div class="row">
          <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">SUBSCRIÇÕES E FACTURAÇÕES MENSAIS</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <p class="text-muted mb-4">Resumo mensal</p>
                <div class="monthly-sales-chart-wrapper">
                  <canvas id="monthly-sales-chart"></canvas>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Report Diario</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div id="progressbar1" class="mx-auto"></div>
                
                
              </div>
            </div>
          </div>
        </div> <!-- row -->

        <div class="row">
          <div class="col-lg-4 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Ranking dos Subscritores</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column">
                @foreach($ranks as $rank)

                  <a href="#" class="d-flex align-items-center border-bottom pb-3">
                    <div class="mr-3">
                      <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                    </div>
                    
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{$rank->numero}}</h6>
                        <p class="text-muted tx-12">{{ $rank->total}}</p>
                      </div>
                      <p class="text-muted tx-13">{{$rank->nome}}</p>
                    </div>
                  </a>
                  <br>
                  @endforeach
                 
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Ultimos Subscritores</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column">
                @foreach($clientes as $topico)

                  <a href="#" class="d-flex align-items-center border-bottom pb-3">
                    <div class="mr-3">
                      <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                    </div>
                    
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{$topico->numero}}</h6>
                        <p class="text-muted tx-12">{{ \Carbon\Carbon::parse($topico->data)->format('d/m/Y')}}</p>
                      </div>
                      <p class="text-muted tx-13">{{$topico->nome}}</p>
                    </div>
                  </a>
                  <br>
                  @endforeach
                 
                </div>
              </div>
            </div>
          </div>

          


          <div class="col-lg-4 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Pacotes de Subscrição</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">#</th>
                        <th class="pt-0">Descricao</th>
                        <th class="pt-0">Data inicio</th>
                        <th class="pt-0">Data fim</th>
                        <th class="pt-0">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                   
                      @foreach($topicos as $topico)
                        <tr>
                          <td>{{$topico->id}}</td>
                          <td>{{$topico->descricao}}</td>
                          <td>{{ \Carbon\Carbon::parse($topico->data_inicio)->format('d/m/Y')}}</td>
                          <td>{{ \Carbon\Carbon::parse($topico->data_fim)->format('d/m/Y')}}</td>
                          <td>
                              @if($topico->estado=="activo")
                              <span class="badge badge-success">{{$topico->estado}}</span>
                              @else
                                <span class="badge badge-danger">{{$topico->estado}}</span>
                              @endif
                           </td>
                        </tr>

                      @endforeach
                  
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
          </div>
@include('administracao.includes.message_boxes')    
@endsection

@section('script')

<script src="{{ asset('public/template/assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{ asset('public/template/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{ asset('public/template/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('public/template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('public/template/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('public/template/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>


<script src="{{ asset('public/template/assets/js/dashboard.js')}}"></script>
<script src="{{ asset('public/template/assets/js/chat.js')}}"></script>


<script type="text/javascript">
 var baseUrl1= $('#Url_geral').val(); 

 var subscricoesMensais ="{{$facturacoesMensais}}";
 var setembro ="{{$Setembro}}";



 $(document).ready(function () {

  
  if($('#inicio').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#inicio').datepicker({
      format: "dd/mm/yyyy",
      todayHighlight: true,
      autoclose: true
    });

    $('#fim').datepicker({
      format: "dd/mm/yyyy",
      todayHighlight: true,
      autoclose: true
    });


    $('#inicio').datepicker('setDate', today);
  }
  
//fim



$('#post').DataTable({
  "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,

     "processing": true,
     "serverSide": true,
     "ajax":{
              "url": "{{ url('admin/subscritores/post') }}",
              "dataType": "json",
              "type": "POST",
              "data":{ _token: "{{csrf_token()}}"}
            },
            
     "columns": [
         { "data": "id" },
         { "data": "numero" },
         { "data": "nome" },
         { "data": "data" },
         { "data": "estado" },
         { "data": "options" },
        
     ],

     "serverSide": true,
      aoColumnDefs: [

     {
        bSortable: false,
        aTargets: [ -1,-2 ]

     }

   ],

   "order": [[1, "asc" ]]  

 });
});



$('#novo_registo').on('click',function () {
  
   $('#codigo').val("");
  $('#RegistoModal').modal('show'); 

});


$('#post').on('click', '.deletement', function (e) {
  
       var linhaCorrente=$(this).closest('tr');
       var codigo= linhaCorrente.find('.pegar').val();
      $('#codigoToDelete').val(codigo);
      $('#confirm-delete').modal('show'); 
 
});


$('#post').on('click', '.edicao', function (e) {
   var linhaCorrente=$(this).closest('tr');
   var codigo= linhaCorrente.find('.pegar').val();
   edicao(codigo)
   $('#exampleModalLabel').html("Actualização do Subscritor");
  $('#RegistoModal').modal('show'); 
 
});


$('#remocao').on('click',function () {
  
  eliminar($('#codigoToDelete').val());
  $('#confirm-delete').modal('hide'); 
});



$('#registo_user').validate({ 
  rules: {
        nome: {
          required: true,
          minlength: 7
        },
        inicio: {
          required: true,
          minlength: 4
        },
        fim: {
          required: true,
          minlength: 4,
         }
      },
      messages: {
        nome: {
          required: "Por favor coloque o descrição",
          minlength: "A descrição  no minimo com  7 characters"
        },
        inicio: {
          required: "Por favor coloque a data inicio",
          minlength: "Your no minimo com  4 characters"
        },
        fim: {
          required: "Por favor coloque a data fim",
          minlength: "Your no minimo com  4 characters",
         },
       },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
        submitHandler: function (form) {
          cadastro();
         
        }
    });



 
  
 function cadastro(){

            if($('#codigo').val()!=""){
               link=baseUrl1+'/admin/subscritores/update';
            }else{
               link=baseUrl1+'/admin/subscritores/save'; 
            }  
             
              var id=$('#codigo').val();
              var descricao=$('#nome').val();
              var inicio=$('#inicio').val();
              var fim=$('#fim').val();
              var estado=$('#estado').val();

                $.ajax({
                  dataType: 'text',
                  type:'POST',
                  url:link,
                  data:{descricao:descricao,inicio:inicio,fim:fim,estado:estado,id:id}
              }).done(function(data){
                  console.log(data);
                  $('#post').DataTable().ajax.reload();
                  $('#codigo').val("");
                  $('#RegistoModal').modal('hide'); 
                  notification('success',"dados salvos com sucesso");
                  limparCampos();
                }).fail( function( data ) {
                notification('error',"Falha ao gravar os dados");
                console.log(data);
            });
            

  }

  function edicao(id){
           $.ajax({
             dataType: 'text',
             type:'POST',
             url: baseUrl1+'/admin/subscritores/'+id, 
            }).done(function(data){
              var data = jQuery.parseJSON(data);
              $('#nome').val(data.dados.nome);
              $('#numero').val(data.dados.numero);
              $('#codigo').val(data.dados.id);
              $('#estado').val(data.dados.estado);
              console.log(data);
              $('#RegistoModal').modal('show'); 
             notification('success',"Dados do Subscritor");
            }).fail( function( data ) {
            notification('error',"Falha ao gravar os dados");
            console.log(data);
        });

}


  function  eliminar(id){
      $.ajax({
        dataType: 'text',
        type:'POST',
        url: baseUrl1+'/admin/subscritores/destroy/'+id, 
      }).done(function(data){
        notification('success',data);
        $('#post').DataTable().ajax.reload();
      }).fail( function( data ) {
      notification('error',"Falha ao remover os dados");
      console.log(data);
  });
  }




  function notification(tipo,mensagem){

      const Toast = Swal.mixin({
          toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });

      Toast.fire({
              icon: tipo,
            title: mensagem
      })

  }


  function limparCampos(){
    $('#nome').val("");
    $('#inicio').val("");
    $('#fim').val("");
    $('#codigo').val("");
   
  }





 

  /*
$('.confirm-cancelar').on('click',function(){
  $('#confirm-delete').modal('show');

});



$('#confirm-cancelar').on('show.bs.modal', function(e) {
   
      var id = $(e.relatedTarget).data('href');
      $(this).find('.btn-ok').attr('codigo',id);
     
});

$(document).on('click', '#confirm-cancelar .btn-ok', function(){
    id=  $(this).attr('codigo');
    CancelarElemente(id)
});

$('#confirm-delete').on('show.bs.modal', function(e) {
  
      var id = $(e.relatedTarget).data('href');
      $(this).find('.btn-ok').attr('codigo',id);
    
 });


$(document).on('click', '#confirm-delete .btn-ok', function(){
    id=  $(this).attr('codigo');
    alert("dadda"+id);

    //deleteElemente(id);
});



 function CancelarElemente(id){
       $.ajax({
            "url": "{{ url('venda_dinheiro/cancelar') }}",
             mehtod:"get",
             data:{id:id,_token: "{{csrf_token()}}"},
             success:function(data)
             {
               $('#confirm-cancelar').modal('hide');
                 console.log(data);
                 if(data!=0){
                   toastr.success(data);
                    
                    $('#venda_dinheiro').DataTable().ajax.reload();
                 }else{
                      toastr.error("Impossivel algo correu mal");
                 }
                 
             }
         })
        
 }
 $('#RegistoModal').on('hide.bs.modal', function(e) {
     $('#post').DataTable().ajax.reload();

  });

*/





</script>

@endsection