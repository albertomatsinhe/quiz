<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <ul class="sidebar-menu">

      <li <?= $menu == 'dashboard' ? ' class="active"' : ''?>>
        <a href="{{ url('dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>{{ trans('message.sidebar.dashboard') }} </span>
        </a>
      </li>


      <!--Relationships-->
      @if(Helpers::has_permission(Auth::user()->id, 'manage_relationship'))
      <li <?= $menu == 'relationship' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-users"></i>
          <span>{{ trans('message.sidebar.relationship') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          @if(Helpers::has_permission(Auth::user()->id, 'manage_customer'))
          <li <?= isset($sub_menu) && $sub_menu == 'customer' ? ' class="active"' : ''?>>
            <a href="{{url('customer/list')}}">
              <i class="fa fa-users"></i> <span>{{ trans('message.extra_text.customers') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_supplier'))
          <li <?= isset($sub_menu) && $sub_menu == 'supplier' ? ' class="active"' : ''?>>
            <a href="{{url('supplier')}}">
              <i class="fa fa-users"></i> <span>{{ trans('message.extra_text.supplier') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_supplier'))
          <li <?= isset($sub_menu) && $sub_menu == 'entidades' ? ' class="active"' : ''?>>
            <a href="{{url('entidades')}}">
              <i class="fa fa-users"></i> <span>Entidade</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_supplier'))
            <li <?= isset($sub_menu) && $sub_menu == 'chapas' ? ' class="active"' : ''?> >
          <a href="{{url('chapas')}}">
            <i class="fa fa-users"></i> <span>{{ trans('message.table.buses') }}</span>
          </a>
            </li>  
          @endif

        </ul>
      </li>
      @endif

      @if(Helpers::has_permission(Auth::user()->id, 'manage_item'))
      <li <?= $menu == 'item' ? ' class="treeview active"' : 'treeview'?>>
        <a href="{{url('#')}}">
          <i class="fa fa-cubes"></i>
          <span>{{ trans('message.sidebar.item') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <li <?= isset($sub_menu) && $sub_menu == 'item' ? ' class="active"' : ''?>>
            <a href="{{url('item')}}">
              <span>{{ trans('message.table.item_service') }}</span>
            </a>
          </li>

          <li <?= isset($sub_menu) && $sub_menu == 'general' ? ' class="active"' : ''?>>
            <a href="{{url('item-category')}}">
              <span>{{trans('message.sidebar.item_categories')}}</span>
            </a>
          </li>
        </ul>
      </li>
      @endif

      @if(Helpers::has_permission(Auth::user()->id, 'manage_sale'))
      <li <?= $menu == 'sales' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-list-ul"></i>
          <span>{{ trans('message.sidebar.sales') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Helpers::has_permission(Auth::user()->id, 'manage_quotation'))
          <li <?= isset($sub_menu) && $sub_menu == 'order/list' ? ' class="active"' : ''?>>
            <a href="{{url('order/list')}}">
              <span>{{ trans('message.accounting.quotations') }}</span>
            </a>
          </li>

          <li <?= isset($sub_menu) && $sub_menu == 'fact/list' ? ' class="active"' : ''?>>
            <a href="{{url('fact/list')}}">
            <span>{{ trans('message.accounting.quotations_fact') }}</span>
            </a>
          </li> 

          @endif

        @if(Helpers::has_permission(Auth::user()->id, 'manage_quotation1'))
          <li <?= isset($sub_menu) && $sub_menu == 'factura/list' ? ' class="active"' : ''?>>
            <a href="{{url('factura/list')}}">
              <span>{{ trans('message.table.invoices') }} Nova</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales/direct-invoice' ? ' class="active"' : ''?>>
            <a href="{{ url('sales/filtering') }}">
              <span>{{ trans('message.table.invoices') }}</span>
            </a>
          </li>
          @endif

          <!--DEBITO hUGO-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales/direct-invoice_debito' ? ' class="active"' : ''?>>
            <a href="{{url('sales/debito')}}">
              <span>{{ trans('message.transaction.debit') }}</span>
            </a>
          </li>
          @endif

          <!--credito hUGO-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales/direct-invoice_credito' ? ' class="active"' : ''?>>
            <a href="{{url('sales/credito')}}">
              <span>{{ trans('message.transaction.credits') }}</span>
            </a>
          </li>
          @endif

          <!--GE hUGO-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales/direct-invoice_guia_entrega' ? ' class="active"' : ''?>>
            <a href="{{url('sales/guiaentrega')}}">
              <span>{{ trans('message.sidebar.delivery_guide') }}</span>
            </a>
          </li>
          @endif

          <!--GT hUGO-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales/direct-invoice_guia_transporte' ? ' class="active"' : ''?>>
            <a href="{{url('sales/guiatransporte')}}">
              <span>{{ trans('message.sidebar.transportation_guide') }}</span>
            </a>
          </li>
          @endif

          <!--VD hUGO-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales/direct-invoice_vd' ? ' class="active"' : ''?>>
            <a href="{{url('sales/vd')}}">
              <span>{{ trans('message.sidebar.vd') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_payment'))
          <li <?= isset($sub_menu) && $sub_menu == 'payment_list' ? ' class="active"' : ''?>>
            <a href="{{url('payment/list')}}">
              <span>{{ trans('message.extra_text.payments') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_payment'))
          <li <?= isset($sub_menu) && $sub_menu == 'advance_payment' ? ' class="active"' : ''?>>
            <a href="{{url('advance_payment')}}">
              <span>{{ trans('message.advance_payments.advance_payment_receipts') }}</span>
            </a>
          </li>
          @endif

        </ul>
      </li>
      @endif



      @if(Helpers::has_permission(Auth::user()->id, 'manage_sale'))
        <li <?= $menu == 'Gestao_senha' ? ' class="treeview active"' : 'treeview'?> >
          <a href="#">
            <i class="fa fa-list-ul"></i>
            <span>Gestão de Combustivel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
           <!--consumo Sh@dy-->
             @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
            <li <?= isset($sub_menu) && $sub_menu == 'recolhas' ? ' class="active"' : ''?> >
              <a href="{{url('recolhas')}}">
                <span>Recolhas</span>
              </a>
            </li>  
            @endif


             @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
            <li <?= isset($sub_menu) && $sub_menu == 'sales/cheque/list' ? ' class="active"' : ''?> >
              <a href="{{url('sales/consumo/list')}}">
                <span>{{ trans('message.table.ticket_list') }}</span>
              </a>
            </li>  
            @endif
            <!--consumo Sh@dy-->
            @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
            <li <?= isset($sub_menu) && $sub_menu == 'consumo/chapas' ? ' class="active"' : ''?> >
              <a href="{{url('consumo/chapas')}}">
                <span>Consumo chapas</span>
              </a>
            </li>  
            @endif



              <!--cheque Sh@dy-->
            @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
            <li <?= isset($sub_menu) && $sub_menu == 'sales/cheque/new' ? ' class="active"' : ''?> >
              <a href="{{url('sales/cheque/emitir')}}">
                <span>{{ trans('message.table.cheque_new') }}</span>
              </a>
            </li>  
            @endif

            @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice1'))
            <li <?= isset($sub_menu) && $sub_menu == 'sales/ticket/list' ? ' class="active"' : ''?> >
              <a href="{{url('sales/ticket/list')}}">
                <span>{{ trans('message.table.ticket_list') }}</span>
              </a>
            </li>  
            @endif

          
            
           



             @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
            <li <?= isset($sub_menu) && $sub_menu == 'sales/cheque/gerarfacturas' ? ' class="active"' : ''?> >
              <a href="{{url('sales/cheque/gerarfacturas')}}">
                <span>{{ trans('message.table.make_invoice') }}</span>
              </a>
            </li>  
            @endif

          </ul>
        </li>

         @endif 




      <!--COMPRAS:-->
      @if(Helpers::has_permission(Auth::user()->id, 'manage_purchase'))
      <li <?= $menu == 'purchase' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-shopping-cart"></i>
          <span>{{ trans('message.extra_text.purchases') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

        @if(Helpers::has_permission(Auth::user()->id, 'manage_quotation'))
          <li <?= isset($sub_menu) && $sub_menu == 'purchase_order' ? ' class="active"' : ''?>>
            <a href="{{url('purchase_order')}}">
              <span>{{ trans('message.sidebar.p_o') }}</span>
            </a>
          </li>
          @endif
          
          @if(Helpers::has_permission(Auth::user()->id, 'manage_purchase'))
          <li <?= isset($sub_menu) && $sub_menu == 'purchase/direct-invoice_compra_for' ? ' class="active"' : ''?>>
            <a href="{{url('purchase/list')}}">
              <span>{{ trans('message.extra_text.purchases') }}</span>
            </a>
          </li>
          @endif


          <!--PAGAMENTOS FORNECEDOR hUGO-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'purchase/direct-invoice_pay_for' ? ' class="active"' : ''?>>
            <a href="{{url('payment_supplier/list')}}">
              <span>{{ trans('message.extra_text.payments') }}</span>
            </a>
          </li>
          @endif

          <!--VD FORNECEDOR hUGO-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'purchase/direct-invoice_vd_for' ? ' class="active"' : ''?>>
            <a href="{{url('purchase/vd')}}">
              <span>{{ trans('message.sidebar.cd') }}</span>
            </a>
          </li>
          @endif

        </ul>
      </li>
      @endif
      <!--end compras-->


      @if(Helpers::has_permission(Auth::user()->id, 'manage_banking_transaction'))
      <li <?= $menu == 'transaction' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-money"></i>
          <span>{{ trans('message.bank.bank_cash') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Helpers::has_permission(Auth::user()->id, 'manage_bank_account'))
          <li <?= isset($sub_menu) && $sub_menu == 'bank/list' ? ' class="active"' : ''?>>
            <a href="{{url('bank/list')}}">
              <span>{{ trans('message.bank.list_accounts') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_deposit'))
          <li <?= isset($sub_menu) && $sub_menu == 'deposit/list' ? ' class="active"' : ''?>>
            <a href="{{url('deposit/list')}}">
              <span>{{ trans('message.transaction.deposits') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_balance_transfer'))
          <li <?= isset($sub_menu) && $sub_menu == 'transfer/list' ? ' class="active"' : ''?>>
            <a href="{{url('transfer/list')}}">
              <span>{{ trans('message.transaction.transfers') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_transaction'))
          <li <?= isset($sub_menu) && $sub_menu == 'transaction/list' ? ' class="active"' : ''?>>
            <a href="{{url('transaction/list')}}">
              <span>{{ trans('message.transaction.view_transaction') }}</span>
            </a>
          </li>
          @endif

        </ul>
      </li>
      @endif

      @if(Helpers::has_permission(Auth::user()->id, 'manage_expense'))
      <li <?= $menu == 'expense' ? ' class="active"' : ''?>>
        <a href="{{url('expense/list')}}">
          <i class="fa fa-heartbeat menu-icon"></i>
          <span>{{ trans('message.transaction.expenses') }}</span>
        </a>
      </li>
      @endif

      {{-- Dossiers Internos --}}
      @if(Helpers::has_permission(Auth::user()->id, 'manage_purchase'))
      <li <?= $menu == 'docier' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-cubes"></i>
          <span>Movimentos de Stock</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Helpers::has_permission(Auth::user()->id, 'manage_purchase'))
          <li <?= isset($sub_menu) && $sub_menu == 'moviment/entrada/list' ? ' class="active"' : ''?>>
            <a href="{{url('moviment/entrada/list')}}">
              <span>Movimento de Entrada</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_purchase'))
          <li <?= isset($sub_menu) && $sub_menu == 'moviment/saida/list' ? ' class="active"' : ''?>>
            <a href="{{url('moviment/saida/list')}}">
              <span>Movimento de Saida</span>
            </a>
          </li>
          @endif

          <!--Transferencias de armazem-->
          @if(Helpers::has_permission(Auth::user()->id, 'manage_invoice'))
          <li <?= isset($sub_menu) && $sub_menu == 'transferencia/list' ? ' class="active"' : ''?>>
            <a href="{{url('transferencia/list')}}">
              <span>Transf. entre Armázens</span>
            </a>
          </li>
          @endif

        </ul>
      </li>
      @endif
      {{-- Dossiers Internos --}}

      <hr>

      {{-- Relatorio dos Stocks --}}


      {{-- salvador acrescimo dos relatorios de combustivel --}}


        @if(Helpers::has_permission(Auth::user()->id, 'manage_report'))
        <li <?= $menu == 'report' ? ' class="treeview active"' : 'treeview'?> >
           <a href="#">
            <i class="fa fa-bar-chart"></i>
            <span>{{ trans('message.sidebar.fuel_report') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            @if(Helpers::has_permission(Auth::user()->id, 'manage_stock_on_hand'))

            <li <?= isset($sub_menu) && $sub_menu == 'report_petrole' ? ' class="active"' : ''?> >
              <a href="{{url('sale/combustivel/report')}}">
                <span>Relatório De Senha</span>
              </a>
            </li>


         <!--@Ernesto-->
            <li <?= isset($sub_menu) && $sub_menu == 'report_cheque' ? ' class="active"' : ''?> >
              <a href="{{url('cheque/combustivel/report')}}">
                <span>Relatório De Cheque</span>
              </a>
            </li>
            
         <!--@FimErnesto-->
           <li <?= isset($sub_menu) && $sub_menu == 'report_geral' ? ' class="active"' : ''?> >
              <a href="{{url('geral/combustivel/consumo/report')}}">
                <span>Relatório consumo geral</span>
              </a>
            </li>

            @endif
            
          </ul>

        </li>
        @endif






      @if(Helpers::has_permission(Auth::user()->id, 'manage_banking_transaction'))
      <li <?= $menu == 'reports' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-cubes"></i>
          <span>{{ trans('message.sidebar.stock_report') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">


          @if(Helpers::has_permission(Auth::user()->id, 'manage_stock_on_hand'))

          <li <?= isset($sub_menu) && $sub_menu == 'stock_hand' ? ' class="active"' : ''?>>
            <a href="{{url('report/inventory-stock-hand')}}">
              <span>{{ trans('message.sidebar.stock_value') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_sale_report'))
          <li <?= isset($sub_menu) && $sub_menu == 'stock_inputs_&_outputs' ? ' class="active"' : ''?>>
            <a href="{{url('report/inventory-general')}}"> {{ trans('message.sidebar.stock_inputs_&_outputs') }}</a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_stock_on_hand'))
          <li <?= isset($sub_menu) && $sub_menu == 'sold_report' ? ' class="active"' : ''?>>
            <a href="{{url('report/inventory-sold')}}">
              <span>{{ trans('message.sidebar.inventory-sold_report') }}</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_stock_on_hand'))
          <li <?= isset($sub_menu) && $sub_menu == 'sold_report_vd' ? ' class="active"' : ''?>>
            <a href="{{url('report/inventory-sold_vd')}}">
              <span>{{ trans('message.sidebar.inventory-sold_report_vd') }}</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_stock_on_hand'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales_forecast' ? ' class="active"' : ''?>>
            <a href="{{url('report/inventory-stock-on-hand')}}"><span>{{ trans('message.sidebar.sales_forecast') }}</span>
              {{ trans('message.sidebar.inventory_stock_on_hand') }}</a>
          </li>
          @endif
        </ul>
      </li>
      @endif
      {{-- End Relatorio dos Stocks --}}


      {{-- Relatorio dos Clientes --}}

      @if(Helpers::has_permission(Auth::user()->id, 'manage_banking_transaction'))
      <li <?= $menu == 'reports_cus' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-users"></i>
          <span>{{ trans('message.sidebar.client_report') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Helpers::has_permission(Auth::user()->id, 'manage_customer'))
          <li <?= isset($sub_menu) && $sub_menu == 'account_all' ? ' class="active"' : ''?>>
            <a href="{{url('customer/current_account_all')}}">
              <span>{{ trans('message.client_report.extract_customer') }}</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_customer'))
          <li <?= isset($sub_menu) && $sub_menu == 'customers_pendentes' ? ' class="active"' : ''?>>
            <a href="{{url('customers/pendentes')}}">
              <span>{{ trans('message.client_report.pendent') }}</span>
            </a>
          </li>
          @endif

           @if(Helpers::has_permission(Auth::user()->id, 'manage_customer'))
          <li <?= isset($sub_menu) && $sub_menu == 'customers_clientes' ? ' class="active"' : ''?>>
            <a href="{{url('customers/soma')}}">
              <span>Totais dos Cliente</span>
            </a>
          </li>
          @endif
        </ul>
      </li>
      @endif
      {{-- End Relatorio dos Clientes --}}

      {{-- Relatorio dos Vendas --}}

      @if(Helpers::has_permission(Auth::user()->id, 'manage_banking_transaction'))
      <li <?= $menu == 'sales_repors' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-list"></i>
          <span>{{ trans('message.sidebar.sales_reports') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Helpers::has_permission(Auth::user()->id, 'manage_sale_report'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales_grafic' ? ' class="active"' : ''?>>
            <a href="{{url('report/sales-report')}}">
              <span>{{ trans('message.sidebar.sales_report') }}</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_sale_history_report'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales_analit' ? ' class="active"' : ''?>>
            <a href="{{url('report/sales-history-report')}}">
              <span>{{ trans('message.sidebar.sales_history_report') }}</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_income_report'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales_vs_expense' ? ' class="active"' : ''?>>
            <a href="{{url('transaction/income-report')}}">
              <span>{{ trans('message.transaction.income_report') }}</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_income_vs_expense'))
          <li <?= isset($sub_menu) && $sub_menu == 'sales_income' ? ' class="active"' : ''?>>
            <a href="{{url('transaction/income-vs-expense')}}">
              <span>{{ trans('message.transaction.income_vs_expense') }}</span>
            </a>
          </li>
          @endif
        </ul>
      </li>
      @endif
      {{-- End Relatorio das Vendas --}}

      {{-- Relatorio das Compras --}}
      @if(Helpers::has_permission(Auth::user()->id, 'manage_banking_transaction'))
      <li <?= $menu == 'reports_purchase' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-shopping-cart"></i>
          <span>{{ trans('message.sidebar.purchase_report') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Helpers::has_permission(Auth::user()->id, 'manage_purchase_report'))
          <li <?= isset($sub_menu) && $sub_menu == 'purchase_report' ? ' class="active"' : ''?>>
            <a href="{{url('report/purchase-report')}}">
              <span>{{ trans('message.purchase_report.purchase_report') }}</span>
            </a>
          </li>
          @endif
        </ul>
      </li>
      @endif


      {{-- End Relatorio das Compras --}}

      {{-- Relatorio das Despesas --}}

      @if(Helpers::has_permission(Auth::user()->id, 'manage_banking_transaction'))
      <li <?= $menu == 'reports_expense' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-heartbeat menu-icon"></i>
          <span>{{ trans('message.sidebar.expenses_report') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Helpers::has_permission(Auth::user()->id, 'manage_expense_report'))
          <li <?= isset($sub_menu) && $sub_menu == 'expense_rep' ? ' class="active"' : ''?>>
            <a href="{{url('transaction/expense-report')}}">
              <span>{{ trans('message.transaction.expense_report') }}</span>
            </a>
          </li>
          @endif
          @if(Helpers::has_permission(Auth::user()->id, 'manage_team_report'))
          <li <?= isset($sub_menu) && $sub_menu == 'expense_team' ? ' class="active"' : ''?>>
            <a href="{{url('report/member-report')}}">
              <span>{{ trans('message.purchase_report.member_report') }}</span>
            </a>
          </li>
          @endif

        </ul>
      </li>
      @endif

      {{-- End Relatorio das Despesas --}}


      @if(Helpers::has_permission(Auth::user()->id, 'manage_setting'))
      <hr>
      <li <?= $menu == 'setting' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-gears"></i>
          <span>{{ trans('message.form.settings') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          @if(Helpers::has_permission(Auth::user()->id, 'impressao_doc'))
          <li {{ isset($sub_menu) &&  $sub_menu == 'print_permission' ? 'class=active' : ''}}>
            <a href="{{ URL::to("factura/acess")}}">Print Permission</a>
          </li>
          @endif

          <li <?=isset($sub_menu) && $sub_menu == 'company' ? ' class="active"' : ''?>>
            <a href="{{url('company/setting')}}">
              <span>{{ trans('message.table.company_details') }}</span>
            </a>
          </li>


          @if(Helpers::has_permission(Auth::user()->id, 'manage_general_setting'))
          <li <?= isset($sub_menu) && $sub_menu == 'general' ? ' class="active"' : ''?>>
            <a href="{{url('income-expense-category/list')}}">
              <span>{{ trans('message.table.general_settings') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_finance'))
          <li <?=isset($sub_menu) && $sub_menu == 'finance' ? ' class="active"' : ''?>>
            <a href="{{url('tax')}}">
              <span>{{ trans('message.table.finance') }}</span>
            </a>
          </li>
          @endif


          <li <?=isset($sub_menu) && $sub_menu == 'mail-temp' ? ' class="active"' : ''?>>
            <a href="{{url('customer-invoice-temp/5')}}">
              <span>{{ trans('message.email.email_template') }}</span>
            </a>
          </li>


          @if(Helpers::has_permission(Auth::user()->id, 'manage_preference'))
          <li <?=isset($sub_menu) && $sub_menu == 'preference' ? ' class="active"' : ''?>>
            <a href="{{url('setting-preference')}}">
              <span>{{ trans('message.table.preference') }}</span>
            </a>
          </li>
          @endif

          @if(Helpers::has_permission(Auth::user()->id, 'manage_barcode'))
          <li <?=isset($sub_menu) && $sub_menu == 'barcode' ? ' class="active"' : ''?>>
            <a href="{{url('barcode/create')}}">
              <span>{{ trans('message.barcode.print_menu') }}</span>
            </a>
          </li>
          @endif

        </ul>
      </li>
      @endif



      <li <?= $menu == 'parametros' ? ' class="treeview active"' : 'treeview'?>>
        <a href="#">
          <i class="fa fa-sort-alpha-desc"></i>
          <span>{{ trans('message.Parameters.parameters') }}</span>

          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">



          <li {{ isset($sub_menu) &&  $sub_menu == 'bank_account' ? 'class=active' : ''}}>
            <a href="{{ URL::to("bank_account")}}">{{ trans('message.table.bank_details') }}</a>
          </li>

          <li <?=isset($sub_menu) && $sub_menu == 'moedas' ? ' class="active"' : ''?>>
            <a href="{{url('cambio')}}">
              <span>{{ trans('message.Parameters.coins') }}</span>
            </a>
          </li>



          <li <?= isset($sub_menu) && $sub_menu == 'taxas' ? ' class="active"' : ''?>>
            <a href="{{url('taxas')}}">
              <span>{{ trans('message.Parameters.rates') }}</span>
            </a>
          </li>

          <li <?= isset($sub_menu) && $sub_menu == 'alocar_user' ? ' class="active"' : ''?>>
            <a href="{{url('alocar-user')}}">
              <span>{{ trans('message.table.allocate_store') }}</span>
            </a>
          </li>

          <li <?= isset($sub_menu) && $sub_menu == 'alocar_armazem' ? ' class="active"' : ''?>>
            <a href="{{url('alocar_armazem')}}">
              <span>{{ trans('message.table.allocate_user_store') }}</span>
            </a>
          </li>

          <li <?= isset($sub_menu) && $sub_menu == 'location' ? ' class="active"' : ''?>>
            <a href="{{url('location')}}">
              <span>{{ trans('message.extra_text.locations') }}</span>
            </a>
          </li>

        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>