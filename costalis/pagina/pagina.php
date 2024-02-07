<?php
    session_start();
  $hostname = "localhost";
  $usuario = "root";
  $senha = "root";
  $bancodedados = "gastos";
  
  $conexao = mysqli_connect($hostname,$usuario,$senha) or die("Não foi possivel conectar");
  
  mysqli_select_db( $conexao, $bancodedados );

    // print_r($_SESSION);
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM conta WHERE id LIKE '%$data%' or `data` LIKE '%$data%' or cliente LIKE '%$data%' or categoria LIKE '%$data%' or tipo LIKE '%$data%' or valor LIKE '%$data%' or banco LIKE '%$data%' or periodoinicial LIKE '%$data%' or periodofinal LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM conta ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costalis</title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        .divcen{
            position: relative;
            margin: 0 auto;
        }
        .alin{
            position: relative;
            margin-top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        td:hover{
            background-color: #FFAA98;
        ;
        }
        .color{
            background-color: red;
        }
        .central{
            position:relative;
            padding-top: 50%;
            display: flex;
            justify-content: center;
        }
        
    </style>
</head>
<body>

<!--Programa de pesquisa-->

    <nav>
        <div>
            <h1>Sistema de Pesquisa</h1>
        </div>
    </nav>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>

    <!--Upload de arquivo -->
    <?php 
    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];
        $nomedoarquivo = $arquivo['name'];
        $extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));

        if($extensao != "csv")
        die("Tipo de arquivo não aceito");

        $path =$nomedoarquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo ["tmp_name"],$nomedoarquivo . "." . $extensao);
        if($deu_certo){
            $mysqli=("INSERT INTO conta (id,`data`,cliente,categoria,tipo,valor,banco,periodoinicial,periodofinal) VALUES ('$nomedoarquivo', $path");
            echo"<p>Arquivo enviado com sucesso</p>";
        }else
            echo"<p>Falha ao enviar arquivo</p>";
    }
    ?>
        <form method="post" enctype="multipart/form-data" action="">
            <label for="">Selecione o aruqivo</label>
            <input name="arquivo" type="file">
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg></button>
        </form>
    <!--Final do programa de upload-->

    <!--Continuação do programa de pesquisa-->    
    <div class="central">
    <div class="divcen">
        <table class="alin" border="1">
            <thead>
                <tr>
                    <th class="color">id</th>
                    <th class="color">data</th>
                    <th class="color">cliente</th>
                    <th class="color">categoria</th>
                    <th class="color">tipo</th>
                    <th class="color">valor</th>
                    <th class="color">banco</th>
                    <th class="color">periodoinicial</th>
                    <th class="color">periodofinal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['data']."</td>";
                        echo "<td>".$user_data['cliente']."</td>";
                        echo "<td>".$user_data['categoria']."</td>";
                        echo "<td>".$user_data['tipo']."</td>";
                        echo "<td>".$user_data['valor']."</td>";
                        echo "<td>".$user_data['banco']."</td>";
                        echo "<td>".$user_data['periodoinicial']."</td>";
                        echo "<td>".$user_data['periodofinal']."</td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
    </div>    
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'pagina.php?search='+search.value;
    }
</script>
</html>