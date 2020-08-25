<?php

namespace App\Http\Controllers;
use DB;
use Mail;
use Auth;
use Illuminate\Http\Request;
use App\Model\Sales;
use App\Model\Orders;
use App\Model\SockMove;
use App\Model\SaleCC;
use App\Model\Senha;
use App\User;
use Hash;
use App\Model\Consumo;
use App\Http\Requests;
use PDF;



class PDFController extends Controller
{
    

    public function __construct()
    {

        $this->middleware('auth');
    }



     public function sold_report($inicio, $fim){

        $from = date('Y-m-d',strtotime($inicio));
        $to   = date('Y-m-d',strtotime($fim)); 

        $from1=$data['from'] =  formatDate($inicio);
        $to1= $data['to']    =  formatDate($fim);

        $data['itemList']=$this->report->getSales_sold($from1,$to1);
        $data['Quantity']=$this->report->getSales_sold_quantidade($from1,$to1);
        $data['venda'] =  $this->report->getSales_sold_venda($from1,$to1);
        $data['custo'] =  $this->report->getSales_sold_custo($from1,$to1);
        $data['inicio'] = $from1;
        $data['fim'] = $to1;

         return view('PDF.sales_sold',$data);
     }

    /**
     * Store a newly created Paciente in storage.
     *
     * @param CreatePacienteRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteRequest $request)
    {
       

       //return 'Teve chave shady';
    }

    /**
     * Display the specified Paciente.
     *
     * @param  int $id
     *
     * @return Response
     */
   
        public function reportSale_sold(Request $request)
        {
            $from = date('Y-m-d',strtotime($_GET['from']));
            $to   = date('Y-m-d',strtotime($_GET['to']));  

            $from1=$data['from'] =  formatDate($_GET['from']);
            $to1= $data['to']   =  formatDate($_GET['to']);

            $data['itemList'] =  $this->report->getSales_sold($from1,$to1);
            $data['Quantity'] =  $this->report->getSales_sold_quantidade($from1,$to1);
            $data['venda'] =  $this->report->getSales_sold_venda($from1,$to1);
            $data['custo'] =  $this->report->getSales_sold_custo($from1,$to1);

             return view('admin.report.new.sales_sold', $data);

        }    


    

     /**
     * Show the form for creating a new Paciente.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('PDF.index');

  

    }


    public function showteste(Request $request)
    {
        $id=4;
        $data['total'] = DB::table('senhas')->where('factura_id','=',$id)->count();
        $data['senhas'] = DB::table('senhas')->where('factura_id','=',$id)->get();
        $codgo=DB::table('sales_orders')->where('order_no','=',$id)->first()->debtor_no;

         $data['cliente']=DB::table('debtors_master')->where('debtor_no','=',$codgo)->first()->name;
      

        
 

        $dados=($data['total']);

         if (($dados % 2) == 0)
        { 

             $data['limite']=$dados/2;
        }else{

            $data['limite']=$dados/2+1;
        }


        return view('PDF.teste',$data);
       //return view('PDF.teste');

  

    }



    




    /**
     * Display a listing of the Paciente.
     *
     * @param Request $request
     * @return Response
     */
    
    public function index(Request $request)
    {

        $id=4;
        $data['total'] = DB::table('senhas')->where('factura_id','=',$id)->count();
        $data['senhas'] = DB::table('senhas')->where('factura_id','=',$id)->get();
        $codgo=DB::table('sales_orders')->where('order_no','=',$id)->first()->debtor_no;
        $data['cliente']=DB::table('debtors_master')->where('debtor_no','=',$codgo)->first()->name;
      

        $dados=($data['total']);

         if (($dados % 2) == 0)
        { 

             $data['limite']=$dados/2;
        }else{

            $data['limite']=$dados/2+1;
        }


        return view('PDF.index',$data);
       


    }

    public function barcodTeste($id,Request $request)
    {
        /*$user = Auth::user();
        $current_password = 'demo';
       
        if (!Hash::check($current_password, $user->password)) {

            //return 'A PWD nao confere';
             return redirect()->intended($_SERVER['HTTP_REFERER']);

        }
        else{
        */

        return $request->all();
                
        $data['total'] = DB::table('senhas')->where('factura_id','=',$id)->count();
        $data['senhas'] = DB::table('senhas')->where('factura_id','=',$id)->get();
        $codgo=DB::table('sales_orders')->where('order_no','=',$id)->first()->debtor_no;
        $data['cliente']=DB::table('debtors_master')->where('debtor_no','=',$codgo)->first()->name;
      
        $dados=($data['total']);

         if (($dados % 2) == 0)
        { 

             $data['limite']=$dados/2;
        }else{

            $data['limite']=$dados/2+1;
        }


         return view('PDF.index',$data);

        //}
        //return view('PDF.teste',$data);
    }


    public function cheques($id)
    {
          
        $data['total'] = DB::table('cheques')->where('emissao_id','=',$id)->count();
        $data['cheques'] = DB::table('cheques')->where('emissao_id','=',$id)->get();
        $codgo=DB::table('emissoes')->where('id','=',$id)->first()->cliente_id;
        $data['cliente']=DB::table('debtors_master')->where('debtor_no','=',$codgo)->first()->name;
      

        return view('PDF.cheques',$data);
        //return view('PDF.teste',$data);
    }




   public function customer_report_abertas($inicio, $fim, $id,$tipo=null){

        if($tipo==null){
            $tipo="all";
        }
        //return 'senhas consumidas';
        $data['inicio']=$inicio;
        $data['fim']=$fim;
        $data['customerInfo']  = DB::table('debtors_master')
        ->leftjoin('cust_branch','cust_branch.debtor_no','=','debtors_master.debtor_no')
        ->leftjoin('countries','countries.id','=','cust_branch.shipping_country_id')
        ->where('debtors_master.debtor_no',$id)
        ->select('debtors_master.debtor_no','debtors_master.name','debtors_master.phone','debtors_master.email','cust_branch.br_name','cust_branch.br_address','cust_branch.billing_street','cust_branch.billing_city','cust_branch.billing_state','cust_branch.billing_zip_code','countries.country','cust_branch.billing_country_id')                            
        ->first();

        $data['senhas']=$this->filtro_porconsumir($inicio,$fim,$id,$tipo);
        $data['total_valor']=$this->filtro_geral_total_cliente_aberto($inicio,$fim,$id,$tipo);
        $data['numero_elemento'] =count($data['senhas']);
        $data['logo'] = DB::table('preference')
        ->where('category', '=', 'logotipo')
        ->where('field', '=', 'fotografia')
        ->first();

        $pdf = PDF::loadView('admin.senhas.report.cliente_senhas_abertas', $data);
        $pdf->setPaper(array(0,0,750,1060), 'portrait');
        return $pdf->stream('Senhas_abertas'.time().'.pdf',array("Attachment"=>0));


        return view('PDF.senha_customer_aberta',$data);
       
    }


    //todos detalhes da pesquisa para all
    public function customer_report_abertas_all($inicio, $fim,$tipo=null){
    
        //return 'senhas consumidas';
        $data['inicio']=$inicio;
        $data['fim']=$fim;
           
        $data['logo'] = DB::table('preference')
        ->where('category', '=', 'logotipo')
        ->where('field', '=', 'fotografia')
        ->first();
        
        if($tipo==null){
            $tipo="all";
        }

        if($tipo=="all"){
        
            $data['senhas']= DB::table('senhas')
            ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
            ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
            ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
            ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
            ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
            ->where([['senhas.estado','=', 'aberto'],['sales_orders.status','<>', 'cancelado']])
            ->ORwhere([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null]])
            ->select('senhas.*','debtors_master.name','stock_master.description as consumido','sales_orders.reference as ref','sales_orders.status')
            ->orderBy('debtors_master.name','asc')
            ->orderBy('created_at','asc')
            ->orderBy('reference','asc')
            ->get();
            //
            $data['valor_total']=DB::table('senhas')
            ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
            ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
            ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
            ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
            ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
            ->where([['senhas.estado','=', 'aberto'],['sales_orders.status','<>', 'cancelado']])
            ->ORwhere([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null]])
            ->select(DB::raw('SUM(senhas.valor) as total'))->first()->total;

        }else{

            $data['senhas']= DB::table('senhas')
            ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
            ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
            ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
            ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
            ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
            ->where([['senhas.estado','=', 'aberto'],['sales_orders.status','<>', 'cancelado'],['senhas.tipo_senhas','=', $tipo]])
            ->ORwhere([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null],['senhas.tipo_senhas','=', $tipo]])
            ->select('senhas.*','debtors_master.name','stock_master.description as consumido','sales_orders.reference as ref','sales_orders.status')
            ->orderBy('debtors_master.name','asc')
            ->orderBy('created_at','asc')
            ->orderBy('reference','asc')
            ->get() ;
    
            $data['valor_total']=DB::table('senhas')
            ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
            ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
            ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
            ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
            ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
            ->where([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null],['senhas.tipo_senhas','=', $tipo]])
            ->ORwhere([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null],['senhas.tipo_senhas','=', $tipo]])
            ->select(DB::raw('SUM(senhas.valor) as total'))->first()->total;
        }
       



        $data['numero_elemento'] =count($data['senhas']);


        $pdf = PDF::loadView('admin.senhas.report.cliente_senhas_abertas_all', $data);
        $pdf->setPaper(array(0,0,750,1060), 'portrait');
        return $pdf->stream('Senhas_abertas'.time().'.pdf',array("Attachment"=>0));
            
            //return view('PDF.senha_customer_aberta',$data);
            
        }




     public function customer_report_fechado($inicio, $fim, $id){
 
        $data['inicio']=$inicio;
        $data['fim']=$fim;
        $data['customerInfo']  = DB::table('debtors_master')
                 ->leftjoin('cust_branch','cust_branch.debtor_no','=','debtors_master.debtor_no')
                 ->leftjoin('countries','countries.id','=','cust_branch.shipping_country_id')
                 ->where('debtors_master.debtor_no',$id)
                 ->select('debtors_master.debtor_no','debtors_master.name','debtors_master.phone','debtors_master.email','cust_branch.br_name','cust_branch.br_address','cust_branch.billing_street','cust_branch.billing_city','cust_branch.billing_state','cust_branch.billing_zip_code','countries.country','cust_branch.billing_country_id')                            
                 ->first();

        $data['senhas'] =$this->consumo_customer($this->convert($inicio), $this->convert($fim),$id);
        $data['total_valor'] =$this->consumo_customer_total($this->convert($inicio), $this->convert($fim),$id);
        $data['produto'] ="all";
        $data['numero_elemento'] =count($data['senhas']);
        $data['logo'] = DB::table('preference')
        ->where('category', '=', 'logotipo')
        ->where('field', '=', 'fotografia')
        ->first();

        return view('PDF.senha_customer_fechado',$data);
       
    }





    public function customer_report($inicio, $fim, $id){
      

         $data['customerInfo']  = DB::table('debtors_master')
                             ->leftjoin('cust_branch','cust_branch.debtor_no','=','debtors_master.debtor_no')
                             ->leftjoin('countries','countries.id','=','cust_branch.shipping_country_id')
                             ->where('debtors_master.debtor_no',$id)
                             ->select('debtors_master.debtor_no','debtors_master.name','debtors_master.phone','debtors_master.email','cust_branch.br_name','cust_branch.br_address','cust_branch.billing_street','cust_branch.billing_city','cust_branch.billing_state','cust_branch.billing_zip_code','countries.country','cust_branch.billing_country_id')                            
                             ->first();

        $data['inicio']=$inicio;
        $data['fim']=$fim;
        $data['senhas']=$this->filtro_geral_cliente($inicio,$fim,$id);
        $data1=$this->filtro_geral_total_cliente_aberto($inicio,$fim,$id);
        $data2=$this->filtro_geral_total_cliente($inicio,$fim,$id);
        $data['total_valor']=$data1+$data2;
        $data['numero_elemento'] =count($data['senhas']);
       
        
        $data['logo'] = DB::table('preference')
        ->where('category', '=', 'logotipo')
        ->where('field', '=', 'fotografia')
        ->first();


        $pdf = PDF::loadView('admin.senhas.report.cliente_senhas_emitidas', $data);
        $pdf->setPaper(array(0,0,750,1060), 'portrait');
        return $pdf->stream('Senhas_emitidas'.time().'.pdf',array("Attachment"=>0));

        //open this link for big data
        //return view('PDF.senha_customer_emitidas',$data);



     }



      public function filtro_geral_total_cliente($inicio,$fim,$cliente){ 
    
      return  $data = DB::table('senhas')
                    ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
                    ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
                    ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
                    ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
                     ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
                     ->where('senhas.estado', 'fechado')
                     ->where('debtors_master.debtor_no',$cliente)
                    ->sum('senhas.valor');
    }








       public function convert($data){

        $dias=explode("-", $data);
        return  $inicio=$dias[2]."-".$dias[1]."-".$dias[0];
      }

         public function consumo_customer($inicio,$fim,$cliente){

        $consumo=DB::table('consumo')
        ->leftjoin('senhas','senhas.reference','=','consumo.codigo')
        ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
        ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
        ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
        ->where('debtors_master.debtor_no',$cliente)
         ->whereBetween('senhas.emissao', [$inicio, $fim])
         ->select('consumo.*','senhas.*','stock_master.description as consumido','sales_orders.reference','consumo.id as ordem','debtors_master.name')
         ->orderBy('consumo.id','desc')->get();

         return $consumo;
      }

       public function consumo_customer_total($inicio,$fim,$cliente){

        $consumo=DB::table('consumo')
        ->leftjoin('senhas','senhas.reference','=','consumo.codigo')
        ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
        ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
        ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
        ->where('debtors_master.debtor_no',$cliente)
         ->whereBetween('senhas.emissao', [$inicio, $fim])
         ->sum('senhas.valor');

         return $consumo;
      }

      //funcoes por consumir
     public function filtro_porconsumir($inicio,$fim,$cliente,$tipo){
           
        if($tipo=="all"){
           
            return DB::table('senhas')
            ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
            ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
            ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
            ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
            ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
            ->where([['senhas.estado','=', 'aberto'],['sales_orders.status','<>', 'cancelado']])
            ->ORwhere([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null]])
             ->where('debtors_master.debtor_no',$cliente)
            ->select('senhas.*','debtors_master.name','stock_master.description as consumido','sales_orders.reference as ref')
            ->orderBy('senhas.id','desc')->get();

        }else{

            return DB::table('senhas')
                    ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
                    ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
                    ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
                    ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
                    ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
                    ->where([['senhas.estado','=', 'aberto'],['senhas.tipo_senhas','=', $tipo],['sales_orders.status','<>', 'cancelado']])
                    ->ORwhere([['senhas.estado','=', 'aberto'],['senhas.tipo_senhas','=', $tipo],['sales_orders.status','=', null]])
                     ->where('debtors_master.debtor_no',$cliente)
                    ->select('senhas.*','debtors_master.name','stock_master.description as consumido','sales_orders.reference as ref')
                    ->orderBy('senhas.id','desc')->get();
        }
        

  }

  public function filtro_geral_total_cliente_aberto($inicio,$fim,$cliente,$tipo){ 
    
    if($tipo=="all"){

    return  $data = DB::table('senhas')
                    ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
                    ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
                    ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
                    ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
                     ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
                     ->where([['senhas.estado','=', 'aberto'],['sales_orders.status','<>', 'cancelado']])
                     ->ORwhere([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null]])
                     ->where('debtors_master.debtor_no',$cliente)
                     ->sum('senhas.valor');

    }else{
        return  $data = DB::table('senhas')
        ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
        ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
        ->leftjoin('consumo','senhas.reference','=','consumo.codigo')
        ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
         ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
         ->where([['senhas.estado','=', 'aberto'],['sales_orders.status','<>', 'cancelado'],['senhas.tipo_senhas','=', $tipo]])
         ->ORwhere([['senhas.estado','=', 'aberto'],['sales_orders.status','=', null],['senhas.tipo_senhas','=', $tipo]])
         ->where('debtors_master.debtor_no',$cliente)
         ->sum('senhas.valor');

     }   


    }

    //funcoes para relatorio Geral
  public function filtro_geral_cliente($inicio,$fim,$cliente){
   $senhas= DB::table('senhas')
          ->leftjoin('sales_orders','senhas.factura_id','=','sales_orders.order_no')
          ->leftjoin('debtors_master','debtors_master.debtor_no','=','sales_orders.debtor_no')
          ->whereBetween('senhas.emissao', [$this->convert($inicio),$this->convert($fim)])
          ->where('debtors_master.debtor_no',$cliente)
         ->select('senhas.*','debtors_master.name','sales_orders.reference as ref')
          ->orderBy('senhas.id','desc')->get();

          return  $senhas;

   }

   

    public function combustivel_geral($inicio, $fim, $id){
 
        $data['inicio']=$inicio;
        $data['fim']=$fim;

        return $inicio.'--'.$fim.'=='.$id;
        
        $data['customerInfo']  = DB::table('debtors_master')
                 ->leftjoin('cust_branch','cust_branch.debtor_no','=','debtors_master.debtor_no')
                 ->leftjoin('countries','countries.id','=','cust_branch.shipping_country_id')
                 ->where('debtors_master.debtor_no',$id)
                 ->select('debtors_master.debtor_no','debtors_master.name','debtors_master.phone','debtors_master.email','cust_branch.br_name','cust_branch.br_address','cust_branch.billing_street','cust_branch.billing_city','cust_branch.billing_state','cust_branch.billing_zip_code','countries.country','cust_branch.billing_country_id')                            
                 ->first();

        $data['senhas'] =$this->consumo_customer($this->convert($inicio), $this->convert($fim),$id);
        $data['total_valor'] =$this->consumo_customer_total($this->convert($inicio), $this->convert($fim),$id);
        $data['produto'] ="all";
        $data['numero_elemento'] =count($data['senhas']);

        return view('PDF.senha_customer_fechado',$data);
       
    }







    /**
     * Display the specified Paciente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified Paciente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $data_impressao = date("d-m-Y");
        $curso = '';
        $data_inicio = "inicio";
        $data_fim = "fim";
        $ano = "ano";
        $turma = "turma";
        $sala = "sala";
        $horario = "horario";
        $professor ="Professor Responsavel";
        $numero_de_alunos=23;

        /*a seguir eh um exemplo de uma exposicao de como os dados viriam da base de dados 
        eh um array simulado

        <body>

<!--mpdf
<htmlpageheader name="myheader">   
    <div style="border-bottom:solid #000 1px; text-align:center;">
        LOGO
    </div>
    <div style="border-bottom: 1px solid #000000;  text-align:center;">
        Direccao do registo academico
    </div>

    <div style="border: 1px solid #000000; font-size: 9pt;  margin-top:4px; padding:4px; text-align:center;">
        FICHA DE ESCRICAO SEMESTRAL
    </div>   
</htmlpageheader>

<htmlpagefooter name="myfooter">
    <div id="footer" > 
        
    </div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
        */ 


        $ar['1']['codigo'] = "X1";
        $ar['1']['nome'] = "Vander";
        $ar['2']['codigo'] = "X2";
        $ar['2']['nome'] = "Salvador";
        $ar['3']['codigo'] = "X3";
        $ar['3']['nome'] = "Lutelia";
        $ar['4']['codigo'] = "X4";
        $ar['4']['nome'] = "Zefanias";
        $ar['5']['codigo'] = "X5";
        $ar['5']['nome'] = "Antonia";
        

        $lista_alunos ="";
        $i=0;
        foreach ($ar as $key) {
            $i++;
            $lista_alunos.='

            <tr >

                <td align="center" style="border-bottom:solid 1px #000;">'.$i.'</td>
                <td align="center" style="border-bottom:solid 1px #000;">'.$key['codigo'].'</td>
                <td style="border-bottom:solid 1px #000;">'.$key['nome'].'</td>
                <td align="center" style="border-bottom:solid 1px #000;">1</td>
                <td align="center" style="border-bottom:solid 1px #000;">1</td>

            </tr>

           ';
        }

        $header = '
            <!--mpdf
            <htmlpageheader name="myheader">
                <div style="text-align: right">.</div>

                <div style="border-bottom:solid #000 1px; text-align:center;">
                    <img style="vertical-align: top" src="img/lastFinal.jpg" width="85" />
                </div>
                <div style="border-bottom: 1px solid #000000;  text-align:center;">
                    DIRECCAO DO REGISTO ACADEMICO
                </div>

                <div style="border: 1px solid #000000; font-size: 9pt;  margin-top:4px; padding:4px; text-align:center;">
                    FICHA DE ESCRICAO SEMESTRAL
                </div>   
                            

            </htmlpageheader>
        ';
        $footer = '
            <htmlpagefooter name="myfooter">
                Impresso no dia: '.$data_impressao.'
                <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
                    Page {PAGENO} of {nb}
                </div>
            </htmlpagefooter>

            <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
            <sethtmlpagefooter name="myfooter" value="on" />
            mpdf-->
        ';
        $corpo='<div class="corpo" > 


            <div style="text-align: right">
                <div style="border-right: 1px solid #000000; border-top: 1px solid #000000;  width:40%; text-align: left; float:left;">
                    Inscricao N*: 1234423345542
                </div>
                
                <div style="border-left: 1px solid #000000; border-top: 1px solid #000000; width:40%; text-align: right; float:right;">
                    Emitido em: <b>'.date('h:s d-m-Y').'  </b> 
                </div>
                <div style="border-bottom: 1px solid #000000;  width:10%; text-align: center; margin:0 auto;">
                    Original
                </div>
            </div>
            <br>
            <div style="text-align: right">
                <div style="width:50%; text-align: left;float:left;">
                    Dados do Estudante:
                </div>
                <div style="width:50%; text-align: right;float:left;">
                    Ano lectivo de <b>'.date('Y').' 2* </b> semestre
                </div>
            </div>

            <div style="border-bottom: 1px solid #000000; border-top: 1px solid #000000;  " >
                <div style="text-align: right">
                    <div style="width:50%; text-align: left; float:left;">
                       Nome: <b>Dias metano </b><br>
                       Curso:  <b> </b><br>
                       Delegacao:  <b>  </b>
                    </div>
                    <div style="width:50%; text-align: left;float:left;">
                        Numero: <b>XII3687 </b><br>
                        <br>
                        Campus de: <b>XXX</b>
                    </div>
                </div>
            </div>
            <br>
            <br>
        


            <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
            <thead>
            <tr>

            <td width="8%">Ord</td>
            <td width="70%">Nome da disciplina</td>
            <td width="9%">Nivel</td>
            <td width="9%">Sem</td>
            <td width="9%">Turma</td>


            </tr>
            </thead>
            <tbody>
            <!-- ITEMS HERE -->
            '.$lista_alunos.'


           
            </tbody>
            </table>

            <br>  
            <br>


             <div style="text-align: right">
                <div style="width:50%; text-align: left;float:left;">
                    Impresso no dia '.date('d-m-Y').'
                </div>
                <div style="width:50%; text-align: center;float:left;">
                    __________________________________________<br>
                    Quem fez o recibo
                </div>
            </div>

        ';
       
        $corpo.="</div>"; 

        $his = '
        <html>
            <head>
            <style>
            body {font-family: sans-serif;
                font-size: 10pt;
            }
            p { margin: 0pt; }
            table.items {
                border: 0.1mm solid #000000;
            }
            td { vertical-align: top; }
            .items td {
                border-left: 0.1mm solid #000000;
                border-right: 0.1mm solid #000000;
            }
            table thead td { background-color: #EEEEEE;
                text-align: center;
                border: 0.1mm solid #000000;
                font-variant: small-caps;
            }

            .items td.blanktotal {
                background-color: #EEEEEE;
                border: 0.1mm solid #000000;
                background-color: #FFFFFF;
                border: 0mm none #000000;
                border-top: 0.1mm solid #000000;
                border-right: 0.1mm solid #000000;
            }
            .items td.totals {
                text-align: right;
                border: 0.1mm solid #000000;
            }
            .items td.cost {
                text-align: "." center;
            }
            </style>
        </head>
        <body>

        '.$header.'

        '.$footer.'

                '.$corpo.'
           
        </body>
    </html>
        ';
        session_start();
       
        $_SESSION['his'] = $his;


        $_SESSION['tipo'] = "A4";
        $_SESSION['tipulo'] = "Teste";
        $_SESSION['autor'] = "Medico" ;
        $_SESSION['marca_agua'] ="" ;



        //$mpdf=new mPDF('c',$tipo,'','',20,15,48,25,10,10); 
        $_SESSION['um'] = 5;     //esquerda
        $_SESSION['dois'] = 5; //direta

        $_SESSION['tres'] = 40;  // margem de cima do conteudo

        $_SESSION['quatro'] = 30; // margem de baixo do conteudo
        $_SESSION['sinco'] = 5 ; //top
        $_SESSION['seis'] = 5;  // rodape

        return redirect("pdf");
    }

    /**
     * Update the specified Paciente in storage.
     *
     * @param  int              $id
     * @param UpdatePacienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteRequest $request)
    {
        
    }

    /**
     * Remove the specified Paciente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paciente = $this->pacienteRepository->findWithoutFail($id);

        if (empty($paciente)) {
            Flash::error('Paciente not found');

            return redirect(route('pacientes.index'));
        }

        $this->pacienteRepository->delete($id);

        Flash::success('Paciente deleted successfully.');

        return redirect(route('pacientes.index'));
    }


     public function mostrar()
    {
      
    ini_set('max_execution_time', 800);
    ini_set("memory_limit","512M");

    include "public/mpdf60/mpdf.php";  
    //return view('PDF.mostrar');
    $mpdf = new \Mpdf\Mpdf();


$mpdf->useOddEven = 1;

$html = '
<html>
<head>
<style>
    @page {
        size: auto;
        odd-header-name: html_myHeader1;
        even-header-name: html_myHeader2;
        odd-footer-name: html_myFooter1;
        even-footer-name: html_myFooter2;
    }
    @page chapter2 {
        odd-header-name: html_Chapter2HeaderOdd;
        even-header-name: html_Chapter2HeaderEven;
        odd-footer-name: html_Chapter2FooterOdd;
        even-footer-name: html_Chapter2FooterEven;
    }
    @page noheader {
        odd-header-name: _blank;
        even-header-name: _blank;
        odd-footer-name: _blank;
        even-footer-name: _blank;
    }
    div.chapter2 {
        page-break-before: right;
        page: chapter2;
    }
    div.noheader {
        page-break-before: right;
        page: noheader;
    }
</style>
</head>

<body>
    
    <htmlpageheader name="myHeader1" style="display:none">
        <div style="text-align: right; border-bottom: 1px solid #000000; font-weight: bold; font-size: 10pt;">
            My document
        </div>
    </htmlpageheader>
    
    <htmlpageheader name="myHeader2" style="display:none">
        <div style="border-bottom: 1px solid #000000; font-weight: bold;  font-size: 10pt;">
            My document
        </div>
    </htmlpageheader>
    
    <htmlpagefooter name="myFooter1" style="display:none">
        <table width="100%">
            <tr>
                <td width="33%">
                    <span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span>
                </td>
                <td width="33%" align="center" style="font-weight: bold; font-style: italic;">
                    {PAGENO}/{nbpg}
                </td>
                <td width="33%" style="text-align: right;">
                    My document
                </td>
            </tr>
        </table>
    </htmlpagefooter>
    
    <htmlpagefooter name="myFooter2" style="display:none">
        <table width="100%">
            <tr>
                <td width="33%">My document</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;">{DATE j-m-Y}</td>
            </tr>
        </table>
    </htmlpagefooter>
    
    <htmlpageheader name="Chapter2HeaderOdd" style="display:none">
        <div style="text-align: right;">Chapter 2</div>
    </htmlpageheader>
    
    <htmlpageheader name="Chapter2HeaderEven" style="display:none">
        <div>Chapter 2</div>
    </htmlpageheader>
    
    <htmlpagefooter name="Chapter2FooterOdd" style="display:none">
        <div style="text-align: right;">Chapter 2 Footer</div>
    </htmlpagefooter>
    
    <htmlpagefooter name="Chapter2FooterEven" style="display:none">
        <div>Chapter 2 Footer</div>
    </htmlpagefooter>
    
    Hello World
    
    <div class="chapter2">Text of Chapter 2</div>
    
    <div class="noheader">No-Header page</div>
    
</body>
</html>';

$mpdf->WriteHTML($html);

$mpdf->Output();



  

    }



}