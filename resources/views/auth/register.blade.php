<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
          <a class="dropdown-item active" href="">Novo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('user_admin.index')}}">Histórico</a>
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
          <li class="breadcrumb-item active">
            Novo usuário
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('user_admin.index')}}">Histórico de usuários</a>
          </li>
        </ol>

      </div>

      <div class="container">
        
        <div class="bg-light shadow-sm p-4 m-2">
          
          <h2 class="h4 text-secondary">Cadastrar usuário</h2>
          <hr>

          @if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
							</ul>
						</div>
					@endif

          <!-- Formulário de novo usuário -->
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-label-group">
              
              <input type="text" name="name" id="inputTitle" class="form-control" placeholder="Nome do usuário" required>
              <label for="inputTitle">Nome do usuário</label>

            </div>
            <div class="form-label-group mt-3">
              
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail do usuário" required>
              <label for="inputEmail">E-mail do usuário</label>

            </div>
            <div class="form-row mt-3">
              
             <div class="col-md-6">
               
              <div class="form-label-group">
              
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha do usuário" required>
                <label for="inputPassword">Senha do usuário</label>

              </div>

             </div>
             <div class="col-md-6">
               
              <div class="form-label-group">
              
                <input type="password" name="password_confirmation" id="inputPasswordValidation" class="form-control" placeholder="Repita a senha do usuário" required>
                <label for="inputPasswordValidation">Repita a senha do usuário</label>

              </div>

             </div>

            </div>
            <div class="form-row mt-3">
                
                <div class="form-group col-md-6">
                  
                  <select class="form-control" name="nome_empresa" id="selectEnterprise" required>
                    <option value="" selected hidden>Empresa</option>
                    <option value="empresax">Empresa X</option>
                    <option value="empresay">Empresa Y</option>
                    <option value="empresaz">Empresa Z</option>
                  </select>

                </div>
                <div class="form-group col-md-6">
                  
                  <select class="form-control" name="nome_setor" id="selectDepartment" required>
                    <option value="" selected hidden>Setor</option>
                    <option value="almoxarifado">Almoxarifado</option>
                    <option value="contabilidade">Contabilidade</option>
                    <option value="departamentopessoal">Departamento Pessoal</option>
                    <option value="diretoria">Diretoria</option>
                    <option value="financeiro">Financeiro</option>
                    <option value="medico">Médico</option>
                    <option value="recursoshumanos">Recursos Humanos</option>
                    <option value="sesmt">SESMT</option>
                    <option value="t.i">T.I</option>
                  </select>

                </div>

              </div>
              <div class="form-group">
                
                <select class="form-control" name="role" id="selectEnterprise" required>
                  <option value="" selected hidden>Restrição</option>
                  <option value="administrador">Aministrador</option>
                  <option value="tecnico">Técnico</option>
                  <option value="usuario">Usuário</option>
                </select>

              </div>
              <hr>
              <div class="text-right">
                
                <button type="submit" class="btn btn-outline-primary">Cadastrar</button>

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

    <!-- Scripts-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sb-admin.min.js') }}"></script>

</body>
</html>