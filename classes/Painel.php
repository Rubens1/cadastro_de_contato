<?php
	
	class Painel
	{
	
		
		/*
			Carregamento de paginas do revendedor dinamico
		*/

		public static function carregarPagina(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');
				}else{
					//Página não existe!
					include('pages/404.php');
				}
			}else{
				include('pages/home.php');
			}
		}
		

		/*
			Alerta de ação dos formularios 
		*/

		public static function alert($tipo,$mensagem){
			switch ($tipo) {
				case 'sucesso':
					echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
					break;
				
				case 'erro':
					echo '<div class="box-alert erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';
					break;
				case 'atencao':
					echo '<div class="box-alert atencao"><i class="fas fa-exclamation-triangle"></i> '.$mensagem.'</div>';
					break;
			}
			
		}


		/*
			Deletar uma informação de uma tabela
		*/

		public static function deletar($tabela,$id=false){
			if($id == false){
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
			}else{
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
			}
			$sql->execute();
		}

		/*
			Redirecionar a pessoa para uma pagina
		*/

		public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		/*
			Metodo especifico para selecionar multiplos registros com base na query.
		*/

		public static function selectQuery($table,$query = '',$arr = ''){
			if($query != false){
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
				$sql->execute($arr);
			}else{
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table`");
				$sql->execute();
			}
			return $sql->fetchAll();
		}

		
		/*
			Redireicionar o usuario para uma pagina em um curto periodo
		*/
		public static function redirecionar($dir){
			echo "<meta http-equiv='refresh' content='3; url={$dir}'>";
			die();
		}
	}

?>