@extends('administracao.includes.app')
@section('estilo')
@endsection
@section('conteudo')


<div class="row chat-wrapper">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row position-relative">
          <div class="col-lg-4 chat-aside border-lg-right">
            <div class="aside-content" >
              <div class="aside-header">
                <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                  <div class="d-flex align-items-center">
                    <figure class="mr-2 mb-0">
                      <img src="https://via.placeholder.com/43x43" class="img-sm rounded-circle" alt="profile">
                      <div class="status online"></div>
                    </figure>
                    <div>
                      <p class="text-muted tx-13">Meu Numero</p>
                      <input type="number" class="form-control rounded-pill" value="" id="num" placeholder="+258">
                    </div>
                  </div>
                </div>
              </div>
              <div class="aside-body">
                

              </div>
            </div>
          </div> <!-- primeira parte-->


          <div class="col-lg-4 chat-content">
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
            <div class="chat-body">
              <ul class="messages posionamento" id="local_put" style=" height:400px; overflow:auto;">
                
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
                  <input type="text" class="form-control rounded-pill" id="chatForm" placeholder="Type a message">
                </div>
              </form>
              <div>
                <button type="button" class="btn btn-primary btn-icon rounded-circle" id="send">
                  <i data-feather="send"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-4 chat-content">
              <p>Pacotes por subscrever</p>
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

        </div> <!--hh-->
      </div>
    </div>
  </div>
</div>
 
@include('administracao.includes.message_boxes')    
@endsection

@section('script')

<script type="text/javascript">
 var baseUrl1= $('#Url_geral').val(); 

$('#send').on('click',function () {
  
  numero=$("#num").val();

  if(numero!="" && $("#chatForm").val()!=""){

    var sms = "<li class='message-item me'>"+
                          "<div class='content'>"+
                          "<div class='message'>"+
                          "<div class='bubble'>"+
                          "<p>"+$("#chatForm").val()+"</p>"+
                          " </div>"+
                          "<span></span>"+
                          " </div>"+
                          "  </div>"+
                          "</li>";

     // $(".posionamento").before(sms);

      $(".posionamento").append(sms);




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
     var nova_linha="";

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
                          "<p>Erro na Subscrição, CODIGO ENEXISTENTE!</p>"+
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
                                    "<p>Subscricao de codigo  "+data.subscricao.codigo+" Debitado o  valor de "+data.subscricao.preco +" Mt </p>"+
                                    " </div>"+
                                    "<span> feita na data "+data.data_hora+"</span>"+
                                    " </div>"+
                                    "  </div>"+
                                    "</li>";
                          }
            
                 
                            if(data.tipo_resposta=="Invalida"){

                                  invalida="<li class='message-item friend'>"+
                                      "<img src='https://via.placeholder.com/43x43' class='img-xs rounded-circle' alt='avatar'>"+
                                      "<div class='content'>"+
                                      "<div class='message'>"+
                                      "<div class='bubble'>"+
                                      "<p>Opção enviada Invalida</p></div>"+
                                      " </div>"+
                                      "  </div>"+
                                      "</li>";

                                      $(".posionamento").append(invalida);

                            }


                          cont=1;

                          data.respostas.forEach(function(element) {
                                var nome = element.descricao;
                                option=option+"<p> "+ cont +" - "+element.descricao+"</p>";

                                cont++;
                          });
              
                 new_row =new_row+"<li class='message-item friend'>"+
                          "<img src='https://via.placeholder.com/43x43' class='img-xs rounded-circle' alt='avatar'>"+
                          "<div class='content'>"+
                          "<div class='message'>"+
                          "<div class='bubble'>"+
                          "<p>"+data.pergunta.descricao+"</p>"+
                          option+"</div>"+
                          "<span> feito na data "+data.data_hora+"</span>"+
                          " </div>"+
                          "  </div>"+
                          "</li>";


           }else{
                cont1=1;
                option1="";

                data.detalhes.forEach(function(detalhe) {
                      var pergunta = detalhe.pergunta;
                     var  correcta = detalhe.correcta;

                   
                      if(correcta=="yes"){

                        res="correcta";
                      }else{

                        res="errada";
                      }
                      option1=option1+"<p> "+ cont1 +" - "+pergunta+"   :Resposta dada "+res+" </p>";

                      cont1++;
                });



                new_row =new_row+"<li class='message-item friend'>"+
                    "<img src='https://via.placeholder.com/43x43' class='img-xs rounded-circle' alt='avatar'>"+
                    "<div class='content'>"+
                    "<div class='message'>"+
                    "<div class='bubble'>"+
                    "<p>Parabéns terminou com sucesso a Subscricao "+data.subscricao.codigo+ " da data "+data.subscricao.data_inicio+"</p></div>"+
                    " </div>"+
                    "  </div>"+
                    "</li>";

                    nova_linha="<li class='message-item friend'>"+
                    "<img src='https://via.placeholder.com/43x43' class='img-xs rounded-circle' alt='avatar'>"+
                    "<div class='content'>"+
                    "<div class='message'>"+
                    "<div class='bubble'>"+
                    "<p>Detalhes abaixo</p>"+
                    option1+"</div>"+
                    "<span> feito na data "+data.data_hora+"</span>"+
                    " </div>"+
                    "  </div>"+
                    "</li>";

           }  




          }
          
          $(".posionamento").append(new_row);

          if(data.IsTerminado=="yes"){
             $(".posionamento").append(nova_linha);
          }
           var div = $("#local_put");
           div.scrollTop(div.prop('scrollHeight'));
        
           //notification('success',"dados salvos com sucesso");
          //limparCampos();
        }).fail( function( data ) {
        notification('error',"Falha ao gravar os dados");
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

</script>



@endsection