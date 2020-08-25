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


class PerguntasController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth::user();
    }
   
    public function index($id=null)
    {
      $data['idpergunta']=$id;
      return view('administracao.perguntas.index',$data);
    }
 
    
    //create
    public function create()
    {
      $data['topicos']=DB::table('topicos')->where('estado','=','activo')->get();
      
      return view('administracao.perguntas.create',$data);
    }




     //Request $request
     public function load(Request $request)
    {
        $dados = DB::table('perguntas')
        ->leftjoin('topicos','topicos.id','=','perguntas.topico_id')
        ->leftjoin('users','users.id','=','topicos.user_register')
        ->select('topicos.descricao as topico','perguntas.*','users.real_name as user')
        ->orderBy('perguntas.id', 'desc')
        ->get();

       

      
          $columns = array( 
                            0 =>'perguntas.id', 
                            1 =>'descricao',
                            2 =>'pontos',
                            3 =>'explicacao',
                            4=> 'topico',
                            5 =>'user',
                            6=> 'created_at',
                            7=> 'estado',
                          );
                          
      
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        $totalData=DB::table('perguntas')
        ->leftjoin('topicos','topicos.id','=','perguntas.topico_id')
        ->leftjoin('users','users.id','=','topicos.user_register')
        ->select('topicos.descricao as topico','perguntas.*','users.real_name as user')
        ->count();

         if(empty($request->input('search.value')))
        {            
            $totalFiltered = $totalData;
            $posts =DB::table('perguntas')
            ->leftjoin('topicos','topicos.id','=','perguntas.topico_id')
            ->leftjoin('users','users.id','=','topicos.user_register')
            ->select('topicos.descricao as topico','perguntas.*','users.real_name as user')
            ->orderby($order,$dir)  
            ->offset($start)   
            ->limit($limit)
            ->get();
          
        }else {

            $texto=$request->input('search.value');
           
                    $posts =DB::table('perguntas')
                    ->leftjoin('topicos','topicos.id','=','perguntas.topico_id')
                    ->leftjoin('users','users.id','=','topicos.user_register')
                    ->select('topicos.descricao as topico','perguntas.*','users.real_name as user')
                    ->where('topicos.descricao','LIKE','%'.$texto.'%')  
                    ->OrWhere('perguntas.descricao','LIKE','%'.$texto.'%')  
                    ->OrWhere('perguntas.descricao','LIKE','%'.$texto.'%')
                    ->OrWhere('perguntas.descricao','LIKE','%'.$texto.'%')  
                    ->orderby($order,$dir)  
                    ->offset($start)   
                    ->limit($limit)
                    ->get();

             $totalFiltered =DB::table('perguntas')
                      ->leftjoin('topicos','topicos.id','=','perguntas.topico_id')
                      ->leftjoin('users','users.id','=','topicos.user_register')
                      ->select('topicos.descricao as topico','perguntas.*','users.real_name as user')
                      ->where('topicos.descricao','LIKE','%'.$texto.'%')  
                      ->OrWhere('perguntas.descricao','LIKE','%'.$texto.'%')  
                      ->OrWhere('perguntas.descricao','LIKE','%'.$texto.'%')
                      ->OrWhere('perguntas.descricao','LIKE','%'.$texto.'%')  
                      ->orderby($order,$dir)  
                      ->offset($start)   
                      ->limit($limit)
                      ->count();


       }
     
          $data = array();

          if(!empty($posts))
          {
            foreach ($posts as $post)
            {
              $put="<input type='text' value=".$post->id." class='pegar' hidden>
              <button type='button' class='btn btn-outline-primary edicao btn-xs'>view</button>
              <button type='button' data-href=".$post->id." class='btn btn-outline-danger btn-xs deletement'>X</button>";

                $nestedData['codigo'] =sprintf("%04d", $post->id)  ;
                $nestedData['nome'] = $post->descricao;
                $nestedData['pontos'] = $post->pontos; 
                $nestedData['topico'] = $post->topico; 
                $nestedData['explicacao'] =$post->explicacao;
                $nestedData['user'] = $post->user;
                $nestedData['created_at'] = date("d/m/Y", strtotime($post->created_at));
                $nestedData['estado'] = $post->estado;
                $nestedData['options'] = $put;
                $data[] = $nestedData;

            }
        }

        
        $json_data = array(
          "draw"            => intval($request->input('draw')),  
          "recordsTotal"    => intval($totalData),  
          "recordsFiltered" => intval($totalFiltered), 
          "data"            => $data   
          );
         echo json_encode($json_data);
    }





   public function store(Request $request)
    {

        $this->validate($request, [
            'descricao' => 'required',
            'topicos' => 'required',
           ]);

        $userId = \Auth::user()->id;

        $data['descricao'] = $request->descricao;
        $data['pontos'] = $request->pontos;
        $data['topico_id'] = $request->topicos; 
        $data['explicacao'] = ""; 
        $data['estado'] = $request->estado;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['user_register'] = $userId;  
        $PerguntaID = DB::table('perguntas')->insertGetId($data);

              
        foreach($request->opcoes as $opcao){

        $data1['descricao'] = $opcao['resposta']; 
        $data1['pergunta_id'] = $PerguntaID;
        $data1['opcao_correcta'] = $opcao['correcta'];
        $data1['estado'] = "activo";
        $data1['created_at'] = date('Y-m-d H:i:s');
        $data1['user_register'] = $userId;  
        DB::table('respostas')->insertGetId($data1);

        }  


         return $PerguntaID;
      
    }


    



    public function edit($id)
    {
        $data['perguntas']=DB::table('perguntas')
                              ->leftjoin('topicos','topicos.id','=','perguntas.topico_id')
                              ->select('topicos.descricao as topico','perguntas.*')
                              ->where('perguntas.id','=',$id)->first();

        $data['respostas']= DB::table('respostas')->where('pergunta_id','=',$id)->get();
        echo json_encode($data);
               exit;
   }    

   
   public function destroy($id)
    {
       DB::table('perguntas')->where('id','=',$id)->delete();
       DB::table('respostas')->where('pergunta_id','=',$id)->delete();

      return "Dados eliminados";

   }    
   

}
