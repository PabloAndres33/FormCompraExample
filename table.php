<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" />

  <!-- Fontawesome link -->

  <!-- Bootstrap link -->

    <title>Exibição de Dados</title>
</head>
<style>

body{
    font-family: 'arial';
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 10px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #839192 ;
  color: white;
}

#customers td, #customers th {
  /* Outros estilos existentes aqui */

  /* Evita quebra de texto nas células */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; /* Adiciona reticências (...) para conteúdo longo */
  max-width: 500px; /* Define uma largura máxima para as células, ajuste conforme necessário */
}
.filtro-label {
  font-size: 16px;
  margin-right: 10px;
}

.filtro-input {
  padding: 5px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.filtro-button {
  padding: 6px 12px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.filtro-button:hover {
  background-color: #0056b3;
}
</style>

<body>
    <h1>Dados Cadastrados</h1>

    <label for="filtroGeral" class="filtro-label">Filtrar por qualquer coluna:</label>
    <input type="text" id="filtroGeral" class="filtro-input"  onkeyup="filtrarTabela()">
    
    <table style="margin-top: 30px;" id="customers" border="1">
        <tr>
            <th>ID</th>
            <th>Requerente</th>
            <th>CPF/CNPJ</th>
            <th>Solicitado</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Rua</th>
            <th>Complemento</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Cep</th>
            <th>Pais</th>
            <th>Quantitativos de Registros</th>
            <th>Doc</th>
            <th>Relatorio</th>
            <th>Ato</th>
            <th>Empresas</th>
            <th>Tipos Juridicos</th>
            <th>Portes</th>
            <th>CNAE</th>
            <th>Municipio</th>
            <th>Data Inicio</th>
            <th>Data Fim</th>
            <th>Ultimo</th>
            <th>Listar Empresas</th>
            <th>Informações Adicionais</th>
            <!-- Adicione mais colunas conforme necessário -->
        </tr>
        <?php
        // Configurações da conexão com o banco de dados MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "requerenteCompra";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta SQL para buscar os dados da tabela formulario_compra
        $sql = "SELECT * FROM formulario_compra";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["requerente"] . "</td>";
                echo "<td>" . $row["cpf_cnpj"] . "</td>";
                echo "<td>" . $row["solicitado"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["rua"] . "</td>";
                echo "<td>" . $row["complemento"] . "</td>";
                echo "<td>" . $row["cidade"] . "</td>";
                echo "<td>" . $row["estado"] . "</td>";
                echo "<td>" . $row["cep"] . "</td>";
                echo "<td>" . $row["pais"] . "</td>";
                echo "<td>" . $row["quantitativos_registros"] . "</td>";
                echo "<td>" . $row["doc"] . "</td>";
                echo "<td>" . $row["relatorio"] . "</td>";
                echo "<td>" . $row["ato"] . "</td>";
                echo "<td>" . $row["empresas"] . "</td>";
                echo "<td>" . $row["tiposJuridicos"] . "</td>";
                echo "<td>" . $row["portes"] . "</td>";
                echo "<td>" . $row["cnae"] . "</td>";
                echo "<td>" . $row["municipio"] . "</td>";
                echo "<td>" . $row["dataInicio"] . "</td>";
                echo "<td>" . $row["dataFim"] . "</td>";
                echo "<td>" . $row["ultimo"] . "</td>";
                echo "<td>" . $row["listarEmpresas"] . "</td>";
                echo "<td>" . $row["infoAdicionais"] . "</td>";
                // Adicione mais colunas conforme necessário
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum dado encontrado.</td></tr>";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>
    </table>
    <script>
function filtrarTabela() {
  var input, filtro, tabela, linhas, colunas, valorFiltro;
  input = document.getElementById("filtroGeral");
  filtro = input.value.toUpperCase();
  tabela = document.getElementById("customers");
  linhas = tabela.getElementsByTagName("tr");

  for (var i = 1; i < linhas.length; i++) {
    colunas = linhas[i].getElementsByTagName("td");
    var encontrado = false;

    for (var j = 0; j < colunas.length; j++) {
      valorFiltro = colunas[j].textContent || colunas[j].innerText;

      if (valorFiltro.toUpperCase().indexOf(filtro) > -1) {
        encontrado = true;
        break; // Se encontrou em qualquer coluna, não precisa verificar as outras
      }
    }

    if (encontrado) {
      linhas[i].style.display = "";
    } else {
      linhas[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>
