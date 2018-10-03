$(document).ready(function () {

    var moduloDataTable = (function () {
        function inicia() {
            $('.data-table').DataTable({
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        }
        return {
            "inicia": inicia
        }
    })();

    var moduloModalConfirmaRemocao = (function () {
        function inicia() {
            $("#modal-remover-registro").on('shown.bs.modal', function (e) {
                var $btnRemover = $(e.relatedTarget);
                var tipoDeRegistro = $btnRemover.attr("data-tipo-registro");
                var registroNome = $btnRemover.attr("data-registro-nome");
                var registroUrl = $btnRemover.attr("data-registro-url");
                $(".tipo-registro").text(tipoDeRegistro);
                $("#form-remover-registro").attr({ "action": registroUrl });
                $(".registro-nome").text(registroNome);
            });
        }

        return {
            "inicia": inicia
        }
    })();

    var moduloFormularioProdutos = (function () {

        function inicia() {
            $('.dinheiro').mask('000.000.000.000.000,00', { reverse: true });
            $('.form-produto').submit(function () {
                var $compra = $('input[name="valor_compra"]');
                var $venda = $('input[name="valor_venda"]');
                var unmaskedCompra = $compra.val().replace('.', '').replace(',', '.');;
                var unmaskedVenda = $venda.val().replace('.', '').replace(',', '.');
                $compra.val(unmaskedCompra);
                $venda.val(unmaskedVenda);
                return true;
            });
        }

        return {
            "inicia": inicia
        }
    })();

    function iniciaApp() {
        moduloDataTable.inicia();
        moduloModalConfirmaRemocao.inicia();
        moduloFormularioProdutos.inicia();
    }

    iniciaApp();

});