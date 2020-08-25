@extends('administracao.includes.app')
@section('estilo')
@endsection
@section('conteudo')
 <nav class="page-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Listagem </a></li>
              <li class="breadcrumb-item active" aria-current="page">Dados dos usuarios</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
               <div class="card">
                <div class="card-header">
                  <div class="row row-sm align-items-center">
                    <div class="col-2 col-xl">usuários</div>
                  
                    <div class="col-2">
                      <button type="button" class="btn btn-block btn-outline-success" id="novo_registo" >Novo</button>
                    </div>
                  </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                       <table id="post" class="table" style="width:100%" cellspacing="0">
                            <thead>
                                <tr>
                                  <th width="5%">Codigo</th>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th>Telefone</th>
                                  <th>Perfil</th>
                                  <th>Ultimo login</th>
                                  <th>Estado</th>
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
                    <label>Nome:</label>
											<input class="form-control mb-4 mb-md-0" type="text" name="nome" id="nome">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6">
											<label>Password</label>
											<input class="form-control mb-4 mb-md-0" type="password" name="password" id="password">
										</div>
										<div class="col-md-6">
											<label>Repita a password</label>
											<input class="form-control" type="password" name="password_second" id="password_second">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-4">
											<label>Telemovel</label>
											<input class="form-control mb-4 mb-md-0" type="text" name="telemovel" id="telemovel">
										</div>
										<div class="col-md-8">
											<label>Email:</label>
                        <input id="email" class="form-control" name="email" type="email">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-4">
                      <label>Estado</label>
                         <select class="form-control form-control mb-3" name="estado" id="estado">
                            <option value="0">activo</option>
                            <option value="1">desactivo</option>
                        </select>
											
										</div>
										<div class="col-md-8">
                    <label>Perfil</label>
                         <select class="form-control form-control mb-3" name="perfil" id="perfil" class="required">
                            <option selected="">Selecione</option>
                              @foreach($roleData as $role)
                              <option value="{{$role->id}}">{{$role->display_name}}</option>
                              @endforeach
                         </select>
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

  notification();

$('#post').DataTable({
  "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,

     "processing": true,
     "serverSide": true,
     "ajax":{
              "url": "{{ url('admin/usuarios/post') }}",
              "dataType": "json",
              "type": "POST",
              "data":{ _token: "{{csrf_token()}}"}
            },
            
     "columns": [
         { "data": "codigo" },
         { "data": "nome" },
         { "data": "email" },
         { "data": "telefone" },
         { "data": "perfil" },
         { "data": "ultimologin" },
         { "data": "estado" },
         { "data": "options" }
        
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


//novo registo
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
   $('#exampleModalLabel').html("Actualização do usuario");
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
          minlength: 3
        },
        password: {
          required: true,
          minlength: 4
        },
        password_second: {
          required: true,
          minlength: 4,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        },
        perfil: { required: true }
      },
      messages: {
        nome: {
          required: "Por favor coloque o nome",
          minlength: "Nome no minimo com  3 characters"
        },
        password: {
          required: "Por favor coloque a password",
          minlength: "Your no minimo com  4 characters"
        },
        password_second: {
          required: "Por favor coloque a password",
          minlength: "Your no minimo com  4 characters",
          equalTo: "As senhas nao correspondes"
        },
        email: "Por favor coloque o email valido",
        perfil: "Por favor coloque o perfil valido",
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


//Showing 2,861 to 2,867 of 2,867 entries

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


 
  
 function cadastro(){

            if($('#codigo').val()!=""){
               link=baseUrl1+'/admin/usuarios/update';
            }else{
               link=baseUrl1+'/admin/usuarios/save'; 
            }  
              //alert($('#codigo').val()); 

              var email=$('#email').val();
              var id=$('#codigo').val();
              var nome=$('#nome').val();
              var password=$('#password').val();
              var perfil=$('#perfil').val();
              var telemovel=$('#telemovel').val();
              var estado=$('#estado').val();
                $.ajax({
                  dataType: 'text',
                  type:'POST',
                  url:link,
                  data:{email:email,nome:nome,password:password,perfil:perfil,telemovel:telemovel,estado:estado,id:id}
              }).done(function(data){
                  console.log(data);
                  $('#post').DataTable().ajax.reload();
                  $('#codigo').val("");
                  $('#RegistoModal').modal('hide'); 
                  notification('success',"dados salvos com sucesso");
                }).fail( function( data ) {
                notification('error',"Falha ao gravar os dados");
                console.log(data);
            });
            

  }

  function edicao(id){
           $.ajax({
             dataType: 'text',
             type:'POST',
             url: baseUrl1+'/admin/usuarios/'+id, 
            }).done(function(data){
            var data = jQuery.parseJSON(data);
              //notification('error',data.user.real_name);
              limparCampos();
              $('#email').val(data.user.email);
              $('#nome').val(data.user.real_name);
              $('#perfil').val(data.user.role_id);
              $('#telemovel').val(data.user.phone);
              $('#codigo').val(data.user.id);
              $('#estado').val(data.user.inactive);
              console.log(data);
              $('#RegistoModal').modal('show'); 
             notification('success',"Dados do usuario "+data.user.id);
            }).fail( function( data ) {
            notification('error',"Falha ao gravar os dados");
            console.log(data);
        });


}


function   eliminar(id){
           $.ajax({
             dataType: 'text',
             type:'POST',
             url: baseUrl1+'/admin/usuarios/destroy/'+id, 
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
  
  $('#RegistoModal').on('hide.bs.modal', function(e) {
     $('#post').DataTable().ajax.reload();

  });

  function limparCampos(){
    $('#codigo').val("");
    $('#nome').val("");
    $('#password').val("");
    $('#telemovel').val("");
  }





</script>

@endsection