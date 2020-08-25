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


class PerfilController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth::user();
    }
   
    public function index()
    {
        
      $data['roleData'] = DB::table('roles')->get();

       return view('administracao.perfil.index',$data);
    }
 
     //Request $request
     public function load(Request $request)
    {
      /* // print_r(($request->all()));
       $consumosCheques=DB::table('consumo')
      ->leftjoin('stock_master','consumo.id_item','=','stock_master.stock_id')
      ->leftjoin('users','users.id','=','consumo.user_id')
      ->select('consumo.*','users.real_name','stock_master.description','consumo.id as ordem')
      ->orderBy('consumo.id','desc')->get();
      */

     

      $dados = DB::table('users')
      ->leftjoin('roles','roles.id','=','users.role_id')
      ->select('users.*','roles.name as role')
      ->orderBy('id', 'desc')
      ->get();


      
        $columns = array( 
                          0 =>'users.id', 
                          1 =>'real_name',
                          2 =>'email',
                          3 =>'email',
                          4=> 'phone',
                          5=> 'role',
                          6=> 'created_at',
                          7=> 'inactive',
                          8=> 'estado',
                         );

                    

        //$totalData = $this->item->total();
        //$totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        $totalData=$dados = DB::table('users')
        ->leftjoin('roles','roles.id','=','users.role_id')
        ->select('users.*','roles.name as role')
        ->count();

         if(empty($request->input('search.value')))
        {            
            $totalFiltered = $totalData;
            $posts =DB::table('users')
            ->leftjoin('roles','roles.id','=','users.role_id')
            ->select('users.*','roles.name as role')
            ->orderby($order,$dir)  
            ->offset($start)   
            ->limit($limit)
            ->get();
            
            
            

        }else {

            $texto=$request->input('search.value');
           
                    $posts =DB::table('users')
                    ->leftjoin('roles','roles.id','=','users.role_id')
                    ->select('users.*','roles.name as role')
                    ->where('users.real_name','LIKE','%'.$texto.'%')  
                    ->OrWhere('users.email','LIKE','%'.$texto.'%')  
                    ->OrWhere('users.phone','LIKE','%'.$texto.'%')
                    ->OrWhere('roles.name','LIKE','%'.$texto.'%')  
                    ->orderby($order,$dir)  
                    ->offset($start)   
                    ->limit($limit)
                    ->get();

             $totalFiltered =DB::table('users')
                      ->leftjoin('roles','roles.id','=','users.role_id')
                      ->select('users.*','roles.name as role')
                      ->where('users.real_name','LIKE','%'.$texto.'%')  
                      ->OrWhere('users.email','LIKE','%'.$texto.'%')  
                      ->OrWhere('users.phone','LIKE','%'.$texto.'%')
                      ->OrWhere('roles.name','LIKE','%'.$texto.'%')  
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

                if($post->inactive==0){
                  
                  $estado="activo";
                }else{

                  $estado="desactivo";
                }
                
                $nestedData['codigo'] =sprintf("%04d", $post->id)  ;
                $nestedData['nome'] = $post->real_name;
                $nestedData['email'] = $post->email;
                $nestedData['telefone'] = $post->phone;
                $nestedData['perfil'] = $post->role;
                $nestedData['ultimologin'] = date("d/m/Y", strtotime($post->created_at));
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
            'email' => 'required|unique:users,email',
            'nome' => 'required',
            'password' => 'required',
            'perfil' => 'required',
           ]);

        $data['email'] = $request->email;
        $data['real_name'] = $request->nome;
        $data['password'] = \Hash::make($request->password);
        $data['role_id'] = $request->perfil;
        $data['phone'] = $request->telemovel;
        $data['inactive'] = $request->estado;
        $data['created_at'] = date('Y-m-d H:i:s');

        if($request->id!=""){
          DB::table('users')->where('id', $request->id)->update($data);
          DB::table('role_user')->where('user_id', $request->id)->update(['role_id'=>$request->perfil]);
        }else{
          $id = DB::table('users')->insertGetId($data);
          DB::table('role_user')->insertGetId(['user_id'=>$id,'role_id'=>$request->perfil]);
        } 
         return $data;
      
    }


    



    public function edit($id)
    {
        $data['user']=DB::table('users')->where('id','=',$id)->first();
        echo json_encode($data);
               exit;
   }    


   public function destroy($id)
    {
       DB::table('users')->where('id','=',$id)->delete();
       DB::table('role_user')->where('user_id','=',$id)->delete();
       
      return "Dados eliminados";

   }    
   

}
