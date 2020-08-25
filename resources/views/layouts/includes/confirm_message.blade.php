<div class='modal fade' id='confirmModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
          <h4 class='modal-title' id='myModalLabel'>{{trans('message.n3_travels.message_confirm')}}</h4>
        </div>

          <div class='modal-body'>
              <div  class='row'>
                  <div  class='col-md-4'>
                      <div class='form-group'>
                          <label class='control-label' for='title'>{{trans('message.table.reference')}}</label>
                          <div id='conteudoModal'>  
                          
                          </div>
                      </div>
                  </div>   

                   <div  class='col-md-4'>
                      <div class='form-group'>
                           <label class='control-label' for='title'>{{trans('message.quotation.amount_to_pay')}}</label>
                          <div id='conteudoModal2'>  
                          
                          </div>
                      </div>
                  </div> 

                   <div  class='col-md-4' id="suppData">
                      <div class='form-group'>
                           <label class='control-label' for='title'>{{trans('message.form.supplier')}}</label>
                          <div id='conteudoModal3'>  
                          
                          </div>
                      </div>
                  </div>               
              </div><!-- row -->

              <div  class='row' id='purchData' hidden>
                  <div  class='col-md-4'>
                      <div class='form-group'>
                          <label class='control-label' for='title'>{{trans('message.n3_travels.purchase_reference')}}</label>
                          <div id='conteudoModal4'>  
                          
                          </div>
                      </div>
                  </div>   

                   <div  class='col-md-4'>
                      <div class='form-group'>
                           <label class='control-label' for='title'>{{trans('message.n3_travels.purchase_amount')}}</label>
                          <div id='conteudoModal5'>  
                          
                          </div>
                      </div>
                  </div> 
                </div>
          </div><!-- modal body -->
        
    <div class='box-footer'>
        <div class='form-group'>
          <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Cancelar</button>
           <button type='submit' class='btn crud-submit btn-primary pull-right' id="btnConfirm">Comfirmo</button>
        </div>  
      </div>
    </div>
  </div>
</div>    