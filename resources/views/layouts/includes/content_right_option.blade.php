<div class="col-md-4 left-padding-col4">
  @if($invoiceType == 'directOrder')
  <div class="box box-default">
    <div class="box-header text-center">
      <h5 class="text-left text-info"><b>{{ trans('message.accounting.quotation_no') }} # 
      <a href="{{URL::to('/')}}/order/view-order-details/{{$orderInfo->order_no}}">{{$orderInfo->reference}}</a></b>
      </h5>
    </div>
  </div>
  <!--Start-->
  <div class="box box-default">
    <div class="box-header text-center">
      <strong>{{ trans('message.accounting.invoice') }}</strong>
    </div>
    @if($invoiced_status == 'no')
    <div class="box-body">
      <div class="row">
        <div class="col-md-12 btn-block-left-padding">
          <a type="button" class="btn btn-success btn-flat btn-block " data-toggle="modal" data-target="#myModal"
            title="{{ trans('message.accounting.convert_to_invoice') }}">{{ trans('message.accounting.convert_to_invoice') }}</a>
        </div>
      </div>
    </div>
    @else
    <div class="box-body">
      <div class="row">
        <div class="col-md-12 text-center">
          {{ trans('message.accounting.quotation_invoiced_on') }} {{formatDate($invoiced_date)}}
        </div>
      </div>
    </div>
    @endif
  </div>
  @endif
  <!--END-->
  <div class="box box-default">
    <div class="box-header text-center">
      <strong>{{ trans('message.invoice.payment_list') }}</strong>
    </div>
    <div class="box-body">
      @if(!empty($paymentsList))
      <table class="table table-bordered">
        <thead>
          <tr>
            <!--<th class="text-center">{{ trans('message.invoice.payment_no') }}</th>-->
            <th>{{ trans('message.invoice.invoice_no') }}</th>
            <th>{{ trans('message.extra_text.method') }}</th>
            <th>{{ trans('message.invoice.paid') }}</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sumInvoice = 0;
            ?>
          @foreach($paymentsList as $payment)
          <tr>
            <!-- <td align="center"><a href="{{ url("payment/view-receipt/$payment->id") }}"><i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;{{sprintf("%04d", $payment->id)}}</a></td>-->
            <td align="center">{{$payment->invoice_reference}}</td>
            <td align="center">{{$payment->name}}</td>
            <td align="right">{{number_format($payment->amount,2,'.',',')}}</td>
          </tr>
          <?php
            $sumInvoice += $payment->amount;
            ?>
          @endforeach
          <td colspan="2" align="right"><strong>{{ trans('message.invoice.total') }}</stron>
          </td>
          <td align="right"><strong>{{Session::get('currency_symbol').number_format($sumInvoice,2,'.',',')}}</strong>
          </td>
        </tbody>
      </table>
      @else
      <h5 class="text-center">{{ trans('message.invoice.no_payment') }}</h5>
      @endif
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('message.sidebar.cotacao_conv_header') }}</h4>
      </div> 
      <div class="modal-body">
          <form method="POST" action="{{url('order/auto-invoice-create')}}" accept-charset="UTF-8" style="display:inline">
            <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
            <input type="hidden" value="{{$orderInfo->order_no}}" name="order_id" id="order_id">

            <div class="form-group">
          <div class="row">
            <div class="control-group" id="cambio" name="cambio"> 
              <div class="controls"> 
                <div class="col-md-3">
                  <label for="">
                  <input id="cambio_hoje" type="radio" class="cambio" name="cambio_hoje" value="{{$cambio_do_dia}}" checked />
                  {{ trans('message.sidebar.daily_exchange') }} </label><input style="width:65px" id="cambio_escolhido" name="cambio_escolhido" type="text" class="form-control" value="{{$cambio_do_dia}}" readonly>
                </div>
                <div class="col-md-5">
                  <label for="">
                  <input id="cambio_hoje" type="radio" class="cambio" name="cambio_hoje" value="{{$orderInfo->daily_exchange}}" />
                  {{ trans('message.sidebar.quotation_exchange') }} </label><input style="width:65px" id="cambio_escolhido" name="cambio_escolhido" class="form-control" type="text" value="{{$orderInfo->daily_exchange}}" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('message.sidebar.cancel') }}</button>  
        <button type="submit"  href="" class="btn btn-default">{{ trans('message.sidebar.convert_quotation') }}</button>
      </div>
    </form>
    </div>

  </div>
</div>