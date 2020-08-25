<div id="notifications" class="row no-print">
    <div class="col-md-12">
        @if($errors->any())
        <div class="noti-alert pad no-print">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        @if(session('success'))
        <div class="noti-alert pad no-print">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <ul>
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
        </div>
        @endif

        @if(session('fail'))
        <div class="noti-alert pad no-print">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h5><i class="icon fa fa-check"></i>{{ trans('message.error.fail')}}</h5>
                <ul>
                    <li>{{ session('fail') }}</li>
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmação de remoção </h4>
            </div>
        
            <div class="modal-body">
                <p>Esta preste a remover o item selecionado, procedimento  sem Volta </p>
                <p>Deseja prosseguir?</p>
                <p class="debug-url"></p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Remover</a>
            </div>
        </div>
    </div>
</div>


