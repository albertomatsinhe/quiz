<div class="box">
   <div class="panel-body">
        <ul class="nav nav-tabs cus" role="tablist">
            
            <li  class="{{ isset($emitted) ? $emitted : '' }}">
              <a href='{{url("sale/combustivel/report")}}'>{{ trans('message.extra_text.emitted_ticket') }}</a>
            </li>
            <li class="{{ isset($next) ? $next : '' }}">
              <a href='{{url("sale/combustivel/porconsumir/report")}}' >{{ trans('message.extra_text.next_ticket') }}</a>
            </li>
            <li class="{{ isset($used) ? $used : '' }}">
              <a href='{{url("sale/combustivel/consumo/report")}}' >{{ trans('message.extra_text.used_ticket') }}</a>
            </li>

          

       </ul>
      <div class="clearfix"></div>
   </div>
</div> 