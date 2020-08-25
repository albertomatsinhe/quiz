@extends('administracao.includes.app')
@section('estilo')
@endsection
@section('conteudo')
  <nav class="page-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('admin/perguntas')}}">Pergunta </a></li>
              <li class="breadcrumb-item active" aria-current="page">Nova </li>
            </ol>
          </nav>

          <form  method="get" action="#" novalidate="novalidate" id="registoGeral">
          <div class="row">
           <div class="col-lg-5 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Nova Pergunta</h4>
               
                  <fieldset>
                  <div class="form-group row">
										<div class="col-md-12">
                      <label>Topicos</label>
                         <select class="form-control form-control mb-3 select2" name="topicos" id="topicos">
                         <option value="">Selecione</option>
                             @foreach($topicos as $topico)
                                    <option value="{{$topico->id}}">{{$topico->descricao}}</option>
                              @endforeach
                        </select>
											</div>
									</div>
                    <div class="form-group">
                      <label for="name">Descrição</label>
                      <textarea id="descricao" name="descricao" class="form-control" maxlength="100" rows="5" placeholder="coloque a questao"></textarea>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Pontos</label>
                        <input class="form-control mb-4 mb-md-0" type="text" name="pontos" id="pontos">
                      </div>
                      <div class="col-md-6">
                        <label>Estado</label>
                        <select class="form-control form-control mb-3 select2" name="estado" id="estado">
                         <option value="activo">activo</option>
                         <option value="desactivo">desactivo</option>
                        </select>
                      </div>
                    </div>
                    
                  </fieldset>
               
              </div>
            </div>
          </div>
       </form>

					<div class="col-lg-7 grid-margin stretch-card">
						<div class="card">
              <div class="card-header">
                  <div class="row row-sm align-items-center">
                    <div class="col-2 col-xl">Respostas da Questão</div>
                    <div class="col-2">
                      <button type="button" class="btn btn-block btn-outline-success" id="novo_resposta" >Nova</button>
                    </div>
                  </div>

                </div>

							<div class="card-body">
								
                <div class="table-responsive pt-3">
									<table class="table table-bordered" id="respostas">
										<thead>
											<tr>
												<th width="5%">
													#
												</th>
												<th>
													Resposta
												</th>
												<th width="7%">
													Certa
												</th>
                        <th width="2%">
													
												</th>
											</tr>
										</thead>
										<tbody>
                        <tr class="custom-item"></tr>
											<tr>
												<td>
													
												</td>
												<td>
                         
                        </td>
                        <td>
													
												</td>
                        <td>
                        
												</td>
											</tr>
									
										</tbody>
									</table>
								</div>
                
          		</div>

              <div class="card-header">
                  <div class="row row-sm align-items-center">
                    <div class="col-2 col-xl"></div>
                    <div class="col-4">
                     <button type="submit" class="btn btn-primary mr-2 pull-right">Registo</button>
                     </div>
                  </div>

                </div>
              
						</div>
					</div>
          </form>
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
											<input class="form-control mb-4 mb-md-0" type="text" name="descricao_resp" id="descricao_resp">
										</div>
									</div>
								 <div class="form-group row">
										<div class="col-md-12">
                      <label>Correcta</label>
                         <select class="form-control form-control mb-3" name="correta" id="correta">
                           <option value="0">Nao</option>
                           <option value="1">Sim</option> 
                        </select>
											
										</div>
									</div>
							 </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary"  id="adicionar">Registar</button>
                 </div>
              </div>
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

  cont=1;

$('#post').DataTable({
  "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,

     "processing": true,
     "serverSide": true,
     "ajax":{
              "url": "{{ url('admin/perguntas/post') }}",
              "dataType": "json",
              "type": "POST",
              "data":{ _token: "{{csrf_token()}}"}
            },
            
     "columns": [
         { "data": "codigo" },
         { "data": "nome" },
         { "data": "pontos" },
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



$('#novo_resposta').on('click',function () {
  
   $('#RegistoModal').modal('show'); 

});

$('#adicionar').on('click',function () {
  $('#RegistoModal').modal('hide'); 
});


$('#registoGeral').validate({ 
  rules: {
       topicos: {
          required: true,
          minlength: 1
        },
        descricao: {
          required: true,
          minlength: 4
        },
        estado: {
          required: true,
         }
      },
      messages: {
        topicos: {
          required: "Por favor selecione o Topico",
          minlength: "O Topico  no minimo com  2 characters"
        },
        descricao: {
          required: "Por favor coloque a descrição",
          minlength: "Your no minimo com  4 characters"
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
          if(cont>1){
           cadastro();
          }else{
            notification('error',"Por favor registe as opcoes para a pergunta no minimo "+cont);
          }
            
        }
    });


/*$('#registoGeral').on('click',function () {
  $('#RegistoModal').modal('hide'); 
});*/

  
 function cadastro(){

             link=baseUrl1+'/admin/perguntas/save'; 
             options= dadosTabela();
             console.log(options);

              link=baseUrl1+'/admin/perguntas/save'; 
             
              var id=$('#codigo').val();
              var descricao=$('#descricao').val();
              var topicos=$('#topicos').val();
              var pontos=$('#pontos').val();
              var estado=$('#estado').val();

                $.ajax({
                  dataType: 'text',
                  type:'POST',
                  url:link,
                  data:{descricao:descricao,topicos:topicos,pontos:pontos,estado:estado,id:id,opcoes:options}
              }).done(function(data){
                  console.log(data);
                  window.location.replace(baseUrl1+'/admin/perguntas/lista/'+data);

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
             url: baseUrl1+'/admin/perguntas/'+id, 
            }).done(function(data){
              var data = jQuery.parseJSON(data);
              $('#nome').val(data.dados.descricao);
              $('#inicio').val(data.dados.data_inicio);
              $('#fim').val(data.dados.data_fim);
              $('#codigo').val(data.dados.id);
              $('#estado').val(data.dados.estado);
              console.log(data);
              $('#RegistoModal').modal('show'); 
             notification('success',"Dados do usuario "+data.dados.id);
            }).fail( function( data ) {
            notification('error',"Falha ao gravar os dados");
            console.log(data);
        });

}


  function  eliminar(id){
      $.ajax({
        dataType: 'text',
        type:'POST',
        url: baseUrl1+'/admin/perguntas/destroy/'+id, 
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

  
  $('#adicionar').on('click', function() {
    
      nome= $('#descricao_resp').val();
      correta= $('#correta').val();

     if(correta==0){
        res="<span class='badge badge-primary'>Nao</span>";
     }else{
      res="<span class='badge badge-success'>Sim</span>";
     }
        var new_row = "<tr  class='linha'>"+
                  "<td>"+cont+"</td>"+
                  "<td><input class='form-control resposta' type='text' value='"+nome+"' ></td>"+
                  "<td><input class='corectaoption' type='text' value='"+correta+"' hidden >"+res+"</td>"+
                  "<td class='text-center'><button type='button' class='btn btn-outline-danger btn-xs deletement'>X</button></td>"+
                  "</tr>";
      
      // adicionando a linha
      $("table tbody .custom-item").before(new_row);
      
      $('#descricao_resp').val("");
      $('#correta').val("0");

     cont++;

});

  $('#respostas').on('click', '.deletement', function() {
      $(this).closest("tr").remove();
      cont--;
  });






  function dadosTabela(){
   
     var opcoes=[];
     

     $('#respostas .linha').each(function(i, val){
                var currentRow=$(this).closest('tr');  
                  resposta= currentRow.find('.resposta').val()
                  correcta= currentRow.find('.corectaoption').val()
                  
                  var obj={};  
                  obj.resposta=resposta;
                  obj.correcta=correcta;
                  opcoes.push(obj);

              //alert(resposta);
              
     });

    return opcoes;
  
  }
 

</script>

@endsection