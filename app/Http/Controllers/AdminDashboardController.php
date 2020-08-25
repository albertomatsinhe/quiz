<?php
namespace App\Http\Controllers;
ini_set('maxdb_execution_time', 300);
ini_set('max_execution_time', 300);
ini_set("memory_limit", "512M");
use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Http\Requests;
use DB;
use PDF;
use Auth;
use App\Http\Start\Helpers;

class AdminDashboardController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth::user();
    }
   
    public function index()
    {
      $data['topicos'] =DB::table('topicos')
      ->leftjoin('users','users.id','=','topicos.user_register')
      ->select('users.real_name as user','topicos.*')
      ->orderBy('topicos.id', 'desc')
      ->limit(7)
      ->get();

      $data['clientes'] =DB::table('clientes')
      ->orderBy('id', 'desc')
      ->limit(5)
     ->get();


       $dia= date('Y-m-d');
      $ano = substr($dia,  0, 7);
      $iniciomMesdia= $ano.'-'.'01';   
      $fimMesdia= date("Y-m-t",strtotime($dia));
       
       $data['clientesTotal'] =  DB::table('clientes')->count();

       $data['subscricoesDiarias'] =  DB::table('q_subscricoes')
                                        ->where('data_inicio', '=', $dia)
                                        ->count();

      $data['facturacoesDiarias'] =  DB::table('q_subscricoes')
                                    ->select(DB::raw('SUM(preco) as total') )
                                    ->where('data_inicio', '=', $dia)
                                    ->first()
                                    ->total;

       $data['subscricoesMensais'] =  DB::table('q_subscricoes')
                                    ->where('q_subscricoes.data_inicio', '>=', $iniciomMesdia)
                                    ->where('q_subscricoes.data_inicio', '<=', $fimMesdia)
                                    ->count();

      $data['facturacoesMensais'] =  DB::table('q_subscricoes')
                                      ->select(DB::raw('SUM(preco) as total') )
                                      ->where('q_subscricoes.data_inicio', '>=', $iniciomMesdia)
                                      ->where('q_subscricoes.data_inicio', '<=', $fimMesdia)
                                      ->first()
                                      ->total;     
                                      
                                      
       //@just for now//will be dinamic;
       $data['Setembro'] =  DB::table('q_subscricoes')
       ->select(DB::raw('SUM(preco) as total') )
       ->where('q_subscricoes.data_inicio', '>=', '2020-09-01')
       ->where('q_subscricoes.data_inicio', '<=', '2020-09-30')
       ->first()
       ->total; 


       $data['ranks'] =  DB::table('detalhes_subscricao')
      ->leftjoin('q_subscricoes','q_subscricoes.id','=','detalhes_subscricao.subscricao_id')
      ->leftjoin('clientes','clientes.id','=','q_subscricoes.cliente_id')
      ->select(DB::raw('SUM(detalhes_subscricao.pontos) as total') ,'clientes.numero','clientes.nome')
      ->groupBy(DB::raw("cliente_id"))
      ->orderBY('total','desc')
      ->limit(7)
      ->get();
    

      return view('administracao.dashboard.index',$data);


    }
 

   

}
