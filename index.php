<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requerente = $_POST["requerente"];
    $cpf_cnpj= $_POST["cpf_cnpj"];
    $solicitado= $_POST["solicitado"];
    $telefone= $_POST["telefone"];
    $rua= $_POST["rua"];
    $complemento= $_POST["complemento"];
    $cidade= $_POST["cidade"];
    $estado= $_POST["estado"];
    $cep= $_POST["cep"];
    $country= $_POST["country"];
    $email= $_POST["email"];

    // Configurações da conexão com o banco de dados MySQL
    $servername = "localhost"; // Altere para o endereço do seu servidor MySQL
    $username = "root"; // Altere para o nome de usuário do MySQL
    $password = "";   // Altere para a senha do MySQL
    $dbname = "requerenteCompra"; // Altere para o nome do seu banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Insere os dados do formulário no banco de dados
    $quantitativos_registros = isset($_POST["quantitativos_registros"]) ? implode(", ", $_POST["quantitativos_registros"]) : "";
    $doc = isset($_POST["doc"]) ? implode(", ", $_POST["doc"]) : "";
    $relatorio = isset($_POST["relatorio"]) ? implode(", ", $_POST["relatorio"]) : "";
    $ato = isset($_POST["ato"]) ? implode(", ", $_POST["ato"]) : "";
    $empresas = isset($_POST["empresas"]) ? implode(", ", $_POST["empresas"]) : "";
    $tiposJuridicos = isset($_POST["tiposJuridicos"]) ? implode(", ", $_POST["tiposJuridicos"]) : "";
    $portes = isset($_POST["portes"]) ? implode(", ", $_POST["portes"]) : "";
    $cnae = isset($_POST["cnae"]) ? implode(", ", $_POST["cnae"]) : "";
    $municipio = isset($_POST["municipio"]) ? implode(", ", $_POST["municipio"]) : "";
    $dataInicio = $_POST["dataInicio"];
    $dataFim = $_POST["dataFim"];
    $ultimo = isset($_POST["ultimo"]) ? implode(", ", $_POST["ultimo"]) : "";
    $listarEmpresas = $_POST["listarEmpresas"];
    $infoAdicionais = $_POST["infoAdicionais"];

    $sql = "INSERT INTO formulario_compra (requerente, cpf_cnpj, solicitado, telefone, rua, complemento, cidade, estado, cep, pais, email,
            quantitativos_registros, doc, relatorio, ato, empresas, tiposJuridicos, portes, cnae, municipio, dataInicio, dataFim,
            ultimo, listarEmpresas, infoAdicionais)
            VALUES ('$requerente', '$cpf_cnpj', '$solicitado', '$telefone', '$rua', '$complemento', '$cidade', '$estado', '$cep', '$country', '$email',
            '$quantitativos_registros', '$doc', '$relatorio', '$ato', '$empresas', '$tiposJuridicos', '$portes', '$cnae', '$municipio',
            '$dataInicio', '$dataFim', '$ultimo', '$listarEmpresas', '$infoAdicionais')";

    if ($conn->query($sql) === TRUE) {
        header("Location: form.html");
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
