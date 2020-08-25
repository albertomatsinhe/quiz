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

class SimuladorController extends Controller
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

     
       // return view('administracao.simulador.index',$data);
        return view('administracao.simulador.index1',$data);


    }
 

   

}
