<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>

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
    </style>
</head>
<body>

    <div class="conteiner-form">
        <h1 class="title"> Adicionar produto ao Estoque </h1>

        <form action="phpAdicionar.php" method="post" class="conteiner-campos">
                <label> Nome do produto: </label>
                <input type="text" name="nome_produto" class="campos" required>
                <label> Quantidade: </label>
                <input type="number" name="quantidade" class="campos" required>
                <label> Preço: </label>
                <input type="number" name="preco" step="0.01" id="preco" class="campos" required>
                <label> Data de validade: </label>
                <input type="date" name="data_venci" step="0.01" id="preco" class="campos" >

                <label> Categoria: </label>
                <select id="categoria" name="categoria" require>
                    <option value="Perecível"> Perecível </option>
                    <option value="Não perecível"> Não Perecível </option> 
                </select>

                <input type="submit" class="butao-enviar" name="enviar" value="Adicionar">
        </form>   
    </div> 

</body>
</html>