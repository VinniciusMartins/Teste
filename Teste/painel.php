<!DOCTYPE html>
<html>

<head>
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="col col-sm-12" style="background-color:#323232 ">
  <nav class="navbar navbar-expand-lg " style="background-color:#ff1e56">
    <img class="" src="./assets/logovirtua.png">
    </a>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal" style="font-size: 1rem; margin-left:30px; background-color:#323232">Cadastrar cliente</button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 43%;">
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" id="search" name="search" style="background-color:#323232; color:white" type="search" placeholder="Pesquisar" aria-label="Search">
        <button type="button" class="btn btn-primary" data-toggle="modal" style="background-color:#323232; margin-left:45px" data-target=".bd-example-modal-sm">Logout</button>
      </form>
    </div>
  </nav>
  </div>
  <div class="container col col-sm-12">
    <div class="row">
      <div class="col col-sm-12">
        <table class="table table-striped table-dark" id="tableList" style="margin-top: 20px">
          <thead>
            <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Nome</th>
              <th data-field="personType">Pessoa Física/Júridica</th>
              <th data-field="document">CPF/CNPJ</th>
              <th data-field="phone">Telefone</th>
              <th data-field="address">Endereço</th>
              <th data-field="area">Bairro</th>
              <th data-field="city">Cidade</th>
              <th data-field="state">Estado</th>
              <th data-field="actions width=" 140">-</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal" id="registerModal" tabindex="-1" role="dialog">
    <form class="formRegister" id="formRegister" method="post">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cadastrar cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <input id="clientName" name="NOME" placeholder="Nome" maxlength="50" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="clientType" name="TIPOPESSOA" maxlength="1" placeholder="Pessoa fisica/juridica" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="clientDocument" name="CPF_CNPJ" maxlength="14" placeholder="CPF/CNPJ" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="clientPhone" name="TELEFONE" maxlength="14" placeholder="Telefone" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="clientAddress" name="ENDERECO" maxlength="80" placeholder="Endereço" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="clientArea" name="BAIRRO" maxlength="50" placeholder="Bairro" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="clientCity" name="CIDADE" maxlength="50" placeholder="Cidade" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="clientState" name="UF" maxlength="2" placeholder="Estado" type="text" style="margin-bottom:20px; margin-left:10px" required>
          </div>

          <div class="modal-footer">
            <a href="#" type="button" id="btnClientRegister" class="btn btn-primary">Salvar alterações</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="modal" id="editModal" tabindex="-1" role="dialog">
    <form class="formEdit" id="formEdit" method="post">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cadastrar cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <input id="cp_clientName" name="NOME" placeholder="Nome" maxlength="50" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="cp_clientType" name="TIPOPESSOA" maxlength="1" placeholder="Pessoa fisica/juridica" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="cp_clientDocument" name="CPF_CNPJ" maxlength="14" placeholder="CPF/CNPJ" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="cp_clientPhone" name="TELEFONE" maxlength="14" placeholder="Telefone" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="cp_clientAddress" name="ENDEREÇO" maxlength="80" placeholder="Endereço" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="cp_clientArea" name="BAIRRO" maxlength="50" placeholder="Bairro" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="cp_clientCity" name="CIDADE" maxlength="50" placeholder="Cidade" type="text" style="margin-bottom:20px; margin-left:10px" required>
            <input id="cp_clientState" name="UF" maxlength="2" placeholder="Estado" type="text" style="margin-bottom:20px; margin-left:10px" required>
          </div>

          <div class="modal-footer">
            <a href="#" type="button" id="btnClientChange" class="btn btn-primary">Salvar alterações</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
      <input type="hidden" name="CODIGO" id="cp_clientId" value="0">
    </form>
  </div>
  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="margin-left:45px">Deseja mesmo sair?</h5>
        </div>
        <div class="modal-footer ">
            <a href="logout.php"  style="margin-right: 60px"  type="button" class="btn btn-primary">Sim</a>
            <button type="button" style="margin-right: 50px"class="btn btn-secondary" data-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>

  <script src="./jquery-3.5.0.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/client.js"></script>
  <script src="js/init.js"></script>
</body>

</html>

<script>
  $(document).ready(function() {
    $("#search").on("keyup", function() {
      var result = document.getElementsByName("result");
      var value = $(this).val().toLowerCase();

      $(result).filter(function() {

        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>