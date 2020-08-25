<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class ActualizarTabelas extends Migration
{
  /**
   * Run the migrations.
   * 
   * @return void
   */
  public function up()
  {   
         //quiz 
          if (Schema::hasTable('clientes')) {

          }else{

          Schema::create('clientes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo')->nullable();
          $table->string('numero',20)->nullable();
          $table->string('nome',50)->nullable();
          $table->string('estado',50)->nullable();
          $table->date('data')->nullable();
          $table->timestamps();
          });
        }

          if (Schema::hasTable('topicos')) {

          }else{
          Schema::create('topicos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo')->nullable();
          $table->double('preco')->nullable();
          $table->string('descricao')->nullable();
          $table->string('estado',20)->nullable();
          $table->date('data_inicio')->nullable();
          $table->date('data_fim')->nullable();
          $table->integer('user_register')->nullable();
          $table->integer('user_edit')->nullable();
          $table->timestamps();
          });
        }

           //Topicos clientes == subscricoes 
          if (Schema::hasTable('q_subscricoes')) {

          }else{
          Schema::create('q_subscricoes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo')->nullable();
          $table->integer('cliente_id')->nullable();
          $table->integer('topico_id')->nullable();
          $table->integer('nr_questoes')->nullable();
          $table->date('data_inicio')->nullable();
          $table->date('data_fim')->nullable();
          $table->integer('pontos')->nullable();
          $table->double('preco')->nullable();
          $table->string('estado',20)->nullable();
          $table->timestamps();
          });
        }

          //Detalhe das subscricoes

          if (Schema::hasTable('detalhes_subscricao')) {

          }else{
          Schema::create('detalhes_subscricao', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo')->nullable();
          $table->integer('subscricao_id')->nullable();
          $table->integer('pergunta_id')->nullable();
          $table->integer('resposta_id')->nullable();
          $table->string('pergunta')->nullable();
          $table->string('estado')->default('activo');
          $table->string('resposta')->nullable();
          $table->string('correcta')->nullable();
          $table->integer('pontos')->nullable();
          $table->double('preco')->nullable();
          $table->timestamps();
          });
        }


           //Detalhe das subscricoes

           if (Schema::hasTable('perguntas')) {

          }else{
          Schema::create('perguntas', function (Blueprint $table) {
          $table->increments('id');
          $table->string('descricao')->nullable();
          $table->integer('pontos')->nullable();
          $table->integer('topico_id')->nullable();
          $table->string('tipo',20)->nullable();
          $table->string('estado',20)->nullable();
          $table->string('explicacao')->nullable();
          $table->integer('user_register')->nullable();
          $table->integer('user_update')->nullable();
          $table->timestamps();
          });
        }

          
          if (Schema::hasTable('respostas')) {

          }else{
          Schema::create('respostas', function (Blueprint $table) {
          $table->increments('id');
          $table->string('descricao')->nullable();
          $table->integer('pergunta_id')->nullable();
          $table->integer('opcao_correcta')->nullable();
          $table->string('estado',20)->nullable();
          $table->integer('user_register')->nullable();
          $table->integer('user_update')->nullable();
          $table->timestamps();
          });
          
        }


         // role_user
         if (Schema::hasTable('roles')) {

        }else{

        Schema::create('roles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('display_name')->nullable();
          $table->string('description')->nullable();
          $table->timestamps();
         });
       }


      
        //criacao das tableas
        if (Schema::hasTable('role_user')) {

        }else{

        Schema::create('role_user', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->nullable();
          $table->integer('role_id')->nullable();
         });
       }
      

         //criacao das role_user
         if (Schema::hasTable('users')) {

        }else{

        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->nullable();
          $table->string('real_name')->nullable();
          $table->string('password')->nullable();
          $table->string('phone')->nullable();
          $table->string('email')->nullable();
          $table->string('picture')->nullable();
          $table->integer('user_id')->nullable();
          $table->integer('inactive')->nullable();
          $table->string('remember_token')->nullable();
          $table->timestamps();
         });
       }

       //SELECT `permission_id`, `role_id` FROM `permission_role` WHERE 1
        //criacao das role_user
        if (Schema::hasTable('permission_role')) {

        }else{

        Schema::create('permission_role', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('permission_id')->nullable();
          $table->integer('role_id')->nullable();
          });
       }


        //criacao das tableas
          if (Schema::hasTable('permissions')) {

          }else{

          Schema::create('permissions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('display_name')->nullable();
          $table->string('description')->nullable();
          $table->timestamps();
          });
       }

 }
 

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
}
