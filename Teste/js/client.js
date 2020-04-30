function client() {
    this.url = "service/client.service.php"

    this.listClients = function(tbody) {
        tbody.empty();

        $.ajax({
            url: this.url
        }).done(function(data) {

            $.each(data, function(key, val) {
                tr = $("<tr name='result'/>");

                tr.append($("<td />").text(val.CODIGO));
                tr.append($("<td />").text(val.NOME));
                tr.append($("<td />").text(val.TIPOPESSOA));
                tr.append($("<td />").text(val.CPF_CNPJ));
                tr.append($("<td />").text(val.TELEFONE));
                tr.append($("<td />").text(val.ENDEREÇO));
                tr.append($("<td />").text(val.BAIRRO));
                tr.append($("<td />").text(val.CIDADE));
                tr.append($("<td />").text(val.UF));

                var btnEdit = $("<a name='editButton' />").attr({
                    class: "btn btn-primary floating right",
                    title: "Alterar registro",
                    href: "#modalChange"
                });

                icon = $("<i>Editar</i>").attr("class", "glyphicon glyphicon-plus");

                btnEdit.append(icon);

                btnEdit.click(function() {
                    client.openClientChange(val.CODIGO, $("#formChangeClient"));
                });

                var btnDelete = $("<a name='deleteButton'/>").attr({
                    class: "btn-floating right style",
                    style: "padding-left: 10px",
                    title: "Excluir registro",
                    href: "#"
                });
                icon = $("<i>Excluir</i>").attr("class", "btn btn-danger");

                btnDelete.append(icon);

                btnDelete.click(function() {
                    client.delete(val.CODIGO);
                });

                tdButtons = $("<td />");

                tdButtons.append(btnEdit);
                tdButtons.append(btnDelete);

                tr.append(tdButtons);

                tbody.append(tr);
            });
        });

    };

    this.delete = function(CODIGO) {
        if (confirm("Tem certeza que deseja excluir?")) {
            $.ajax({
                url: this.url + "?pass=delete&CODIGO=" + CODIGO
            }).done(function() {
                client.listClients(tableClients.find("tbody"));
            });
        }
    };

    this.register = function(form) {
        $.post(this.url + "?pass=create", form.serialize()).done(function(data) {
            if (!data.error) {
                form.each(function() {
                    this.reset();
                });
                $("#registerModal").modal('hide');
            }
            alert(data.msg);
            client.listClients(tableClients.find("tbody"));
        });
    };

    this.register = function(form) {
        $.post(this.url + "?pass=create", form.serialize()).done(function(data) {
            if (!data.error) {
                form.each(function() {
                    this.reset();
                });
                $("#registerModal").modal('hide');
            }
            alert(data.msg);
            client.listClients(tableClients.find("tbody"));
        });
    };

    this.openClientChange = function(CODIGO, form) {
        $("#cp_clientId").val(CODIGO);

        $.ajax({
            url: this.url + "?pass=clientData&CODIGO=" + CODIGO
        }).done(function(data) {

            $("#cp_clientId").val(data[0].CODIGO);
            $("#cp_clientName").val(data[0].NOME);
            $("#cp_clientType").val(data[0].TIPOPESSOA);
            $("#cp_clientDocument").val(data[0].CPF_CNPJ);
            $("#cp_clientPhone").val(data[0].TELEFONE);
            $("#cp_clientAddress").val(data[0].ENDEREÇO);
            $("#cp_clientArea").val(data[0].BAIRRO);
            $("#cp_clientCity").val(data[0].CIDADE);
            $("#cp_clientState").val(data[0].UF);

            $("#editModal").modal('show');
        });
    };

    this.changeExecute = function(form) {

        $.post(this.url + "?pass=change", form.serialize()).done(function(data) {
            if (!data.error) {
                form.each(function() {
                    this.reset();
                });
                $("#editModal").modal('hide');
            }
            alert(data.msg);
            client.listClients(tableClients.find("tbody"));
        });
    };
};