<?php
include 'session.php';
include '../db/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administração</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="admin-topo">
    <img src="https://fgacarlamaria.com.br/imgs/carlalogo.jpg" alt="Logo" class="logo">
</div>

<div class="admin-conteudo">
    <h1>Administração</h1>

    <form action="admin.php" method="post" class="admin-form">
        <h2>Quem Sou</h2>
        <textarea name="quem_sou" rows="5" cols="50"></textarea>
        <input type="submit" name="submit_quem_sou" value="Salvar">
    </form>

    <form action="admin.php" method="post" class="admin-form">
        <h2>Áreas de Atendimento</h2>
        <input type="text" name="titulo_area" placeholder="Título">
        <textarea name="descricao_area" rows="5" cols="50" placeholder="Descrição"></textarea>
        <input type="submit" name="submit_area" value="Salvar">
    </form>

    <form action="admin.php" method="post" class="admin-form">
        <h2>Especialidades</h2>
        <input type="text" name="titulo_especialidade" placeholder="Título">
        <textarea name="descricao_especialidade" rows="5" cols="50" placeholder="Descrição"></textarea>
        <input type="submit" name="submit_especialidade" value="Salvar">
    </form>

    <form action="admin.php" method="post" class="admin-form">
        <h2>Contato</h2>
        <input type="text" name="nome_clinica" placeholder="Nome da Clínica">
        <input type="text" name="endereco" placeholder="Endereço">
        <input type="text" name="telefone" placeholder="Telefone">
        <input type="text" name="url_mapa" placeholder="URL do Google Maps">
        <input type="submit" name="submit_contato" value="Salvar">
    </form>

    <form action="admin.php" method="post" class="admin-form">
        <h2>SEO</h2>
        <textarea name="keywords" rows="5" cols="50" placeholder="Palavras-chave"></textarea>
        <input type="submit" name="submit_seo" value="Salvar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit_quem_sou'])) {
            $descricao = $conn->real_escape_string($_POST['quem_sou']);
            $conn->query("DELETE FROM quem_sou");
            $conn->query("INSERT INTO quem_sou (descricao) VALUES ('$descricao')");
        } elseif (isset($_POST['submit_area'])) {
            $titulo = $conn->real_escape_string($_POST['titulo_area']);
            $descricao = $conn->real_escape_string($_POST['descricao_area']);
            $conn->query("INSERT INTO areas_atendimento (titulo, descricao) VALUES ('$titulo', '$descricao')");
        } elseif (isset($_POST['submit_especialidade'])) {
            $titulo = $conn->real_escape_string($_POST['titulo_especialidade']);
            $descricao = $conn->real_escape_string($_POST['descricao_especialidade']);
            $conn->query("INSERT INTO especialidades (titulo, descricao) VALUES ('$titulo', '$descricao')");
        } elseif (isset($_POST['submit_contato'])) {
            $nome = $conn->real_escape_string($_POST['nome_clinica']);
            $endereco = $conn->real_escape_string($_POST['endereco']);
            $telefone = $conn->real_escape_string($_POST['telefone']);
            $url_mapa = $conn->real_escape_string($_POST['url_mapa']);
            $conn->query("DELETE FROM contato");
            $conn->query("INSERT INTO contato (nome_clinica, endereco, telefone, url_mapa) VALUES ('$nome', '$endereco', '$telefone', '$url_mapa')");
        } elseif (isset($_POST['submit_seo'])) {
            $keywords = $conn->real_escape_string($_POST['keywords']);
            $conn->query("DELETE FROM seo");
            $conn->query("INSERT INTO seo (keywords) VALUES ('$keywords')");
        }
    }
    ?>

</div>

</body>
</html>
