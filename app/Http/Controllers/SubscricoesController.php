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


class SubscricoesController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth::user();
    }
   
    public function index()
    {
       
      return view('administracao.subscricoes.index');
    }
 



     //Request $request
     public function load(Request $request)
    {
 
      $dados = DB::table('q_subscricoes')
                ->leftjoin('topicos','topicos.id','=','q_subscricoes.topico_id')
                ->leftjoin('clientes','clientes.id','=','q_subscricoes.cliente_id')
                ->select('topicos.descricao as topico','q_subscricoes.*','clientes.nome as cliente','clientes.numero as numero')
                ->orderBy('q_subscricoes.id', 'desc')
                ->get();
                
            
        $columns = array( 
                          0 =>'q_subscricoes.id', 
                          1 =>'clientes.numero',
                          2 =>'codigo',
                          3 =>'topico',
                          4=> 'data_inicio',
                          4=> 'data_fim',
                          5=> 'created_at',
                          6=> 'estado',
                         );

         
        //$totalData = $this->item->total();
        //$totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        $totalData=$dados =DB::table('q_subscricoes')
        ->leftjoin('topicos','topicos.id','=','q_subscricoes.topico_id')
        ->leftjoin('clientes','clientes.id','=','q_subscricoes.cliente_id')
        ->select('topicos.descricao as topico','q_subscricoes.*','clientes.nome as cliente','clientes.numero as numero')
        ->count();

         if(empty($request->input('search.value')))
        {            
            $totalFiltered = $totalData;
            $posts =DB::table('q_subscricoes')
            ->leftjoin('topicos','topicos.id','=','q_subscricoes.topico_id')
            ->leftjoin('clientes','clientes.id','=','q_subscricoes.cliente_id')
            ->select('topicos.descricao as topico','q_subscricoes.*','clientes.nome as cliente','clientes.numero as numero')
            ->orderby($order,$dir)  
            ->offset($start)   
            ->limit($limit)
            ->get();
            
            
            

        }else {

            $texto=$request->input('search.value');
           
                    $posts =DB::table('q_subscricoes')
                    ->leftjoin('topicos','topicos.id','=','q_subscricoes.topico_id')
                    ->leftjoin('clientes','clientes.id','=','q_subscricoes.cliente_id')
                    ->select('topicos.descricao as topico','q_subscricoes.*','clientes.nome as cliente','clientes.numero as numero')
                    ->where('q_subscricoes.codigo','LIKE','%'.$texto.'%')  
                    ->OrWhere('numero','LIKE','%'.$texto.'%')  
                    ->OrWhere('clientes.nome','LIKE','%'.$texto.'%')
                    ->OrWhere('q_subscricoes.estado','LIKE','%'.$texto.'%')  
                    ->orderby($order,$dir)  
                    ->offset($start)   
                    ->limit($limit)
                    ->get();

             $totalFiltered =DB::table('q_subscricoes')
                      ->leftjoin('topicos','topicos.id','=','q_subscricoes.topico_id')
                      ->leftjoin('clientes','clientes.id','=','q_subscricoes.cliente_id')
                      ->select('topicos.descricao as topico','q_subscricoes.*','clientes.nome as cliente','clientes.numero as numero')
                      ->where('q_subscricoes.codigo','LIKE','%'.$texto.'%')  
                      ->OrWhere('numero','LIKE','%'.$texto.'%')  
                      ->OrWhere('clientes.nome','LIKE','%'.$texto.'%')
                      ->OrWhere('q_subscricoes.estado','LIKE','%'.$texto.'%')  
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
              $link=url('').'/admin/subscricoes/'.$post->id.'/show';

              /*if($post->estado=="activo"){
               $put="
                <button type='button'   data-href=".$post->id." class='btn btn-outline-danger btn-xs deletement'>Cancelar</button>";
              }else{
                $put="<a type='button' href='$link'  class='btn btn-outline-info btn-xs detalhes1'>Detalhes</a>";
              }*/ 

              $put="<a type='button' href='$link'  class='btn btn-outline-info btn-xs detalhes1'>Detalhes</a>";

              if($post->estado=="activo"){
                $estado="<span class='badge badge-success'>".$post->estado."</span>";
              }else if($post->estado=="cancelado"){
                    $estado="<span class='badge badge-danger'>".$post->estado."</span>";
              }else{
                $estado="<span class='badge badge-info'>".$post->estado."</span>";
              }
               // $nestedData['id'] =sprintf("%04d", $post->id)  ;
                $nestedData['cliente'] = $post->cliente;
                $nestedData['codigo'] = $post->codigo;
                $nestedData['numero'] = $post->numero; 
                $nestedData['topico'] = $post->topico; 
                $nestedData['data_inicio'] =date("d/m/Y", strtotime($post->data_inicio));  
                $nestedData['data_fim'] =date("d/m/Y", strtotime($post->data_fim));  
                $nestedData['created_at'] = date("d/m/Y", strtotime($post->created_at));
                $nestedData['pontos'] = $post->pontos; 
                $nestedData['preco'] = number_format($post->preco,2,'.',',');
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




   //Sallvando uma subscricao
   public function store(Request $request)
   {
       //$userId = \Auth::user()->id;
        $this->validate($request, [
            'numero' => 'required',
            'mensagem' => 'required',
        ]);

         $tamanho= strlen($request->mensagem);
         $data['IsTerminado'] =  "no";
         //Local para subscricoes
         if($tamanho>1){

              if($this->v_cliente_topico($request->numero,$request->mensagem)==true){

                    $data['ISClienteOrTopico'] = "yes";
                    $data['ISsubscrito'] = "yes";
                    $data['subscricao_nova'] = "no";
                    

                    $cliente=DB::table('clientes')->where('numero','=',$request->numero)->first();
                    $topicos= DB::table('topicos')->where('codigo','=',$request->mensagem)->first();

                    $SubscricaoGet= DB::table('q_subscricoes')->where([['cliente_id','=',$cliente->id],['topico_id','=',$topicos->id],['estado','=','activo']])->first();
                    
                    if($SubscricaoGet!=""){

                     
                      $data['subscricao'] =$SubscricaoGet;

                       $verficarDetalhes= DB::table('detalhes_subscricao')->where([['subscricao_id','=',$data['subscricao']->id]])->first();

                       if($verficarDetalhes!=""){
                        $data['tipo_resposta'] ="Invalida";

                        /*$data['pergunta']=DB::table('perguntas')
                        ->where('perguntas.id','=',$verficarDetalhes->pergunta_id)
                        ->select('perguntas.*')
                        ->first();*/

                         
                         $ID_perguntas=DB::table('detalhes_subscricao')->where([['subscricao_id', '=',$SubscricaoGet->id],['estado', '=','desactivo']])->pluck('pergunta_id');

                         $data['pergunta']=DB::table('perguntas')
                         ->where('perguntas.topico_id','=',$SubscricaoGet->topico_id)
                         ->whereNotIn('id', $ID_perguntas)
                         ->select('perguntas.*')
                         ->first(); 

                         $data['respostas']= DB::table('respostas')->where('pergunta_id','=',$data['pergunta']->id)->get();
 

                       }else{



                       }




                    }else{

                    $dataDo= formatDate(date("Y-m-d", strtotime("1 days")));  
                    $Total= DB::table('q_subscricoes')->where([['cliente_id','=',$cliente->id],['topico_id','=',$topicos->id]])->count();
                    $timeToset = str_replace(":","",date('H:i:s'));
                    $subscricao['codigo'] = "".$timeToset.sprintf("%03d", $cliente->id).sprintf("%04d", $Total+1);
                    $subscricao['topico_id'] =$topicos->id;
                    $subscricao['preco'] =$topicos->preco;
                    $subscricao['cliente_id'] = $cliente->id;
                    $subscricao['estado'] = 'activo';
                    $subscricao['data_inicio'] = date('Y-m-d');
                    $subscricao['data_fim'] =DbDateFormat($dataDo);
                    $subscricao['created_at'] = date('Y-m-d H:i:s');
                    $subscricaoID = DB::table('q_subscricoes')->insertGetId($subscricao);
                    $data['subscricao'] =DB::table('q_subscricoes')->where('id','=',$subscricaoID)->first();

                    $data['subscricao_nova'] = "yes";  
                    

                    //Perguntas e respostas
                    $data['pergunta']=DB::table('perguntas')
                    ->where('perguntas.topico_id','=',$topicos->id)
                    ->select('perguntas.*')
                    ->first();

                      if($data['pergunta']!=""){

                        $data['respostas']= DB::table('respostas')->where('pergunta_id','=',$data['pergunta']->id)->get();
                       
                        $subscricaoDetalhes['codigo'] =$data['subscricao']->codigo;
                        $subscricaoDetalhes['pergunta'] =$data['pergunta']->descricao;
                        $subscricaoDetalhes['subscricao_id'] = $data['subscricao']->id;
                        $subscricaoDetalhes['pergunta_id'] = $data['pergunta']->id;
                        $subscricaoDetalhes['created_at'] = date('Y-m-d H:i:s');  
                        DB::table('detalhes_subscricao')->insertGetId($subscricaoDetalhes);

                        
                      }   

                    $data['pergunta_aberta'] = "no"; 

                  }  
                

              }else{

                $data['ISClienteOrTopico'] =  "no";

              }
  
          $data['data_hora'] =  date('d-m-Y H:i:s');

         }else{
            //Somente para respostas
              if($this->v_cliente($request->numero)==true){

                 $data['IsTerminado'] =  "no";

                 

                  //topico_id -next
                  $cliente=DB::table('clientes')->where('numero','=',$request->numero)->first();

                  $topico= DB::table('topicos')->where('estado','=','activo')->first();

                  $subscricao1= DB::table('q_subscricoes')->where([['cliente_id','=',$cliente->id],['topico_id','=',$topico->id],['estado','=','activo']])->first();

                  
                  if($subscricao1!=""){
                    //Temos a subscricao 
                    $data['subscricao']=$subscricao1;

                     $respostaEmAberto= DB::table('detalhes_subscricao')->where([['subscricao_id','=',$subscricao1->id],['estado','=','activo']])->first();

                     if($respostaEmAberto!=""){
 

                     $Totalrespostas= DB::table('respostas')->where('pergunta_id','=',$respostaEmAberto->pergunta_id)->count();
                     $respost=intval($request->mensagem); 

                        if($respost>$Totalrespostas){
                          
                          $data['tipo_resposta'] ="Invalida"; 
                          //mostar pergunta em caso de opcao invalidad
                          $ID_perguntas=DB::table('detalhes_subscricao')->where([['subscricao_id', '=',$subscricao1->id],['estado', '=','desactivo']])->pluck('pergunta_id');

                          $data['pergunta']=DB::table('perguntas')
                          ->where('perguntas.topico_id','=',$subscricao1->topico_id)
                          ->whereNotIn('id', $ID_perguntas)
                          ->select('perguntas.*')
                          ->first();
                        
                          $data['respostas']= DB::table('respostas')->where('pergunta_id','=',$data['pergunta']->id)->get();
                         


                        }else{

                          //Trazendo as opcoes  
                          $respostasIDS= DB::table('respostas')->where('pergunta_id','=',$respostaEmAberto->pergunta_id)->pluck('id');
                          $descricaoAll= DB::table('respostas')->where('pergunta_id','=',$respostaEmAberto->pergunta_id)->pluck('descricao');

                          $verficarCorreta=DB::table('respostas')->where('id','=',$respostasIDS[$respost-1])->first();
                          if($verficarCorreta!=""){

                           $question= DB::table('perguntas')
                                        ->where('perguntas.id','=',$respostaEmAberto->pergunta_id)
                                        ->select('perguntas.pontos')
                                        ->first();
                            
                            if($verficarCorreta->opcao_correcta==1){
                              $dataDe['correcta'] = 'yes';
                              $dataDe['pontos'] = $question->pontos;
                            }else{
                              $dataDe['correcta'] = 'no';
                              $dataDe['pontos'] = 0;
                            }
                            
                          }

                          $dataDe['updated_at'] = date('Y-m-d H:i:s');
                          $dataDe['resposta'] = $descricaoAll[$respost-1];
                          $dataDe['resposta_id'] = $respostasIDS[$respost-1];
                          $dataDe['estado'] = 'desactivo';
                          DB::table('detalhes_subscricao')->where('id', $respostaEmAberto->id)->update($dataDe);

                          $todosRespondidas= DB::table('detalhes_subscricao')->where([['subscricao_id', '=',$subscricao1->id],['estado', '=','desactivo']])->count();
                          $todosPerguntas=DB::table('perguntas')->where('perguntas.topico_id','=',$subscricao1->topico_id)->count();
                          $resultados=$todosPerguntas-$todosRespondidas; 

                          $TotalPontos= DB::table('detalhes_subscricao') 
                          ->select(DB::raw("SUM(pontos) as total"))
                          ->where('subscricao_id', '=',$subscricao1->id) 
                          ->groupBy(DB::raw("subscricao_id"))
                          ->first();
                         
                          $dataReta['pontos'] =  $TotalPontos->total;
                          if($resultados==0){
                             $dataReta['estado'] = 'fechado';
                            
                          }
                          //actualizar subscricao 
                          DB::table('q_subscricoes')->where('id', $subscricao1->id)->update($dataReta);

                          $ID_perguntas=DB::table('detalhes_subscricao')->where([['subscricao_id', '=',$subscricao1->id],['estado', '=','desactivo']])->pluck('pergunta_id');

                          $data['pergunta']=DB::table('perguntas')
                          ->where('perguntas.topico_id','=',$subscricao1->topico_id)
                          ->whereNotIn('id', $ID_perguntas)
                          ->select('perguntas.*')
                          ->first();

                          

                          if($data['pergunta']!=""){
                                  $data['respostas']= DB::table('respostas')->where('pergunta_id','=',$data['pergunta']->id)->get();
                                  $subscricaoDetalhes1['codigo'] =$subscricao1->codigo;
                                  $subscricaoDetalhes1['pergunta'] =$data['pergunta']->descricao;
                                  $subscricaoDetalhes1['subscricao_id'] = $subscricao1->id;
                                  $subscricaoDetalhes1['pergunta_id'] = $data['pergunta']->id;
                                  $subscricaoDetalhes1['created_at'] = date('Y-m-d H:i:s');  
                                  DB::table('detalhes_subscricao')->insertGetId($subscricaoDetalhes1);

                                
                            }else{

                              $data['IsTerminado'] =  "yes";
                              $data['detalhes']=DB::table('detalhes_subscricao')
                              ->leftjoin('perguntas','perguntas.id','=','detalhes_subscricao.pergunta_id')
                              ->select('perguntas.descricao as pergunta','detalhes_subscricao.*') 
                              ->where('subscricao_id', $subscricao1->id)->get();

                            }
                        
                          

                          
                        } 
                  
                    }else{

                      $data['IsTerminado'] =  "yes";
                      $data['detalhes']=DB::table('detalhes_subscricao')
                          ->leftjoin('perguntas','perguntas.id','=','detalhes_subscricao.pergunta_id')
                          ->select('perguntas.descricao as pergunta','detalhes_subscricao.*') 
                          ->where('subscricao_id', $subscricao1->id)->get();
                    }    
                        

                        
                  }else{

                    $data['ISClienteOrTopico'] =  "no";

                  }


              }else{

                 $data['ISClienteOrTopico'] =  "no";
              }
            

        }

        $data['data_hora'] =  date('d-m-Y H:i:s');
        
        echo json_encode($data);
        exit;


  }
  
  




  public function v_cliente($numero)
  {
    
    $cliente=DB::table('clientes')->where('numero','=',$numero)->first();
    if($cliente!=""){
      return true;
    }else{

      return false;
    }  

  }

  public function v_cliente_topico($numero,$mensagem)
  {
    
    $cliente=DB::table('clientes')->where('numero','=',$numero)->first();
    $topicos= DB::table('topicos')->where('codigo','=',$mensagem)->first();

    if($topicos!="" and $cliente==""){

        $client['numero'] = $numero;
        $client['nome'] = 'Desconhecido';
        $client['estado'] = 'activo';
        $clientID = DB::table('clientes')->insertGetId($client);

        return true;
    }else if($topicos!="" and $cliente!=""){

      return true;
    }else{

      return false;

    }


  }


  public function show($id)
  {
      $data['subscricao']=DB::table('q_subscricoes')
                              ->leftjoin('topicos','topicos.id','=','q_subscricoes.topico_id')
                              ->leftjoin('clientes','clientes.id','=','q_subscricoes.cliente_id')
                              ->where('q_subscricoes.id', $id)
                              ->select('topicos.descricao as topico','q_subscricoes.*','clientes.nome as cliente','clientes.numero as numero')
                              ->first();

     $data['detalhes']=DB::table('detalhes_subscricao')
                          ->leftjoin('perguntas','perguntas.id','=','detalhes_subscricao.pergunta_id')
                          ->select('perguntas.descricao as pergunta','detalhes_subscricao.*') 
                          ->where('subscricao_id', $id)->get();

    /*
        {"pergunta":"Onde se localiza a india?","id":11,"codigo":"2312410230001","subscricao_id":5,
          "pergunta_id":1,"resposta_id":2,"estado":"desactivo","resposta":"America","correcta":null,"pontos":null,
          "preco":null,"created_at":"2020-08-21 23:12:41","updated_at":"2020-08-21 23:12:45"},
          {"pergunta":"Que e' Bill Gates","id":12,"codigo":"2312410230001","subscricao_id":5,"pergunta_id":2,"resposta_id":6,"estado":"desactivo","resposta":"Bilionario","correcta":null,"pontos":null,"preco":null,"created_at":"2020-08-21 23:12:45","updated_at":"2020-08-21 23:12:48"},{"pergunta":"Que ramo de negocio actua a NC?","id":13,"codigo":"2312410230001","subscricao_id":5,"pergunta_id":4,"resposta_id":12,"estado":"desactivo","resposta":"Desemvolvimento de sistemas",
          "correcta":null,"pontos":null,"preco":null,"created_at":"2020-08-21 23:12:48","updated_at":"2020-08-21 23:12:52"}
        
        
        */
                            


      return view('administracao.subscricoes.show',$data);
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
   


   
    /*
   public function store1(Request $request)
   {
       //$userId = \Auth::user()->id;
        $this->validate($request, [
            'numero' => 'required',
            'mensagem' => 'required',
        ]);

        
        $cliente=DB::table('clientes')->where('numero','=',$request->numero)->first();
        $topicos= DB::table('topicos')->where('codigo','=',$request->mensagem)->first();
        
        if($cliente==""){


          $client['numero'] = $request->numero;
          $client['estado'] = 'activo';
          $clientID = DB::table('clientes')->insertGetId($client);
          
        
        }else{

            $clientID=$cliente->id;
         }   


        $data['data_hora'] =  date('Y-m-d H:i:s');

        if($topicos==""){
          $data['topico'] = 0;
          
          $perGuntaAberta=DB::table('detalhes_subscricao')->where([['subscricao_id','=',$data['subscricao']->id],['estado','=','activo']])->first();
    
              if($perGuntaAberta!=""){

                   $data['pergunta_aberto'] ="yes"; 

                    $respost=  intval($request->mensagem); 
                       //Quero array the respostas
                      $respostas= DB::table('respostas')->where('pergunta_id','=',$perGuntaAberta->pergunta_id)->get();
                      $respostasCount= DB::table('respostas')->where('pergunta_id','=',$perGuntaAberta->pergunta_id)->count();
                    
                      if($respost>$respostasCount){

                        $data['tipo_resposta'] ="Invalida"; 

                      }else{
                        $data['tipo_resposta'] ="valida"; 

                      }

                  }else{

                    $data['pergunta_aberto'] ="no"; 

                  }  

        }else{
          $data['topico'] = 1;


           

                $SubscricaoGet= DB::table('q_subscricoes')->where([['cliente_id','=',$clientID],['topico_id','=',$topicos->id]])->first();
        
                if($SubscricaoGet==""){

                  $Total= DB::table('q_subscricoes')->where([['cliente_id','=',$clientID],['topico_id','=',$topicos->id]])->count();

                  $timeToset = str_replace(":","",date('H:i:s'));
                  $subscricao['codigo'] = "".$timeToset.sprintf("%03d", $clientID).sprintf("%04d", $Total+1);
                  $subscricao['topico_id'] =$topicos->id;
                  $subscricao['cliente_id'] = $clientID;
                  $subscricao['estado'] = 'activo';
                  $subscricao['data_inicio'] = date('Y-m-d');
                  $subscricao['created_at'] = date('Y-m-d H:i:s');
                  $subscricaoID = DB::table('q_subscricoes')->insertGetId($subscricao);
                  $data['subscricao'] =DB::table('q_subscricoes')->where('id','=',$subscricaoID)->first();

                  $data['subscricao_nova'] = "yes";
                  $data['pergunta_aberta'] = "no";

                }else{

                  $data['subscricao'] =$SubscricaoGet; 
                  $data['subscricao_nova'] = "no";
                  $data['pergunta_aberta'] = "yes";

                  $perGuntaAberta=DB::table('detalhes_subscricao')->where([['subscricao_id','=',$data['subscricao']->id],['estado','=','activo']])->first();

                  
                  if($perGuntaAberta!=""){

                    $respost=  intval($request->mensagem); 
                       //Quero array the respostas
                      $respostas= DB::table('respostas')->where('pergunta_id','=',$perGuntaAberta->pergunta_id)->get();
                      $respostasCount= DB::table('respostas')->where('pergunta_id','=',$perGuntaAberta->pergunta_id)->count();
                    
                      if($respost>$respostasCount){

                        $data['tipo_resposta'] ="Invalida"; 

                      }else{
                        $data['tipo_resposta'] ="valida"; 

                      }

                  }




                }

                //Perguntas e respostas
                 $data['pergunta']=DB::table('perguntas')
                                 ->where('perguntas.topico_id','=',$topicos->id)
                                ->select('perguntas.*')
                                ->first();

                  if($data['pergunta']!=""){

                    $data['respostas']= DB::table('respostas')->where('pergunta_id','=',$data['pergunta']->id)->get();


                    $verficarDetalhes= DB::table('detalhes_subscricao')->where([['subscricao_id','=',$data['subscricao']->id],['pergunta_id','=',$data['pergunta']->id]])->first();

                      if($verficarDetalhes==""){

                        $subscricaoDetalhes['codigo'] =$data['subscricao']->codigo;
                        $subscricaoDetalhes['pergunta'] =$data['pergunta']->descricao;
                        $subscricaoDetalhes['subscricao_id'] = $data['subscricao']->id;
                        $subscricaoDetalhes['pergunta_id'] = $data['pergunta']->id;
                        $subscricaoDetalhes['created_at'] = date('Y-m-d H:i:s');  
                       DB::table('detalhes_subscricao')->insertGetId($subscricaoDetalhes);

                      }

                    
                  }              

            
          }

        
          echo json_encode($data);
          exit;


   }
  */



}
