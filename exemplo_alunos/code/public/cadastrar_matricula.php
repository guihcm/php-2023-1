<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Mátrícula</title>
</head>

<body>
  <form action="../controller/inserir_matricula.php" method="get">

    Aluno: <br>
    <select required name="aluno_id" id="aluno_id">
      <?php
      require_once '../model/aluno_dao.php';
      $alunoDao = new AlunoDao();

      $alunos = $alunoDao->listar_tudo();

      foreach ($alunos as $aluno){
        echo "<option value='" . $aluno->id . "'>" . $aluno->nome . "</option>";
      }
      ?>
    </select>
    <br/><br>

    Turma: <br>
    <select name="turma_id" id="turma_id">
      <?php
      require_once '../model/turma_dao.php';
      $turmaDao = new TurmaDao();

      $turmas = $turmaDao->listar_tudo();

      foreach ($turmas as $turma){
        echo "<option value='" . $turma->id . "'>" . $turma->nome . "</option>";
      }
      ?>
    </select>
    <br/><br>

    Data de Matrícula: <br>
    <input required type="date" name="data_matricula" id="data_matricula"> <br><br>

    <input type="submit" value="Salvar">
  </form>
  <br>
  <a href="home.php">Cancelar</a>
</body>

</html>