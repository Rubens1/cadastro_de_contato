<div class="cadastro">
    <form method="post" id="form-cadastro">
        <div class="logo">
            <img src="<?php echo INCLUDE_PATH; ?>img/logo.png" alt="Esferas Software Logo">
        </div><!-- Logo -->
        <h1>Cadastra contato</h1>
    <div class="grupo-campo">
        <label for="nome">Nome <span class="obrigatorio">(*)</span></label>
        <input type="text" maxlength="100" name="nome" placeholder="Digita o seu nome">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="sobrenome">Sobrenome <span class="obrigatorio">(*)</span></label>
        <input type="text" maxlength="100" name="sobrenome" placeholder="Digita o seu sobrenome">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="cpf"  class="msg">CPF <b class="erro-campo cpf">CPF Inválido</b></label>
        <input type="text" name="cpf" id="cpf" placeholder="Digita o seu cpf">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="email" class="msg">E-mail <b class="erro-campo email">Email Inválido</b></label>
        <input id="email" maxlength="100" type="email" name="email" placeholder="Digita o seu email">
    </div><!-- Grupo-campo -->
    <div class="grupo-campo">
        <label for="telefone">Telefone <span class="obrigatorio">(*)</span></label>
        <input class="numeros" name="telefone" type="text" placeholder="Digita o seu telefone">
    </div><!-- Grupo-campo -->
    <div class="botao-campo">
        <input type="hidden" name="acao" value="salvar">
       <button type="submit" id="botao-salva">Salvar</button>
       <div class="resultado_cadastro"></div><!-- -->
    </div><!-- Botao-campo -->
    <div class="lista">
        <a href="<?php echo INCLUDE_PATH; ?>" class="botao-cadastro">Lista de Contato</a>
    </div><!-- Lista -->
    </form>
</div><!-- Cadastro -->