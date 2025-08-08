<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8" />
        <title>Painel Administrativo | Tapeli - Template de Dashboard Responsivo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Um tema administrativo completo que pode ser usado para construir CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

        <!-- Datatables css -->
        <link href="{{asset('backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- CSS do App -->
        <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Ícones -->
        <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    </head>

    <!-- início do body -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Início da página -->
        <div id="app-layout">


            <!-- Barra Superior Início -->
            @include('admin.body.header')
            <!-- fim Barra Superior -->

            <!-- Barra Lateral Esquerda Início -->
            @include('admin.body.sidebar')
            <!-- Barra Lateral Esquerda Fim -->

            <!-- ============================================================== -->
            <!-- Início do Conteúdo da Página -->
            <!-- ============================================================== -->

            <div class="content-page">
                <!-- conteúdo -->
            @yield('admin')
               
            @include('admin.body.footer') 
            </div>
            <!-- ============================================================== -->
            <!-- Fim do Conteúdo da Página -->
            <!-- ============================================================== -->

        </div>
        <!-- FIM do wrapper -->

        <!-- Bibliotecas -->
        <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/feather-icons/feather.min.js')}}"></script>

        <!-- Apexcharts JS -->
        <script src="{{asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- para gráfico de área básico -->
        <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

        <!-- Inicialização de Widgets JS -->
        <script src="{{asset('backend/assets/js/pages/analytics-dashboard.init.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('backend/assets/js/app.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- Datatables js -->
        <script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>

        <!-- dataTables.bootstrap5 -->
        <script src="{{asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

        <!-- Datatable Demo App Js -->
        <script src="{{asset('backend/assets/js/pages/datatable.init.js')}}"></script>

        <script>
            //Mensagem indicativas de sucesso, erro, aviso ou informação
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
        </script>

    </body>
</html>