<?php

return [
	'create' => 'Criar',
	'save' => 'Salvar',
	'edit' => 'Editar',
	'view' => 'Vizualizar',
	'update' => 'Actualizar',
	'list' => 'Lista',
	'no_entries_in_table' => 'Nenhuma entrada na tabela',
	'custom_controller_index' => 'Custom controller index.',
	'logout' => 'Sair',
	'add_new' => 'Novo',
	'are_you_sure' => 'Are you sure?',
	'back_to_list' => 'Voltar',
	'dashboard' => 'Dashboard',
	'delete' => 'Apagar',
	'quickadmin_title' => 'QuizSys',

	'user-management' => [
		'title' => 'Configurações',
		'fields' => [
		],
	],

    'test' => [
        'new' => 'Responder ao Quiz',
    ],

	'roles' => [
		'title' => 'Função do usuário',
		'fields' => [
			'title' => 'Função',
		],
	],

	'users' => [
		'title' => 'Usuários',
		'fields' => [
			'name' => 'Nome',
			'email' => 'Email',
			'password' => 'Senha',
			'role' => 'Função',
			'remember-token' => 'Remember token',
		],
	],

	'user-actions' => [
		'title' => 'Logs de sessão',
		'fields' => [
			'user' => 'Usuário',
			'action' => 'Acção',
			'action-model' => 'Action model',
			'action-id' => 'Action id',
		],
	], 
	
	'topics' => [
		'title' => 'Tópicos',
		'fields' => [
			'title' => 'Titulo',
		],
	],

	'questions' => [
		'title' => 'Questões',
		'fields' => [
			'topic' => 'Tópico',
			'question-text' => 'Question text',
			'code-snippet' => 'Code snippet',
			'answer-explanation' => 'Answer explanation',
			'more-info-link' => 'More info link',
		],
	],

	'questions-options' => [
		'title' => 'Opções das Questões  ',
		'fields' => [
			'question' => 'Questão',
			'option' => 'Opção',
			'correct' => 'correcta',
		],
	],

	'results' => [
		'title' => 'Meus Resultados',
		'fields' => [
			'user' => 'Usuário',
			'question' => 'Questão',
			'correct' => 'correcta',
			'date' => 'Data',
			'result' => 'Pontuação',
		],
	],

	'laravel-quiz' => 'Responder ao Quiz',
	'quiz' => 'Responda a estas perguntas. Não há limite de tempo',
	'submit_quiz' => 'Submeter',
	'view-result' => 'Ver resultado',

];
