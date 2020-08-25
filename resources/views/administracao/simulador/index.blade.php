@extends('administracao.includes.app')
@section('estilo')
@endsection
@section('conteudo')
<div class="card">
    <div class="card-body">
      <div class="row position-relative">

      <div class="col-lg-3 chat-content" style="background-color:blue">
        <p>Meu Numero</p>
          <input type="number" class="form-control rounded-pill" value="845052121" id="num" placeholder="+258">
      </div>

            <div class="col-lg-6 chat-content">
                    <div class="chat-header border-bottom pb-2">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <i data-feather="corner-up-left" id="backToChatList" class="icon-lg mr-2 ml-n2 text-muted d-lg-none"></i>
                          <figure class="mb-0 mr-2">
                            <img src="https://via.placeholder.com/43x43" class="img-sm rounded-circle" alt="image">
                            <div class="status online"></div>
                            <div class="status online"></div>
                          </figure>
                          <div>
                            <p>Quiz Serves</p>
                            <p class="text-muted tx-13">84123</p>
                           </div>
                        </div>
                        <div class="d-flex align-items-center mr-n1">
                          <a href="#">
                            <i data-feather="video" class="icon-lg text-muted mr-3" data-toggle="tooltip" title="Start video call"></i>
                          </a>
                          <a href="#">
                            <i data-feather="phone-call" class="icon-lg text-muted mr-0 mr-sm-3" data-toggle="tooltip" title="Start voice call"></i>
                          </a>
                          <a href="#" class="d-none d-sm-block">
                            <i data-feather="user-plus" class="icon-lg text-muted" data-toggle="tooltip" title="Add to contacts"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="chat-body" >
                      <ul class="messages" id="iddddd" style=" height:200px; overflow:auto;">

                       <div class="posionamento">
                           
                       </div> 
                       
                      </ul>
                    </div>
                    <div class="chat-footer d-flex">
                      <div>
                        <button type="button" class="btn border btn-icon rounded-circle mr-2" data-toggle="tooltip" title="Emoji">
                          <i data-feather="smile" class="text-muted"></i>
                        </button>
                      </div>
                      <div class="d-none d-md-block">
                        <button type="button" class="btn border btn-icon rounded-circle mr-2" data-toggle="tooltip" title="Attatch files">
                          <i data-feather="paperclip" class="text-muted"></i>
                        </button>
                      </div>
                      <div class="d-none d-md-block">
                        <button type="button" class="btn border btn-icon rounded-circle mr-2" data-toggle="tooltip" title="Record you voice">
                          <i data-feather="mic" class="text-muted"></i>
                        </button>
                      </div>
                      <form class="search-form flex-grow mr-2">
                        <div class="input-group">
                          <input type="text" class="form-control rounded-pill" id="chatForm" placeholder="Digite a mensagen">
                        </div>
                      </form>
                      <div>
                        <button type="button" class="btn btn-primary btn-icon rounded-circle" id="send">
                          <i data-feather="send"></i>
                        </button>
                      </div>
                    </div>
                  </div>
				  
				     <div class="col-lg-3 chat-content" style="background-color:blue">
             <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">#Codigo</th>
                        <th class="pt-0">$Preco</th>
                       </tr>
                    </thead>
                    <tbody>

                    @foreach($topicos as $topico)
                        <tr>
                        <td>{{$topico->codigo}}</td>
                        <td>{{$topico->preco}}</td>
                        </tr>
                      @endforeach
              <tbody>
             </table>
             </div>
           </div>
        </div>
      </div>
  </div>	

  		 
@include('administracao.includes.message_boxes')    
@endsection

@section('script')


<script type="text/javascript">
 var baseUrl1= $('#Url_geral').val(); 
 var cont=1;
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
         { "data": "id" },
         { "data": "codigo" },
         { "data": "numero" },
         { "data": "cliente" },
         { "data": "topico" },
         { "data": "data_inicio" },
         { "data": "data_fim" },
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

  var scrolled=0;

  function limparCampos(){
    $('#nome').val("");
    $('#inicio').val("");
    $('#fim').val("");
    $('#codigo').val("");
   
  }

$('#send').on('click',function () {
  
      numero=$("#num").val();

      if(numero!="" && $("#chatForm").val()!=""){

        var sms = "<hr><li class='message-item friend'>"+
                              "<div class='content'>"+
                              "<div class='message'>"+
                              "<div class='bubble'>"+
                              "<p>"+$("#chatForm").val()+"</p>"+
                              " </div>"+
                              "<span></span>"+
                              " </div>"+
                              "  </div>"+
                              "</li>";

          $(".posionamento").before(sms);
        subscrever(numero,$("#chatForm").val());
        $("#chatForm").val("");

      }else{
         notification('error',"Coloque o Nr no campo ou a mensagem!");
      }

       
});

function subscrever(numero,mensagem){
      //notification('success',"Subscrevendo o servico "+mensagem+" para o contacto"+numero);
         var new_row="";
         var option="";
         link=baseUrl1+'/admin/subscricoes/save';
            
            $.ajax({
              dataType: 'text',
              type:'POST',
              url:link,
              data:{numero:numero,mensagem:mensagem}
          }).done(function(data){
              var data = jQuery.parseJSON(data);
            
              if(data.ISClienteOrTopico=="no"){

                new_row =new_row+ "<li class='message-item friend'>"+
                              "<img src='https://via.placeholder.com/43x43' class='img-xs rounded-circle' alt='avatar'>"+
                              "<div class='content'>"+
                              "<div class='message'>"+
                              "<div class='bubble'>"+
                              "<p>Erro na Subscricao, CODIGO ENEXISTENTE!</p>"+
                              " </div>"+
                              "<span>"+data.data_hora+"</span>"+
                              " </div>"+
                              "  </div>"+
                              "</li>";
                      
              }else{

                    if(data.IsTerminado!="yes"){

                     if(data.subscricao_nova=="yes"){
                     
                     new_row =new_row+"<li class='message-item friend'>"+
                              "<img src='https://via.placeholder.com/43x43' class='img-xs rounded-circle' alt='avatar'>"+
                              "<div class='content'>"+
                              "<div class='message'>"+
                              "<div class='bubble'>"+
                              "<p>Subscricao de codigo  "+data.subscricao.codigo+"</p>"+
                              " </div>"+
                              "<span> feita na data "+data.subscricao.created_at+"</span>"+
                              " </div>"+
                              "  </div>"+
                              "</li>";
                     }
                
                     
                     if(data.tipo_resposta=="Invalida"){

                          new_row =new_row+"<h3>Opccao Enviada Invalida</h3>";

                     }


                    cont=1;

                    data.respostas.forEach(function(element) {
                           var nome = element.descricao;
                           option=option+ "<li class='event'>"+
                                       "<p> "+ cont +" - "+element.descricao+"</p>"+
                                    "</li>";
                        cont++;
                    });
                   new_row =new_row+"<h4>"+data.pergunta.descricao+"</h4>"+option+"";

               }else{

                   new_row =new_row+"<h4>Parabens terminou com sucesso o desafio!</h4>";
               }  




              }
              
              $(".posionamento").before(new_row);
              var div = $("#iddddd");
               div.scrollTop(div.prop('scrollHeight'));
              //notification('success',"dados salvos com sucesso");
              //limparCampos();
            }).fail( function( data ) {
            notification('error',"Falha ao gravar os dados");
            console.log(data);
        });


}  




</script>

@endsection