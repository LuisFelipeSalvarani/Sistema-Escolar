<?php

require_once 'usuario-verifica.php';

?>

<?php

require_once "classes/Turma.php";

$turma = new Turma();

$lista = $turma->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com.br/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9869816a76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="voltar.css">
</head>

<body class="text-center flex-column">
    <h1 class="font-weight-bold text-dark">Sistema Acadêmico</h1>
    <h3 class="h3 mb-3 font-weight-normal">Nova Aluno</h3>
    <div class="container">
        <form action="alunos-gravar.php" enctype="multipart/form-data" method="post">
            <div class="form-row">
                <div class="form-group col-9">
                    <label class="sr-only" for="nome">Nome:</label>
                    <input class="form-control form-control-lg" type="text" name="nome" placeholder="Nome Completo">
                </div>

                <div class="form-group col-3">
                    <label class="sr-only" for="dataNasc">Data de Nascimento:</label>
                    <input class="form-control form-control-lg" type="date" name="dataNasc">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label class="sr-only" for="email">E-mail:</label>
                    <input class="form-control form-control-lg" type="email" name="email" placeholder="E-mail">
                </div>

                <div class="form-group col-3">
                    <label class="sr-only" for="cpf">CPF:</label>
                    <input class="form-control form-control-lg" type="text" name="cpf" placeholder="CPF" maxlength="14"
                        onkeyup="cpfreplace(event)">
                </div>

                <div class="form-group col-3">
                    <label class="sr-only" for="tel">Telefone:</label>
                    <input class="form-control form-control-lg" type="tel" name="tel" maxlength="15"
                        onkeyup="telefone(event)" placeholder="Telefone">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-2">
                    <label class="sr-only" for="cep">CEP:</label>
                    <input class="form-control form-control-lg" type="text" name="cep" id="cep" maxlength="9"
                        onkeyup="cepreplace(event)" onblur="pesquisacep(this.value);" placeholder="CEP">
                </div>

                <div class="form-group col-8">
                    <label class="sr-only" for="endereco">Endereço:</label>
                    <input class="form-control form-control-lg" type="text" name="endereco" id="endereco"
                        placeholder="Endereço">
                </div>

                <div class="form-group col-2">
                    <label class="sr-only" for="nCasa">Número:</label>
                    <input class="form-control form-control-lg" type="text" name="nCasa" id="nCasa"
                        placeholder="Número">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-5">
                    <label class="sr-only" for="bairro">Bairro:</label>
                    <input class="form-control form-control-lg" type="text" name="bairro" id="bairro"
                        placeholder="Bairro">
                </div>

                <div class="form-group col-6">
                    <label class="sr-only" for="cidade">Cidade:</label>
                    <input class="form-control form-control-lg" type="text" name="cidade" id="cidade"
                        placeholder="Cidade">
                </div>

                <div class="form-group col-1">
                    <label class="sr-only" for="estado">Estado:</label>
                    <input class="form-control form-control-lg" type="text" name="estado" id="estado" placeholder="UF">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label class="sr-only" for="turma_id">Turma:</label>
                    <select class="form-control form-control-lg" name="turma_id">
                        <option value=''>Selecione...</option>
                        <?php
                        foreach ($lista as $linha):
                            echo "<option value='{$linha['turma_id']}'>
                                                     {$linha['descTurma']}
                                     </option>";
                        endforeach
                        ?>
                    </select>
                </div>
                <div class="form-group form-check col-3 mt-3">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="genero" id="genero0" value="0" checked>
                        <label class="custom-control-label" for="genero0">Masculino</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="genero" id="genero1" value="1">
                        <label class="custom-control-label text-lg" for="genero1">Feminino</label>
                    </div>
                </div>

                <div class="form-group form-check col-1 mt-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="statusMat" id="statusMat">
                        <label class="custom-control-label" for="statusMat">Matrícula</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="form-group col-6">
                    <label class="h4 font-weight-normal" for="foto">Foto:</label>
                    <input class="form-control-files form-control-lg" type="file" name="foto" id="foto">
                </div>
            </div>


            <a href="../sis-escolar/alunos-listar.php" class="btn btn-lg btn-dark btn-lg px-5">Voltar</a>
            <button class="btn btn-lg btn-dark btn-lg px-5" type="submit">Gravar</button>

            <a class="btn btn-dark sair font-weight-bold" href="../sis-escolar/usuario-logout.php">Sair <i
                    class="fa-solid fa-arrow-right-from-bracket"></i></a>

            <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="../sis-escolar/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>