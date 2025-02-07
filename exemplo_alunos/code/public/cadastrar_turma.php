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
  <title>Cadastro de Turma</title>
</head>

<body>
  <form action="../controller/inserir_turma.php" method="get">
    Nome: <br>
    <input required type="text" name="nome" id="nome"> <br><br>

    Curso: <br>
    <select required name="curso_id" id="curso_id">
      <?php
      require_once '../model/curso_dao.php';
      $cursoDao = new CursoDao();

      $cursos = $cursoDao->listar_tudo();

      foreach ($cursos as $curso){
        echo "<option value='" . $curso->id . "'>" . $curso->nome . "</option>";
      }
      ?>
    </select>

    <br>
    <br>

    <input type="submit" value="Salvar">
  </form>
  <br>
  <a href="home.php">Cancelar</a>
</body>

</html>