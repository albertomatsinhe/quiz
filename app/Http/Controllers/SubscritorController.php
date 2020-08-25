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


class SubscritorController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth::user();
    }
   
    public function index()
    {
        
     return view('administracao.subscritores.index');
    }
 


     //Request $request
     public function load(Request $request)
    {
      
      $dados = DB::table('clientes')
               ->orderBy('id', 'desc')
              ->get();

      
        $columns = array( 
                          0 =>'id', 
                          1 =>'codigo',
                          2 =>'numero',
                          3 =>'nome',
                          4=> 'data',
                          5=> 'created_at',
                          6=> 'estado',
                         );

                    

        //$totalData = $this->item->total();
        //$totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        $totalData=$dados =DB::table('clientes')
        ->count();

         if(empty($request->input('search.value')))
        {            
            $totalFiltered = $totalData;
            $posts =DB::table('clientes')
            ->select('clientes.*')
            ->orderby($order,$dir)  
            ->offset($start)   
            ->limit($limit)
            ->get();
            
            
            

        }else {

            $texto=$request->input('search.value');
           
                    $posts =DB::table('clientes')
                    ->select('clientes.*')
                    ->where('codigo','LIKE','%'.$texto.'%')  
                    ->OrWhere('numero','LIKE','%'.$texto.'%')  
                    ->OrWhere('nome','LIKE','%'.$texto.'%')
                    ->OrWhere('estado','LIKE','%'.$texto.'%')  
                    ->orderby($order,$dir)  
                    ->offset($start)   
                    ->limit($limit)
                    ->get();

             $totalFiltered =DB::table('clientes')
                      ->select('clientes.*')
                      ->where('codigo','LIKE','%'.$texto.'%')  
                      ->OrWhere('numero','LIKE','%'.$texto.'%')  
                      ->OrWhere('nome','LIKE','%'.$texto.'%')
                      ->OrWhere('estado','LIKE','%'.$texto.'%')  
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
                $nestedData['id'] =sprintf("%04d", $post->id)  ;
                $nestedData['nome'] = $post->nome;
                $nestedData['codigo'] = $post->codigo;
                $nestedData['numero'] = $post->numero; 
                $nestedData['data'] =date("d/m/Y", strtotime($post->data));  
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
            'estado' => 'required',
        ]);

        $userId = \Auth::user()->id;
        $data['estado'] = $request->estado;
        
        if($request->id!=""){
          $data['updated_at'] = date('Y-m-d H:i:s');
          DB::table('clientes')->where('id', $request->id)->update($data);
          
        }else{
          $id = DB::table('clientes')->insertGetId($data);
         
        } 
         return $data;
      
    }


    



    public function edit($id)
    {
        $data['dados']=DB::table('clientes')->where('id','=',$id)->first();
        echo json_encode($data);
               exit;
   }    

   
   public function destroy($id)
    {
       DB::table('clientes')->where('id','=',$id)->delete();
       
      return "Dados eliminados";

   }    
   

}
