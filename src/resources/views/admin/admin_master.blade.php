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

        <!-- CSS do App -->
        <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Ícones -->
        <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

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

    </body>
</html>