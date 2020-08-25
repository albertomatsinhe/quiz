<div class="col-md-3 left-padding-col4">
    @if($cabecalho->conversao != 'yes')
    <div class="box box-default">
        <div class="box-header text-center">
            <h5 class="text-left text-info"><b>{{ trans('message.sidebar.p_o') }} # <a href="{{URL::to('/')}}/purchase_order/viewdetails/{{$cabecalho->id_compra}}">{{$cabecalho->reference}}</a></b>
            </h5>
        </div>
    </div>
    <!--Start-->
    <div class="box box-default">
        <div class="box-header text-center">
            <strong>{{ trans('message.accounting.invoice') }}</strong>
        </div>
        
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 btn-block-left-padding"> 
                  <a href="{{URL::to('/')}}/purchase_order/autocreate_po/{{$cabecalho->id_compra}}" title="{{ trans('message.accounting.convert_to_invoice') }}" class="btn btn-success btn-flat btn-block ">{{ trans('message.accounting.convert_to_invoice') }}</a>
                </div>
            </div>
        </div> 
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
                    <td align="right">
                        <strong>{{Session::get('currency_symbol').number_format($sumInvoice,2,'.',',')}}</strong>
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
<div id="myModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('message.sidebar.po_conv_header') }}</h4>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{url('order/auto-invoice-create')}}" accept-charset="UTF-8" style="display:inline">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                    <input type="hidden" value="{{$cabecalho->id_compra}}" name="po_id" id="po_id"> 
                    <div class="form-group">
                        <div class="row">  
                                 
            <input hidden id="cambio_hoje" type="radio" class="cambio" name="cambio_hoje" value="{{$cambio_do_dia}}" checked />
  
                                            
                            <div class="box-body no-padding">
                                    <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">{{ trans('message.form.add_item') }}</label>
                                                <input class="form-control auto" placeholder="{{ trans('message.invoice.search_item') }}" id="search">
                              
                                                <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="no_div" tabindex="0" style="display: none; top: 60px; left: 15px; width: 520px;">
                                                  <li>No record found!</li>
                                                </ul>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                            </div> 
                                          </div>
                                    <div class="table-responsive">
                                   
                                    <table class="table table-bordered" id="purchaseInvoice">
                                      <tbody>
                                         <tr class="tbl_header_color dynamicRows">
                                        <th width="20%" class="text-center">{{ trans('message.table.description') }}</th>
                                        <th width="10%" class="text-center">{{ trans('message.table.quantity') }}</th>
                                        <th width="12%" class="text-center">{{ trans('message.table.rate') }}(<label style="font-size:15px" class="referencia" name="referencia"></label>)</th>
                                        <th width="10%" class="text-center">{{ trans('message.table.tax') }}(%)</th>
                                        <th width="10%" class="text-center">{{ trans('message.table.tax') }}({{Session::get('currency_symbol')}})</th>
                                        <th width="5%" class="text-center">({{ trans('message.table.tax_incluso')}})</th>
                                        <th width="7.5%" class="text-center">{{ trans('message.table.discount') }}(%)</th>
                                        <th width="12.5%" class="text-center">{{ trans('message.table.amount') }}({{Session::get('currency_symbol')}})</th>
                                        <th width="5%"  class="text-center">{{ trans('message.table.action') }}</th>
                                      </tr>
                    
                    
                                       @php
                                        $taxTotal = 0;
                                        $subTotalAmount = 0;
                                      @endphp
                                      @if(count($detalhes)>0)
                                        @foreach($detalhes as $result)  
                                            @php 
                                                $priceAmount = ($result['quantidade']*$result['preco']);
                                                $discount = ($priceAmount*$result['discount_percent'])/100;
                                                $newPrice = ($priceAmount-$discount);
                                                $tax = ($newPrice*$result['tax_rate']/100);
                                                $subTotalAmount += $newPrice;
                                                $taxTotal += $tax;
                                                 
                                                 if($result['taxa_inclusa_valor']=='no'){
                                                    $preco=$result['preco'];
                                                 }else{
                    
                                                    $precoDesconto=($newPrice/$result['quantidade'])+$tax;
                                                    //$preco=$result->unit_price;
                                                    $Des=1-$result['discount_percent']/100;
                                                    
                                                    $preco= $precoDesconto/$Des; 
                    
                                                 }
                                            @endphp
                                            
                                            
                                             
                    
                                           <tr id="rowid{{$result['item_id']}}" class="linha">
                                              <input type="hidden" name="item_rowid[]" value="{{$result['id']}}">
                                              
                                              <td>
                                                <input type="hidden" name="stock_id[]" value="{{$result['stock_id']}}">
                                                @if($result['item_id']==null)
                                                  <input type='text' class='form-control text-center' name='description[]' value="{{$result['descricao']}}" required>
                                                @else
                                                  {{$result['descricao']}}
                                                  <input type="hidden" name="description[]" value="{{$result['descricao']}}">
                                                @endif
                                                </td>
                                              <td>
                                                <input type='text' class='form-control text-center custom_units unidades' name='item_quantity[]' value='{{$result['quantidade']}}'>
                                                <input type='hidden' name='item_id[]' value="{{$result['item_id']}}">
                                              </td>
                                            <td>
                                              <input type='text' class='form-control text-center custom_rate percentagem' name='unit_price[]' value='{{number_format($preco,2,'.','')}}'>
                                            </td>
                                            <td class="text-center">
                                                <select class="form-control taxListCustom taxa" name="tax_id[]">
                  
                                                @foreach($tax_types as $item)
                                                  <option value="{{$item->id}}" taxrate="{{$item->tax_rate}}" <?= ($item->id == $result['tax_type_id'] ? 'selected':'')?>>{{$item->name}}({{$item->tax_rate}})</option>
                                                @endforeach
                                                </select>
                                              </td>
                                            <td class='text-center taxAmount'>{{number_format($tax,2,'.','')}}</td>
                    
                                            <td class='text-center'>
                                               @if($result['taxa_inclusa_valor']=='no')
                                              <input type='checkbox'  name='inclusao[]' class='checkitem inclusaos' value="no">
                                              <input type='hidden'   class='pegar' value='no' name="taxainclusa[]">
                                              @else
                                              <input type='checkbox'  name='inclusao[]' class='checkitem inclusaos' checked value="yes">
                                              <input type='hidden' class='pegar' value='yes' name="taxainclusa[]">
                                              @endif
                                              </td>
                    
                                            <td><input type='text' class='form-control text-center custom_discount disconto' name='discount[]' value='{{$result['discount_percent']}}'></td>
                                            <td><input type='text' class='form-control text-center amount custom_amount' name='item_price[]' value='{{number_format($newPrice,2,'.','')}}' readonly></td>
                                            <td class='text-center'><button class='btn btn-xs btn-danger delete_item'><i class='glyphicon glyphicon-trash'></i></button></td>
                                            </tr>
                     
                                          @php
                                            $stack[] = $result['item_id'];
                                          @endphp
                    
                                         
                                        
                                        @endforeach
                    
                                      @endif
                    
                                      <tr class="custom-item"><td class="add-row text-danger"><strong>Add Custom Item</strong></td><td colspan="7"></td></tr>
                    
                                      <tr class="tableInfo"><td colspan="7" align="right"><strong>{{ trans('message.table.sub_total') }}({{Session::get('currency_symbol')}})</strong></td><td align="left" colspan="2"><strong id="subTotal">{{number_format($subTotalAmount,2,'.','')}}</strong></td></tr>
                    
                                      <tr class="tableInfo"><td colspan="7" align="right"><strong>{{ trans('message.table.discount')}}{{Session::get('currency_symbol')}})</strong></td><td align="left" colspan="2"><strong id="Descount"></strong></td></tr>
                    
                                      <tr class="tableInfo"><td colspan="7" align="right"><strong>{{ trans('message.invoice.totalTax') }}({{Session::get('currency_symbol')}})</strong></td><td align="left" colspan="2"><strong id="taxTotal">{{number_format($taxTotal,2,'.','')}}</strong></td></tr>
                    
                                     
                                      <!--total:-->
                                      <tr class="tableInfo">
                                        <td colspan="7" align="right">
                                          <strong>{{ trans('message.table.grand_total') }} (<label style="font-size:15px" class="referencia" name="referencia"></label>)</strong>
                                        </td>
                                        <td align="left" colspan="2">
                                          <input type='text' name="total" class="form-control" id="grandTotal" value="{{number_format($subTotalAmount+$taxTotal,2,'.','')}} "
                                            readonly>
                                        </td>
                                      </tr>
                  
                                      <tr hidden class="tableInfo">
                                        <td colspan="7" align="right">
                                          <strong>{{ trans('message.table.grand_total') }} em MZN</strong>
                                        </td>
                                        <td align="left" colspan="2">
                                          <input type='text' name="grandTotal2" class="form-control" id="grandTotal2" value="{{number_format($subTotalAmount+$taxTotal,2,'.','')}}" readonly>
                                          <input type='hidden' name="grandTotal3" class="form-control" id="grandTotal3" value="{{number_format($subTotalAmount+$taxTotal,2,'.','')}}"
                                            readonly>
                                        </td>
                                      </tr>
                    
                                      </tbody>
                                    </table>
                                    </div>
                                    <br><br>
                                    
                                  </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"  data-dismiss="modal">{{ trans('message.sidebar.cancel') }}</button>
                <button type="submit" href="" class="btn btn-default">{{ trans('message.sidebar.convert_quotation') }}</button>
            </div>
            </form>
        </div>

    </div>
</div>

