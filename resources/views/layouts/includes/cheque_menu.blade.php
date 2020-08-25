<div class="box">
   <div class="panel-body">
        <ul class="nav nav-tabs cus" role="tablist">
            
            <li  class="{{ isset($emitted) ? $emitted : '' }}">
              <a href='{{url("cheque/combustivel/report")}}'> Cheques Emitidos</a>
            </li>
            <li class="{{ isset($next) ? $next : '' }}">
              <a href='{{url("cheque/combustivel/porconsumir/report")}}'> Cheques Por Consumir</a>
            </li>
            <li class="{{ isset($used) ? $used : '' }}">
              <a href='{{url("cheque/combustivel/consumo/report")}}' > Cheques Consumidos</a>
            </li>

            <li class="{{ isset($paid) ? $paid : '' }}">
              <a href='{{url("cheque/combustivel/facturado/report")}}' > Cheques Facturados</a>
            </li>
       </ul>

      <div class="clearfix"></div>
   </div>
</div> 