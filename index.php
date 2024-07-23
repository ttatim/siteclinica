<?php
include 'db/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meu Site</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="topo">
    <img src="https://fgacarlamaria.com.br/imgs/carlalogo.jpg" alt="Logo" class="logo">
    <ul class="menu">
        <li><a href="index.php?pagina=quem_sou">Quem Sou</a></li>
        <li><a href="index.php?pagina=areas_atendimento">Áreas de Atendimento</a></li>
        <li><a href="index.php?pagina=especialidades">Especialidades</a></li>
        <li><a href="index.php?pagina=contato">Contato</a></li>
    </ul>
</div>

<div class="conteudo">
    <?php
    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];

        if ($pagina == 'quem_sou') {
            $result = $conn->query("SELECT descricao FROM quem_sou");
            if ($row = $result->fetch_assoc()) {
                echo "<div class='texto'>" . $row['descricao'] . "</div>";
            }
        } elseif ($pagina == 'areas_atendimento') {
            $result = $conn->query("SELECT titulo, descricao FROM areas_atendimento");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='texto'><h2>" . $row['titulo'] . "</h2><p>" . $row['descricao'] . "</p></div>";
            }
        } elseif ($pagina == 'especialidades') {
            $result = $conn->query("SELECT titulo, descricao FROM especialidades");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='texto'><h2>" . $row['titulo'] . "</h2><p>" . $row['descricao'] . "</p></div>";
            }
        } elseif ($pagina == 'contato') {
            $result = $conn->query("SELECT nome_clinica, endereco, telefone, url_mapa FROM contato");
            if ($row = $result->fetch_assoc()) {
                echo "<div class='texto'><h2>" . $row['nome_clinica'] . "</h2><p>" . $row['endereco'] . "</p><p>" . $row['telefone'] . "</p><iframe src='" . $row['url_mapa'] . "' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'></iframe></div>";
            }
        }
    } else {
        $result = $conn->query("SELECT keywords FROM seo");
        if ($row = $result->fetch_assoc()) {
            echo "<meta name='keywords' content='" . $row['keywords'] . "'>";
        }
        echo "<div class='texto'><h1>Bem-vindo ao Meu Site</h1></div>";
    }
    ?>
</div>

</body>
</html>
