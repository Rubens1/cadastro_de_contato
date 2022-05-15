<div class="container">
    <div class="logo">
        <img src="<?php echo INCLUDE_PATH; ?>img/logo.png" alt="Esferas Software Logo">
    </div><!-- Logo -->
    <h1>Lista contato</h1>
    <div class="cadastra-contato">
        <a href="<?php echo INCLUDE_PATH; ?>cadastro" class="botao-cadastro">Cadastrar Contato</a>
    </div><!-- Cadastra-contato -->
    <div class="lista-contato">
        <div class="mostra-lista">
            <div class="tabela-titulo">
                <div class="titulo">#</div><!-- Titulo -->
                <div class="titulo">Nome</div><!-- Titulo -->
                <div class="titulo">Sobrenome</div><!-- Titulo -->
                <div class="titulo">CPF</div><!-- Titulo -->
                <div class="titulo">E-mail</div><!-- Titulo -->
                <div class="titulo">Telefone</div><!-- Titulo -->
                <div class="titulo">Ação</div><!-- Titulo -->
            </div><!-- Tabela-titulo -->
            <div class="contatos">
                <?php
                    $contato = Painel::selectQuery('tb_contato');

                    foreach ($contato as $key => $value) {
                    
                ?>
                <div class="contato">
                    <div class="info-contato"><?php echo $value['id']; ?></div><!-- Info-contato -->
                    <div class="info-contato"><?php echo $value['nome']; ?></div><!-- Info-contato -->
                    <div class="info-contato"><?php echo $value['sobrenome']; ?></div><!-- Info-contato -->
                    <div class="info-contato"><?php echo $value['cpf']; ?></div><!-- Info-contato -->
                    <div class="info-contato"><?php echo $value['email']; ?></div><!-- Info-contato -->
                    <div class="info-contato"><?php echo $value['telefone']; ?></div><!-- Info-contato -->
                    <div class="info-contato">
                        <a href="<?php echo INCLUDE_PATH; ?>editar?id=<?php echo $value['id']; ?>" target="_blank" class="editar">Editar</a>
                        <span id="deletar" id_deletar="<?php echo $value['id']; ?>" class="excluir">Excluir</span>
                    </div><!-- Info-contato -->
                </div><!-- Contato -->
                <?php } ?>
            </div><!-- Contatos -->
        </div><!-- Mostra-lista -->
    </div><!-- Lista-contato -->
</div><!-- Container -->