Partir da rota >> controller (onde estarão todas as funções e definições das variáveis) >> retorna pra view (só chama as variáveis já definidas no controller)


Exemplo
Quero criar uma página chamada 'rsrs' contendo os nomes e usuários do meu BD

No Laravel, não basta meter upar um 'rsrs.php' no public_html.
Precisamos declarar essa página nas rotas, definir as funções e as varíaveis no controller para então montar a view

1) Rotas

<?php
Route::get('/rsrs',                 'RsrsController@showUsers'); //endereço rsrs, com o controller RsRsController usando a função showUsers
?>

Agora sim o endereço 'dominio.com/rsrs' apontará pra alguma coisa. Faremos agora a lógica da página.

2) Controller
Quero fazer uma query que pegue o ID e nome de todos os usuários no meu BD

<?php
use App\DB; //aqui a conexão com DB

class RsRsController extends Controller { //estou criando a classe RsRsController, que é um Controller 

	public function showUsers() { //estou criando a função showUsers

		$users = Usuarios::all('idUser', 'name')->get(); //estou pegando todos os IDs e nomes (all) da tabela Usuários e armazenando no vetor users

		return view('rsrs', compact(['users']);
	}
}

?>
3) View 

<?php
@foreach($users as $user) {
	echo "ID: $user->idUser";
	echo "Nome: $user->name";
}

?>