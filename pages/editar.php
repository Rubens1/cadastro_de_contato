
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contato = MySql::conectar()->prepare("SELECT * FROM `tb_contato` WHERE id = ?");
    $contato->execute(array($id));
    $contato = $contato->fetch();
  }
?>
<div class="editar-contato">
    <form method="post" id="form-editar">
        <div class="logo">
            <img src="<?php echo INCLUDE_PATH; ?>img/logo.png" alt="Esferas Software Logo">
        </div><!-- Logo -->
        <h1>Editar contato</h1>
    <div class="grupo-campo">
        <label for="nome">Nome <span class="obrigatorio">(*)</span></label>
        <input type="text" maxlength="100" name="nome" placeholder="Digita o seu nome" value="<?php echo $contato['nome']; ?>">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="sobrenome">Sobrenome <span class="obrigatorio">(*)</span></label>
        <input type="text" maxlength="100" name="sobrenome" placeholder="Digita o seu sobrenome" value="<?php echo $contato['sobrenome']; ?>">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="cpf"  class="msg">CPF <b class="erro-campo cpf">CPF Inválido</b></label>
        <input type="text" name="cpf" id="cpf" placeholder="Digita o seu cpf" value="<?php echo $contato['cpf']; ?>">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="email" class="msg">E-mail <b class="erro-campo email">Email Inválido</b></label>
        <input id="email" maxlength="100" type="email" name="email" placeholder="Digita o seu email" value="<?php echo $contato['email']; ?>">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="telefone">Telefone <span class="obrigatorio">(*)</span></label>
        <input class="numeros" name="telefone" type="tel" placeholder="Digita o seu telefone" value="<?php echo $contato['telefone']; ?>">
    </div><!-- Grupo-campo -->
    <div class="botao-campo">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php echo $contato['id']; ?>">
       <button type="submit" id="botao-editar">Editar</button>
       <div class="resultado_editar"></div><!-- Resultado_editar -->
    </div><!-- Botao-campo -->
    <div class="lista">
        <a href="<?php echo INCLUDE_PATH; ?>" class="botao-cadastro">Lista de Contato</a>
    </div><!-- Lista -->
    </form>
</div><!-- Editar -->