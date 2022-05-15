<?php
    include_once('../config.php');

    //Cadastra contato
    if(isset($_POST['acao']) && $_POST['acao'] == 'salvar'){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        if($nome == ''){
            Painel::alert('erro','O campo nome esta vazio');
        }else if($sobrenome == ''){
            Painel::alert('erro','O campo sobrenome esta vazio');
        }else if($telefone == ''){
            Painel::alert('erro','O campo telefone esta vazio');
        }else{
            $contato = MySql::conectar()->prepare("SELECT * FROM `tb_contato` WHERE telefone = ?");
            $contato->execute(array($telefone));
            if($contato->rowCount() > 0){
                Painel::alert('erro','Já tem um usuário com esse telefone');
            }else{
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_contato` VALUES (null,?,?,?,?,?)");
                $sql->execute(array($nome,$sobrenome,$cpf,$email,$telefone));
                Painel::alert('sucesso','Usuário salvo com sucesso');
            }
        }
    }

    //Excluir contato
    if(isset($_POST['acao']) && $_POST['acao'] == 'deleta'){
        $id = $_POST['id'];
        Painel::deletar('tb_contato', $id);
    }

    //Editar contato
    if(isset($_POST['acao']) && $_POST['acao'] == 'editar'){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        if($nome == ''){
            Painel::alert('erro','O campo nome esta vazio');
        }else if($sobrenome == ''){
            Painel::alert('erro','O campo sobrenome esta vazio');
        }else if($telefone == ''){
            Painel::alert('erro','O campo telefone esta vazio');
        }else{
            $sql = MySql::conectar()->prepare("UPDATE `tb_contato` SET  nome = ?, sobrenome = ?, cpf = ?, email = ?, telefone = ? WHERE id = $id");
            $sql->execute(array($nome, $sobrenome, $cpf, $email, $telefone));
    
            Painel::alert('sucesso', 'Contado editado com sucesso');
        }
    }
?>