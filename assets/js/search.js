$(function () {
    
    $("#buscar").click(function () {
        var keyword = $("#texto").val();
        if(!keyword) {
            alert("Debe Ingresar un texto");
            return false;
        } else {
            $("#search-list").show();
            $("#search-table").dataTable().fnDestroy();
            $("#search-table").dataTable({
                "sDom": "<'row'<'col-md-2'l><'col-md-8'r><'col-md-2'B>>t<'row col-sm-12'<'col-sm-4'i><'col-sm-8'p>>",
                "bProcessing": true,
                "bServerSide": true,
                "bPaginate": true,
                "sPaginationType": "full_numbers",
                "bLengthChange": true,
                "bFilter": false,
                "bSort": true,
                "iDisplayLength": 10,
                "fnServerData": function (sSource, aoData, fnCallback) {
                    aoData.push(
                        {"name": "keyword", "value": keyword}
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
                "sAjaxSource": "search/search_table",
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todas"]],
                "aaSorting": [[0, 'DESC']],
                "aoColumns": [
                    {"bVisible": true, "bSearchable": false, "bSortable": false},
                    {"bVisible": true, "bSearchable": true, "bSortable": false},
                    {"bVisible": true, "bSearchable": true, "bSortable": false},
                    {"bVisible": true, "bSearchable": true, "bSortable": false},
                    {"bVisible": true, "bSearchable": true, "bSortable": false},
                    {"bVisible": true, "bSearchable": true, "bSortable": false},
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
        }
        
    });

});

