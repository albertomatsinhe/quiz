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


class TopicosController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth::user();
    }
   
    public function index()
    {
        
     return view('administracao.topicos.index');
    }
 
    


     //Request $request
     public function load(Request $request)
    {
      
      $dados = DB::table('topicos')
      ->leftjoin('users','users.id','=','topicos.user_register')
      ->select('users.real_name as user','topicos.*')
      ->orderBy('topicos.id', 'desc')
      ->get();


        $columns = array( 
                          0 =>'topicos.codigo', 
                          1 =>'descricao',
                          2 =>'data_inicio',
                          3 =>'data_fim',
                          4 =>'data_fim',
                          5=> 'user',
                          6=> 'created_at',
                          7=> 'estado',
                         );

                    

        //$totalData = $this->item->total();
        //$totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        $totalData=$dados =DB::table('topicos')
        ->leftjoin('users','users.id','=','topicos.user_register')
        ->select('users.real_name as user','topicos.*')
        ->count();

         if(empty($request->input('search.value')))
        {            
            $totalFiltered = $totalData;
            $posts =DB::table('topicos')
            ->leftjoin('users','users.id','=','topicos.user_register')
            ->select('users.real_name as user','topicos.*')
            ->orderby($order,$dir)  
            ->offset($start)   
            ->limit($limit)
            ->get();
            
            
            

        }else {

            $texto=$request->input('search.value');
           
                    $posts =DB::table('topicos')
                    ->leftjoin('users','users.id','=','topicos.user_register')
                    ->select('users.real_name as user','topicos.*')
                    ->where('users.real_name','LIKE','%'.$texto.'%')  
                    ->OrWhere('topicos.codigo','LIKE','%'.$texto.'%')  
                    ->OrWhere('topicos.descricao','LIKE','%'.$texto.'%')
                    ->OrWhere('topicos.descricao','LIKE','%'.$texto.'%')  
                    ->orderby($order,$dir)  
                    ->offset($start)   
                    ->limit($limit)
                    ->get();

             $totalFiltered =DB::table('topicos')
                      ->leftjoin('users','users.id','=','topicos.user_register')
                      ->select('users.real_name as user','topicos.*')
                      ->where('users.real_name','LIKE','%'.$texto.'%')  
                      ->OrWhere('topicos.codigo','LIKE','%'.$texto.'%')  
                      ->OrWhere('topicos.descricao','LIKE','%'.$texto.'%')
                      ->OrWhere('topicos.descricao','LIKE','%'.$texto.'%')  
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
              $put="<input type='text' value=".$post->id." class='pegar' hidden><button type='button'   data-href=".$post->id." class='btn btn-outline-primary edicao btn-xs'>Edit</button>
              <button type='button'   data-href=".$post->id." class='btn btn-outline-danger btn-xs deletement'>X</button>";

                if($post->estado=="activo"){
                  $estado="<span class='badge badge-success'>".$post->estado."</span>";
                }else{
                  $estado="<span class='badge badge-danger'>".$post->estado."</span>";
                }

                //$nestedData['codigo'] =sprintf("%04d", $post->id);
                $nestedData['codigo'] = $post->codigo;
                $nestedData['nome'] = $post->descricao;
                $nestedData['data_inicio'] = date("d/m/Y", strtotime($post->data_inicio)); 
                $nestedData['data_fim'] =date("d/m/Y", strtotime($post->data_fim));  
                $nestedData['preco'] = number_format($post->preco,2,'.',',');
                $nestedData['user'] = $post->user;
                $nestedData['created_at'] = date("d/m/Y", strtotime($post->created_at));
                $nestedData['estado'] = $estado;
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
            'inicio' => 'required',
            'fim' => 'required',
            'codigo' => 'required',
           ]);

        $userId = \Auth::user()->id;

        $data['descricao'] = $request->descricao;
        $data['codigo'] = $request->codigo;
        $data['preco'] = $request->preco;
        $data['data_inicio'] = DbDateFormat($request->inicio);;
        $data['data_fim'] = DbDateFormat($request->fim); 
        $data['estado'] = $request->estado;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['user_register'] = $userId;  
        
        if($request->id!=""){
          $data['updated_at'] = date('Y-m-d H:i:s');
          $data['user_edit'] = $userId;
          DB::table('topicos')->where('id', $request->id)->update($data);
          
        }else{
          $id = DB::table('topicos')->insertGetId($data);
         
        } 
         return $data;
      
    }


    



    public function edit($id)
    {
        $data['dados']=DB::table('topicos')->where('id','=',$id)->first();
        echo json_encode($data);
               exit;
   }    

   
   public function destroy($id)
    {
       DB::table('topicos')->where('id','=',$id)->delete();
       
      return "Dados eliminados";

   }    
   

}
