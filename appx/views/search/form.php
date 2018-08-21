<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Buscar</title>
        <link rel="icon" type="image/png" href="assets/images/favicon-car.ico">
    
        <!-- CSS -->
        <!-- Jquery UI -->
        <link href="assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap 3.3.4 -->
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="assets/css/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link href="assets/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!--DATATABLE-->
        <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.min.css">
        <!--DATATABLE BUTTONS-->
        <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
        
        <!-- jQuery 2.1.4 -->
        <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        
        <!-- DATATABLE -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/js/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/js/plugins/datatables/jszip.min.js"></script>
        <script src="assets/js/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
    </head>
    
    <body class="skin-red-light sidebar-mini"
        <div class="wrapper">
            <div class="content-wrapper col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Buscar</h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group-sm col-md-12">
                                    <label class="col-md-1 control-label">Texto</label>
                                    <div class="col-md-2">
                                        <input name="texto" value="" id="texto" placeholder="Texto" class="form-control input-sm col-sm-12" tabindex="1" required="true" autocomplete="off" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary pull-right" id="buscar"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" id="search-list" style="display: none">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Listado Busqueda</h3>
                            </div>
                            <div class="box-body">
                                <table id="search-table" class="table table-bordered table-hover table-condensed table-striped table-responsive" cellspacing="0" width="100%">
                                    <thead>	
                                        <tr>
                                            <th style="width: 10%">ID</th> 
                                            <th style="width: 20%">Name</th>
                                            <th style="width: 10%">Price</th>
                                            <th style="width: 5%">Author</th>
                                            <th style="width: 5%">Category</th>
                                            <th style="width: 5%">Languaje</th>
                                            <th style="width: 10%">ISBN</th>
                                            <th style="width: 10%">Publish date</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript" src="assets/js/search.js"></script>

