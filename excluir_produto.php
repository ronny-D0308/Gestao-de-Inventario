<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Excluir Produto </title>

    <style>
        *{
            margin:0;
            padding:0;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        body{
            padding-top: 100px;
        }
        .conteiner-form {
            margin:0 auto;
            padding: 10px 10px;
            width: 500px;
            height: auto;
            background-color:#333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }
        .title{
            color: #fff;
            margin-bottom: 20px;
        }
        .conteiner-campos{
            display: flex;
            flex-direction: column;
            align-items: start;
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
    </style>
</head>
<body>

    <div class="conteiner-form">
        <h1 class="title"> Excluir produto do Estoque </h1>

        <form action="delete.php" method="post" class="conteiner-campos">
                <label> Nome do produto: </label>
                <input type="text" name="nome_produto" class="campos" required>

                <input type="submit" class="butao-enviar" name="enviar" value="Excluir">
        </form>   
    </div> 

</body>
</html>