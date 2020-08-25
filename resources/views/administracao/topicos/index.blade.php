@extends('administracao.includes.app')
@section('estilo')
@endsection
@section('conteudo')
 <nav class="page-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Listagem </a></li>
              <li class="breadcrumb-item active" aria-current="page">Dados dos Topicos </li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
               <div class="card">
                <div class="card-header">
                  <div class="row row-sm align-items-center">
                    <div class="col-2 col-xl">Topicos das subscrições</div>
                  
                    <div class="col-1">
                      <button type="button" class="btn btn-block btn-outline-success" id="novo_registo">Novo</button>
                    </div>
                  </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                       <table id="post" class="table" style="width:100%" cellspacing="0">
                            <thead>
                                <tr>
                                  <th width="5%">Codigo</th>
                                  <th>Descricao</th>
                                  <th>Data inicio</th>
                                  <th>Data fim</th>
                                  <th>‎Preço(MT)</th>
                                  <th>Estado</th>
                                  <th>Registado por</th>
                                  <th width="8%">{{ trans('message.table.action') }}</th>
                                </tr>
                            </thead>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
        <div class="modal fade" id="RegistoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Adicionar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form class="cmxform" id="registo_user"action="#" method="post">
                     <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                     <input type="hidden" value="no"  id="update">
                     <input type="hidden" value=""  id="codigo">
									<div class="form-group row">
										<div class="col-md-12">
                    <label>Descrição:</label>
											<input class="form-control mb-4 mb-md-0" type="text" name="nome" id="nome">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-4">
											<label>Data incicio</label>
											<input class="form-control mb-4 mb-md-0" type="text" name="inicio" id="inicio">
										</div>
										<div class="col-md-4">
											<label>Data fim</label>
											<input class="form-control" type="text" name="fim" id="fim">
										</div>
                    <div class="col-md-4">
											<label>‎Preço (MT)</label>
											<input class="form-control" type="text" name="preco" id="preco">
										</div>
									</div> 
									
									<div class="form-group row">
										<div class="col-md-8">
                      <label>Estado</label>
                         <select class="form-control form-control mb-3" name="estado" id="estado">
                            <option value="activo">activo</option>
                            <option value="desactivo">desactivo</option>
                        </select>
										</div>
                    <div class="col-md-4">
											<label>‎Codigo</label>
											<input class="form-control" type="text" name="codigoInterno" id="codigoInterno" >
										</div>
									</div>
							 </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input class="btn btn-primary" type="submit" id="enviar" value="Enviar">
                </div>
              </div>
              </form>
            </div>
          </div>
      </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
             <input type="hidden" value=""  id="codigoToDelete">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remoção dos dados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h6>Deseja realmente remover o registo? processo sem volta!</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" id="remocao">Comfirmar</button>
        </div>
      </div>
    </div>
    </div>

 

 @include('administracao.includes.message_boxes')    
@endsection

@section('script')
<script type="text/javascript">
 var baseUrl1= $('#Url_geral').val(); 

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
              "url": "{{ url('admin/topicos/post') }}",
              "dataType": "json",
              "type": "POST",
              "data":{ _token: "{{csrf_token()}}"}
            },
            
     "columns": [
         { "data": "codigo" },
         { "data": "nome" },
         { "data": "data_inicio" },
         { "data": "data_fim" },
         { "data": "preco" },
         { "data": "estado" },
         { "data": "user" },
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
   $('#exampleModalLabel').html("Actualização do Topicos");
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
         ,
         codigoInterno: {
          required: true,
          minlength: 2,
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
         codigoInterno: {
          required: "Por favor coloque o Codigo",
          minlength: "Your no minimo com  2 characters",
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
               link=baseUrl1+'/admin/topicos/update';
            }else{
               link=baseUrl1+'/admin/topicos/save'; 
            }  
             
              var id=$('#codigo').val();
              var descricao=$('#nome').val();
              var inicio=$('#inicio').val();
              var fim=$('#fim').val();
              var estado=$('#estado').val();
              var preco=$('#preco').val();
              var codigo=$('#codigoInterno').val();

              

                $.ajax({
                  dataType: 'text',
                  type:'POST',
                  url:link,
                  data:{descricao:descricao,inicio:inicio,fim:fim,estado:estado,id:id,preco:preco,codigo:codigo}
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
             url: baseUrl1+'/admin/topicos/'+id, 
            }).done(function(data){
              var data = jQuery.parseJSON(data);
              $('#nome').val(data.dados.descricao);
              $('#inicio').val(data.dados.data_inicio);
              $('#fim').val(data.dados.data_fim);
              $('#codigo').val(data.dados.id);
              $('#estado').val(data.dados.estado);
              $('#preco').val(data.dados.preco);
              $('#codigoInterno').val(data.dados.codigo);
              console.log(data);
              $('#RegistoModal').modal('show'); 
             notification('success',"Dados do Topico "+data.dados.codigo);
            }).fail( function( data ) {
            notification('error',"Falha ao gravar os dados");
            console.log(data);
        });

}


  function  eliminar(id){
      $.ajax({
        dataType: 'text',
        type:'POST',
        url: baseUrl1+'/admin/topicos/destroy/'+id, 
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