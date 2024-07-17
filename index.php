<?php include 'db/db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Clínica</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>

<div class="topo">
    <img src="/imgs/carlalogo.png" width="300" height="300" alt="Logo" class="logo">
    <ul class="menu">
        <li><a href="?page=quem_sou">Quem Sou</a></li>
        <li><a href="?page=areas_atendimento">Áreas de Atendimento</a></li>
        <li><a href="?page=especialidades">Especialidades</a></li>
        <li><a href="?page=contato">Contato</a></li>
    </ul>
</div>

<div class="conteudo">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        
        if ($page == 'quem_sou') {
            $result = $conn->query("SELECT descricao FROM quem_sou LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='texto'>".$row['descricao']."</div>";
            }
        } elseif ($page == 'areas_atendimento') {
            $result = $conn->query("SELECT titulo, descricao FROM areas_atendimento");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='texto'><h2>".$row['titulo']."</h2><p>".$row['descricao']."</p></div>";
            }
        } elseif ($page == 'especialidades') {
            $result = $conn->query("SELECT titulo, descricao FROM especialidades");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='texto'><h2>".$row['titulo']."</h2><p>".$row['descricao']."</p></div>";
            }
        } elseif ($page == 'contato') {
            $result = $conn->query("SELECT * FROM contato LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='texto'><h2>".$row['nome_clinica']."</h2><p>".$row['endereco']."</p><p>".$row['telefone']."</p><iframe src='".$row['url_mapa']."' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'></iframe></div>";
            }
        }
    }
    ?>
</div>

</body>
</html>
