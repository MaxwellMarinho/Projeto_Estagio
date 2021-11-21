<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SCTI</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="{{ asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/scti-dashboard.css')}}" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-primary static-top">

    <a class="navbar-brand mr-1" href="">SCTI</a>

    <button class="btn btn-link btn-sm order-1 order-sm-0 text-white" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" id="messagesDropdown" role="button" style="cursor: pointer;">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger" style="margin-left: -7px;"><?php echo $total ?></span>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Sair</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav shadow">
      <li class="nav-item active">
        <a class="nav-link text-primary" href="">
          <i class="fas fa-fw fa-home"></i>
          <span>Início</span>
        </a>
      </li>
      <div class="dropdown-divider"></div>
      <li class="nav-item dropdown">
        <a class="nav-link text-primary dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-users"></i>
          <span>Usuário</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('register')}}">Novo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('user_admin.index')}}">Histórico</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link text-primary dropdown-toggle" href="" id="chamadosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Chamados</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="chamadosDropdown">
          <a class="dropdown-item" href="{{ route('user_admin_chamado.create')}}">Novo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('user_admin_chamado.index')}}">Histórico</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="container">
          
          <!-- Carrossel da página de início -->
          <div class="bd-example shadow-sm m-2">

              <div style="margin-top: 100px;">
                <canvas id="dashboard" width="500" height="250"></canvas>
              </div>

            </div>

          </div>

        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Projeto de Estágio 2021</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModal">Já está de saída?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" para encerrar a sessão atual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="{{ route('logout')}}">Sair</a>
        </div>
      </div>
    </div>
  </div>

    <!-- Scripts-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sb-admin.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById('dashboard');
      const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
              datasets: [{
                  label: 'Total de Chamados',
                  data: [<?php echo $jan ?>,
                         <?php echo $fev ?>,
                         <?php echo $mar ?>,
                         <?php echo $abr ?>,
                         <?php echo $mai ?>, 
                         <?php echo $jun ?>,
                         <?php echo $jul ?>,
                         <?php echo $ago ?>,
                         <?php echo $set ?>,
                         <?php echo $out ?>,
                         <?php echo $nov ?>,
                         <?php echo $dez ?>],
                  backgroundColor:['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'purple', 'pink', 'silver', 'gold', 'brown']
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    </script>

</body>

</html>
