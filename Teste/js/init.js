var client = new client();
var tableClients = $("#tableList");
var btnClientRegister = $("#btnClientRegister");
var btnClientChange = $("#btnClientChange");
var btnSearch = $("search");

client.listClients(tableClients.find("tbody"));

(function($) {

    $(function() {
        $('#registerModal').on('shown.bs.modal', function() {

            btnClientRegister.click(function() {
                client.register($("#formRegister"));
            });
        });
    });

    $(function() {
        $('#editModal').on('shown.bs.modal', function() {

            btnClientChange.click(function() {
                client.changeExecute($("#formEdit"));
                location.reload();
            });
        });
    });
})(jQuery);