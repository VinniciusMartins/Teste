<?php

require('Db.class.php');
$db = new Db;

$pass = (isset($_GET['pass'])) ? $_GET['pass'] : 'list';

switch ($pass) {

    case 'list': {
        listClient($db);
        break;
    }
    case 'login': {
            loginClient($db);
            break;
        }
    case 'delete': {
            deleteClient($db);
            break;
        }
    case 'change': {
            changeClient($db);
            break;
        }
    case 'create': {
            createClient($db);
            break;
        }
    case 'clientData': {
            dataClient($db);
            break;
        }
    default: {
            loginClient($db);
            break;
        }
}

function listClient($db)
{
    $sql = sprintf('SELECT 
                            CODIGO,	NOME, TIPOPESSOA, CPF_CNPJ,	
                            TELEFONE, ENDEREÇO, BAIRRO, CIDADE, UF
                        FROM
                            Cliente');

    $query = $db->con->prepare($sql);
    $query->execute();

    response($query->fetchAll(PDO::FETCH_ASSOC));
}

function deleteClient($db)
{
    $clientId = (int) $_GET['CODIGO'];
    $sql = sprintf('DELETE FROM
                            Cliente
                        WHERE
                            CODIGO = :CODIGO');

    $query = $db->con->prepare($sql);
    $query->bindParam(':CODIGO', $clientId);
    $query->execute();

    if ($query->rowCount() == 0) {
        $return = array(
            "error" => true,
            "msg"  => "nenhum registro excluído"
        );
    } else {
        $return = array(
            "error" => true,
            "msg"  => "Registro excluído"
        );
    }

    response($return);
}

function changeClient($db)
{
    $clientId = (int) $_POST['CODIGO'];
    $clientName = trim($_POST['NOME']);
    $clientType = trim($_POST['TIPOPESSOA']);
    $clientDocument = trim($_POST['CPF_CNPJ']);
    $clientPhone = trim($_POST['TELEFONE']);
    $clientAddress = trim($_POST['ENDEREÇO']);
    $clientArea = trim($_POST['BAIRRO']);
    $clientCity = trim($_POST['CIDADE']);
    $clientState = trim($_POST['UF']);

    if (
        $clientName == "" && $clientType == "" && $clientDocument == "" && $clientPhone == ""
        && $clientAddress == "" && $clientArea == "" && $clientCity == "" && $clientState == ""
    ) {
        response(array(
            "erindexror" => true,
            "msg" => "Todos os campos devem ser preenchidos!"
        ));
    }

    $sql = sprintf('UPDATE Cliente
                            SET
                        	    NOME       = :NOME, 
                                TIPOPESSOA = :TIPOPESSOA, 
                                CPF_CNPJ   = :CPF_CNPJ,	
                                TELEFONE   = :TELEFONE, 
                                ENDEREÇO   = :ENDERECO, 
                                BAIRRO     = :BAIRRO, 
                                CIDADE     = :CIDADE, 
                                UF         = :UF
                            WHERE
                                CODIGO = :CODIGO');

    $query = $db->con->prepare($sql);
    $query->bindParam(':CODIGO', $clientId);
    $query->bindParam(':NOME', $clientName);
    $query->bindParam(':TIPOPESSOA', $clientType);
    $query->bindParam(':CPF_CNPJ', $clientDocument);
    $query->bindParam(':TELEFONE', $clientPhone);
    $query->bindParam(':ENDERECO', $clientAddress);
    $query->bindParam(':BAIRRO', $clientArea);
    $query->bindParam(':CIDADE', $clientCity);
    $query->bindParam(':UF', $clientState);
    $query->execute();

    if ($query->rowCount() == 0) {
        $return = array(
            "error" => true,
            "msg" => "Nenhum registro alterado"
        );
    } else {
        $return = array(
            "error" => false,
            "msg" => "Registro alterado"
        );
    }

    response($return);
}

function createClient($db)
{

    $clientName = trim($_POST['NOME']);
    $clientType = trim($_POST['TIPOPESSOA']);
    $clientDocument = trim($_POST['CPF_CNPJ']);
    $clientPhone = trim($_POST['TELEFONE']);
    $clientAddress = trim($_POST['ENDERECO']);
    $clientArea = trim($_POST['BAIRRO']);
    $clientCity = trim($_POST['CIDADE']);
    $clientState = trim($_POST['UF']);

    if (
        $clientName == "" && $clientType == "" && $clientDocument == "" && $clientPhone == ""
        && $clientAddress == "" && $clientArea == "" && $clientCity == "" && $clientState == ""
    ) {
        response(array(
            "error" => true,
            "msg" => "Todos os campos devem ser preenchidos!"
        ));
    }

    $sql = sprintf('INSERT INTO Cliente
                                (NOME,TIPOPESSOA,CPF_CNPJ,TELEFONE,ENDEREÇO,BAIRRO,CIDADE,UF)
                            VALUES
                                (:NOME,:TIPOPESSOA,:CPF_CNPJ,:TELEFONE,:ENDERECO,:BAIRRO,:CIDADE,:UF)');

    $query = $db->con->prepare($sql);
    $query->bindParam(':NOME', $clientName);
    $query->bindParam(':TIPOPESSOA', $clientType);
    $query->bindParam(':CPF_CNPJ', $clientDocument);
    $query->bindParam(':TELEFONE', $clientPhone);
    $query->bindParam(':ENDERECO', $clientAddress);
    $query->bindParam(':BAIRRO', $clientArea);
    $query->bindParam(':CIDADE', $clientCity);
    $query->bindParam(':UF', $clientState);
    $query->execute();

    if ($query->rowCount() == 0) {
        $return = array(
            "error" => true,
            "msg" => "Nenhum registro inserido"
        );
    } else {
        $return = array(
            "error" => false,
            "msg" => "Registro cadastrado"
        );
    }

    response($return);
}

function dataClient($db)
{
    $clientId = (int) $_GET['CODIGO'];
    $sql = sprintf('SELECT 
                            CODIGO,	NOME, TIPOPESSOA, CPF_CNPJ,	
                            TELEFONE, ENDEREÇO, BAIRRO, CIDADE, UF
                        FROM
                            Cliente
                        WHERE
                            CODIGO = :CODIGO');

    $query = $db->con->prepare($sql);
    $query->bindParam(':CODIGO', $clientId);
    $query->execute();

    response($query->fetchAll(PDO::FETCH_ASSOC));
}

function loginClient($db)
{

    $login = $_POST['login'];

    $password = $_POST['senha'];

    if ($login != "login" || $password!= "senha") {
        $return = array(
            "error" => true,
            "msg" => "Bem vindo!"
        );
    } else {
        $return = array(
            "error" => false,
            "msg" => "Usuário ou Senha inválido!"
        );
    }
    response($return);
}
function response($data)
{
    header("Content-type: application/json");
    echo json_encode($data);
    exit;
}
