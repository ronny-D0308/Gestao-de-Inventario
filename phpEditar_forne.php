<style>

        *{
            margin:0;
            padding:0;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        header{
            display:flex;
            flex-direction: row;
            align-items: center;
            background-color: #333;
            height: 50px;
            color: #fff;
            margin-bottom: 100px;
        }
        .conteiner-h1{
            margin: 0 auto;
        }
        a{
            color: white;
            text-decoration: none;
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

    <header>
       <div class="conteiner-h1">
            <a href="index.php"> <h1 class="title"> Gestão de Inventário </h1> </a>
        </div>
    </header>



<div class="conteiner-edit" id="phpEdit.php">
    <?php
        if(!empty($_GET['id'])) {
           include('configPHP.php');
            
            $id = $_GET['id'];

            $consul = "SELECT * FROM fornecedores WHERE id = $id";
            $result = $conn->query($consul);

            if($result->num_rows > 0) {
                while($user_data = mysqli_fetch_assoc($result)) {
                    $id = $user_data['id'];
                    $nome = $user_data['nome'];
                    $CNPJ = $user_data['CNPJ'];
                    $produto_fornecido = $user_data['produto_fornecido'];
                    $contato = $user_data['contato'];
                }
            } else {
                header('Location: cadastro_fornecedor.php');
            }
        }
    ?>


        <h1 class="title">Editar cadastro do fornecedor </h1>

        <form action="update_forne.php" method="post" class="conteiner-campos">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <label> Nome: </label>
                <input type="text" name="nome" class="campos" value="<?php echo $nome?>" required>
                <label> CNPJ: </label>
                <input type="text" name="CNPJ" class="campos" value="<?php echo $CNPJ?>" required>
                <label> Produto fornecido: </label>
                <input type="text" name="produto_fornecido" class="campos" value="<?php echo $produto_fornecido?>" required>
                <label> Contato: </label>
                <input type="number" name="contato" id="preco" class="campos" min="0" maxlength="11" value="<?php echo $contato?>" required>
                

                <input type="submit" class="butao-enviar" name="Editar" value="Editar">
        </form>  
    </div>
