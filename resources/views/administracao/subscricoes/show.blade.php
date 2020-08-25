@extends('administracao.includes.app')
@section('estilo')
@endsection
@section('conteudo')
<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('admin/subscricoes')}}">Subscrições</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detalhes da subscricao</li>
					</ol>
				</nav>


        {{--cliente
          
          
          ; 
          $nestedData['data_inicio'] =date("d/m/Y", strtotime($post->data_inicio
          
          
          estado--}}
          

				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Dados da Subscrição #{{$subscricao->codigo}}</h4>
								<h4 class="card-title">Cliente {{$subscricao->cliente}} ||  {{$subscricao->numero}}</h4>
                <p class="card-description mb-0">Topico : {{$subscricao->topico}}</p>
							</div>
						</div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
							 	Estados: <button type='button' class='btn btn-outline-success btn-xs'>{{$subscricao->estado}}</button>
								<h4 class="card-title">Inicio {{ formatDate($subscricao->data_inicio)}}  Fim  {{ formatDate($subscricao->data_fim)}}</h4>
                <p class="card-description mb-0">PONTOS  : {{$subscricao->pontos}}</p>
							</div>
						</div>
          </div>
        </div>

        <div class="row">
        @foreach($detalhes as $detalhe)
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body d-flex flex-column align-items-center">
                   <p class="card-description">{{$detalhe->pergunta}}</p>
                   Resposta dada 
                    @if($detalhe->correcta=="yes")
                        <span class='badge badge-success'>Correcta</span>
                    @else
                      <span class='badge badge-danger'>Errada</span>
                    @endif
                     
              </div>
            </div>
          </div>
          @endforeach
            

        

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
              "url": "{{ url('admin/subscricoes/post') }}",
              "dataType": "json",
              "type": "POST",
              "data":{ _token: "{{csrf_token()}}"}
            },
            
     "columns": [
         { "data": "codigo" },
         { "data": "numero" },
         { "data": "cliente" },
         { "data": "topico" },
         { "data": "data_inicio" },
         { "data": "data_fim" },
         { "data": "pontos" },
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


$('#post').on('click', '.detalhes', function (e) {
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
               link=baseUrl1+'/admin/subscricoes/update';
            }else{
               link=baseUrl1+'/admin/subscricoes/save'; 
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
        url: baseUrl1+'/admin/subscricoes/destroy/'+id, 
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