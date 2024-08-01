<style>

        *{
            margin:0;
            padding:0;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        body{
            padding-top: 100px;
        }
        .title{
            color: #fff;
            margin-bottom: 20px;
        }
        .conteiner-campos{
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 20px;
        }
        label{
            color:#fff;
            margin: 10px 0;
        }
        .campos{
            padding-left: 5px;
            width: 250px;
            height: 30px;
            font-size: 20px;
            outline: none;
            border: none;
            border-radius: 3px;
        }
        .butao-enviar {
            margin: 20px 0;
            width: 90px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color:white;
            cursor: pointer;
        }
        #categoria {
            width: 150px;
            height: 40px;
            outline:none;
        }
        .conteiner-edit{
            margin:0 auto;
            padding: 10px 10px;
            width: 600px;
            height: auto;
            background-color:#333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }
    </style>



<div class="conteiner-edit" id="phpEdit.php">
    <?php
        if(!empty($_GET['id'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $bdname = "gestaodeInventario";
        
            $conn = new mysqli( $servername, $username, $password, $bdname);
        
            if($conn->connect_error) {
                die("Erro na conexão". $conn->connect_error);
            }
            
            $id = $_GET['id'];

            $consul = "SELECT * FROM estoque WHERE id = $id";
            $result = $conn->query($consul);

            if($result->num_rows > 0) {
                while($user_data = mysqli_fetch_assoc($result)) {
                    $id = $user_data['id'];
                    $nome_produto = $user_data['nome'];
                    $quantidade = $user_data['quantidade'];
                    $preco_produto = $user_data['preco'];
                    $data_venci = $user_data['data_venci'];
                    $categoria = $user_data['categoria'];
                }
            } else {
                header('Location: Editar.php');
            }
        }
    ?>


        <h1 class="title"> Editar produto do Estoque </h1>

        <form action="update.php" method="post" class="conteiner-campos">
                <input type="hidden" name="id" value="<?php echo $id ?>">

                <label> Nome do produto: </label>
                <input type="text" name="nome" class="campos" value="<?php echo $nome_produto ?>">

                <label> Quantidade: </label>
                <input type="number" name="quantidade" class="campos" value="<?php echo $quantidade ?>">

                <label> Preço: </label>
                <input type="number" name="preco" step="0.01" id="preco" class="campos" value="<?php echo $preco_produto ?>">

                <label> Data de validade: </label>
                <input type="date" name="data_venci" step="0.01" id="preco" class="campos" value="<?php echo $data_venci ?>">

                <label> Categoria: </label>
                <select id="categoria" name="categoria" value="<?php echo $categoria ?>">
                    <option value="Perecível"> Perecível </option>
                    <option value="Não perecível"> Não Perecível </option> 
                </select>

                <input type="submit" class="butao-enviar" name="Editar" value="Editar">
        </form>   
    </div>