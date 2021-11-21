<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>SCTI</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Page level plugin CSS-->
  <link href="{{ asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet">
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
          <span class="badge badge-danger" style="margin-left: -7px;">0</span>
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
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('user_admin_home.index')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Início</span>
        </a>
      </li>
      <div class="dropdown-divider"></div>
      <li class="nav-item dropdown">
        <a class="nav-link text-primary dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-users"></i>
          <span>Usuário</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('register')}}">Novo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item active" href="{{ route('user_admin.index')}}">Histórico</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link text-primary dropdown-toggle" href="#" id="chamadosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('register')}}">Novo usuário</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('user_admin.index')}}">Histórico de usuários</a>
          </li>
        </ol>

      </div>

      <div class="container">
        
        <div class="bg-light shadow-sm p-4 m-2">
          
          <h2 class="h4 text-secondary">Editar usuário</h2>
          <hr>
          <!-- Formulário de novo usuário -->
          <form method="POST" action="{{route('user_admin.update', $user->id)}}" enctype="multipart/form-data">
          {!! method_field('PUT') !!}  
          {{ csrf_field() }}
            <div class="form-label-group">
              
              <input type="text" name="name" id="inputTitle" class="form-control" placeholder="Nome do usuário" value="{{$user->name}}" required>
              <label for="inputTitle">Nome do usuário</label>

            </div>
            <div class="form-label-group mt-3">
              
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail do usuário" value="{{$user->email}}" required>
              <label for="inputEmail">E-mail do usuário</label>

            </div>
            <div class="form-row mt-3">
                
                <div class="form-group col-md-6">
                  
                  <select class="form-control" name="nome_empresa" id="selectEnterprise" required>
                    <option selected hidden >{{$user->nome_empresa}}</option>
                    <option value="empresax">Empresa X</option>
                    <option value="empresay">Empresa Y</option>
                    <option value="empresaz">Empresa Z</option>
                  </select>

                </div>
                <div class="form-group col-md-6">
                  
                  <select class="form-control" name="nome_setor" id="selectDepartment" required>
                    <option selected hidden>{{$user->nome_setor}}</option>
                    <option value="almoxarifado">Almoxarifado</option>
                    <option value="contabilidade">Contabilidade</option>
                    <option value="departamentopessoal">Departamento Pessoal</option>
                    <option value="diretoria">Diretoria</option>
                    <option value="financeiro">Financeiro</option>
                    <option value="medico">Médico</option>
                    <option value="recursoshumanos">Recursos Humanos</option>
                    <option value="sesmt">SESMT</option>
                  </select>

                </div>

              </div>
              <div class="form-group">
                
                <select class="form-control" name="role" id="selectEnterprise" required>
                  <option selected hidden>{{$user->role}}</option>
                  <option value="administrador">Aministrador</option>
                  <option value="tecnico">Técnico</option>
                  <option value="usuario">Usuário</option>
                </select>

              </div>
              <hr>
              <div class="text-right">
                
                <a href="{{route('user_admin.index')}}" class="btn btn-outline-danger">Cancelar</a>
                <button type="submit" class="btn btn-outline-success">Salvar</button>

              </div>

          </form>

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

  <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="{{ asset('js/sb-admin.min.js') }}"></script>

</body>

</html>
