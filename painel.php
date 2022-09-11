<!-- Chamado para arquivo de proteção -->

<?php

include('pro.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link rel="stylesheet" href="styleFilmes.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="tela-principal">
    <div class="header">
      <!-- Título -->
      <span>CADASTRO DE FILMES</span>
      <!-- Botão de adição -->
      <button onclick="openModal()" id="novo">Adicionar novo filme</i></button>
    </div>
      <!-- Tabela -->
    <div class="tabela-filmes">
      <table>
        <thead>
          <tr>
            <th>Filme</th>
            <th>Gênero</th>
            <th>Ano</th>
            <th>Stream</th>
            <th class="acao">Editar</th>
            <th class="acao">Excluir</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
      <!-- Ações para inserção de filme -->
    <div class="tela-modal">
      <div class="modal">
        <form>
          <label for="m-filme">Filme</label>
          <input id="m-filme" type="text" required />
  
          <label for="m-genero">Gênero</label>
          <input id="m-genero" type="text" required />
  
          <label for="m-ano">Ano</label>
          <input id="m-ano" type="number" required />

          <label for="m-stream">Stream</label>
          <input id="m-stream" type="text" required />
          <button id="btnSalvar">Salvar</button>
        </form>
      </div>
    </div>

  </div>
  <!-- Chamado para arquivo de armazenamento -->
  <script src="main.js"></script>
</body>

</html>