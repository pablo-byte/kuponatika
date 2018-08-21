
$(function () {

    $("#statistics-table").dataTable().fnDestroy();
    $("#statistics-table").dataTable({
        "sDom": "<'row'<'col-md-2'l><'col-md-8'r><'col-md-2'B>>t<'row col-sm-12'<'col-sm-4'i><'col-sm-8'p>>",
        "bProcessing": true,
        "bServerSide": true,
        "bPaginate": true,
        "sPaginationType": "full_numbers",
        "bLengthChange": true,
        "bFilter": false,
        "bSort": true,
        "iDisplayLength": 20,
        "fnServerData": function (sSource, aoData, fnCallback) {
            aoData.push(
                {"name": "keyword", "value": ""}
            );
            $.getJSON(sSource, aoData, function (json) {
                fnCallback(json);
                if (json.limit != '') {
                    var limit = json.limit.split(',');
                    $("#limit_start").val(limit[0]);
                    $("#limit_end").val(limit[1]);
                } else {
                    $("#limit_start").val(0);
                    $("#limit_end").val(-1);
                }

            });
        },
        "sAjaxSource": "statistics/statistics_table",
        "aLengthMenu": [[20], [20]],
        "aaSorting": [[1, 'DESC']],
        "aoColumns": [
            {"bVisible": true, "bSearchable": false, "bSortable": false},
            {"bVisible": true, "bSearchable": false, "bSortable": false},
            {"bVisible": true, "bSearchable": false, "bSortable": false},
            {"bVisible": true, "bSearchable": false, "bSortable": false},
        ],
        "oLanguage": {
            "oPaginate": {
                "sFirst":    "Primero",
                "sPrevious": "Anterior",
                "sNext":     "Siguiente",
                "sLast":     "Último"
            },
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sZeroRecords": "No se encontraron registros",
            "sInfo": "Mostrando _START_ a _END_ de registros _TOTAL_",
            "sInfoEmpty": "Mostrando 0 a 0 de registros 0",
            "sInfoFiltered": "(filtrado de los registros totales _MAX_)",
            "sSeachmenu": "Buscar",
            "sSearch": "Buscar:"
        },
        "buttons": []
    });
});

