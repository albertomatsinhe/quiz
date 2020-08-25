<?php $__env->startSection('estilo'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('conteudo'); ?>
 <nav class="page-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Listagem </a></li>
              <li class="breadcrumb-item active" aria-current="page">Dados dos Perguntas </li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
               <div class="card">
                <div class="card-header">
                  <div class="row row-sm align-items-center">
                    <div class="col-2 col-xl">Topicos das Perguntas</div>
                  
                    <div class="col-2">
                      <a href="<?php echo e(url('admin/perguntas/create')); ?>" class="btn btn-block btn-outline-success">Nova</a>
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
                                  <th>Pontuacao</th>
                                  <th>Estado</th>
                                  <th>Registado por</th>
                                  <th width="8%"><?php echo e(trans('message.table.action')); ?></th>
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
                     <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" id="token">
                     <input type="hidden" value="no"  id="update">
                     <input type="hidden" value=""  id="codigo">
									<div class="form-group row">
										<div class="col-md-12">
                    <h4 id="title"></h4>
                    	<textarea id="nome" readonly="" name="nome" class="form-control" maxlength="100" rows="3" placeholder="coloque a questao"></textarea>
										</div>
									</div>

                  <div class="table-responsive pt-3">
									<table class="table table-bordered" id="respostas">
										<thead>
											<tr>
												<th width="1%">
													#
												</th>
												<th>
													Resposta
												</th>
												<th width="5%">
													Correcta
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
                       </tr>
									
										</tbody>
									</table>
								</div>
  
							 </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

 

 <?php echo $__env->make('administracao.includes.message_boxes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
 var baseUrl1= $('#Url_geral').val(); 

 $(document).ready(function () {

  if("<?php echo e($idpergunta); ?>"!=""){

    edicao("<?php echo e($idpergunta); ?>");

  }

  


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
              "url": "<?php echo e(url('admin/perguntas/post')); ?>",
              "dataType": "json",
              "type": "POST",
              "data":{ _token: "<?php echo e(csrf_token()); ?>"}
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
   $('#exampleModalLabel').html("Detalhes da pergunta");
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
               link=baseUrl1+'/admin/topicos/update';
            }else{
               link=baseUrl1+'/admin/topicos/save'; 
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
           cont=1;
           $.ajax({
             dataType: 'text',
             type:'POST',
             url: baseUrl1+'/admin/perguntas/'+id, 
            }).done(function(data){
              var data = jQuery.parseJSON(data);
              $('#nome').val(data.perguntas.descricao);
              $('#title').html("Topico: "+data.perguntas.topico);
               console.log(data);
              //$(".custom-item")
              $(".linha").empty();
               data.respostas.forEach(function(element) {
                           var nome = element.descricao;
                           var correta = element.opcao_correcta;
                           var nome = element.descricao;
                           
                  if(correta==0){
                     res="<span class='badge badge-primary'>Nao</span>";
                  }else{
                     res="<span class='badge badge-success'>Sim</span>";
                  }
                  var new_row = "<tr  class='linha'>"+
                  "<td>"+cont+"</td>"+
                  "<td>"+nome+"</td>"+
                  "<td><input class='corectaoption' type='text' value='"+correta+"' hidden >"+res+"</td>"+
                  "</tr>";
                  $("table tbody .custom-item").before(new_row);
                  cont++;
              });
              
              
      
      // adicionando a linha

              console.log(data);
              $('#RegistoModal').modal('show'); 
              // notification('success',"Detalhes da pergunta "+data.perguntas.id);
            }).fail( function( data ) {
            notification('error',"Falha na busca");
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


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('administracao.includes.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>