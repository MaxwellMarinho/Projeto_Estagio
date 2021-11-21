<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SCTI</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Page level plugin CSS-->
  <link href="{{ asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
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
          <a class="dropdown-item" href="{{ route('register')}}">Novo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item active" href="">Histórico</a>
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
            <a href="{{ route('register')}}">Novo usuário</a>
          </li>
          <li class="breadcrumb-item active">
            Histórico de usuários
          </li>
        </ol>

        <div class="container">
          
          <div class="bg-light shadow-sm p-4 m-2">

            <h2 class="h4 text-secondary">Histórico de usuários</h2>
            <hr>
            <div class="table-responsive">

              <!-- Tabela de histórico de chamados -->
              <table class="table border-bottom">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Cadastro</th>
                    <th scope="col">Restrição</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                  <tr>
                    <th scope="row">{{$usuario->id}}</th>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->nome_empresa}}</td>
                    <td>{{$usuario->nome_setor}}</td>
                    <td>{{$usuario->data}}</td>
                    <td>{{$usuario->role}}</td>
                    <td>
                    <a href="" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalEdit"
                          data-whateverid="{{$usuario->id}}"
                          data-whatevername="{{$usuario->name}}"
                          data-whateveremail="{{$usuario->email}}"
                          data-whatevernome_empresa="{{$usuario->nome_empresa}}"
                          data-whatevernome_setor="{{$usuario->nome_setor}}"
                          data-whateverrole="{{$usuario->role}}">
                        <i class="fas fa-eye"></i>
                      </a>
                    <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modalDelete"   
                          data-whateverid="{{$usuario->id}}">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>

              <!-- Paginação -->
              <nav>
                <ul class="pagination justify-content-end">
                  <li class="page-item disabled">
                    <a href="#" class="page-link" tabindex="-1">
                      Anterior
                    </a>
                  </li>
                  <li class="page-item active">
                    <a href="" class="page-link">1</a>
                  </li>
                  <li class="page-item">
                    <a href="" class="page-link">2</a>
                  </li>
                  <li class="page-item">
                    <a href="" class="page-link">3</a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link">
                      Próximo
                    </a>
                  </li>
                </ul>
              </nav>

            </div>

          </div>

        </div>

        <!-- Modal de edição do registro -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditExample" aria-hidden="true">
          
          <div class="modal-dialog" role="document">
            
            <div class="modal-content">
              
              <div class="modal-header">
                
                <h2 class="h4 text-secondary">Editar usuário</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

              </div>
              <div class="modal-body">
                
                <!-- Formulário de edição do usuário -->
                <form method="POST" action="{{ route('user_admin.update','test')}}">
                {!! method_field('PATCH') !!}  
                {{ csrf_field() }}
                  <div class="form-label-group">
              
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome do usuário" value="Thiago Marinho" required>
                    <label for="inputTitle">Nome do usuário</label>

                  </div>
                  <div class="form-label-group mt-3">
              
                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail do usuário" value="thiagopindola@gmail.cu" required>
                    <label for="inputEmail">E-mail do usuário</label>

                  </div>
                  <div class="form-row mt-3">
                
                    <div class="form-group col-md-6">
                  
                      <select class="form-control" name="nome_empresa" id="nome_empresa" required>
                        <option value="" selected hidden></option>
                        <option value="empresax">Empresa X</option>
                        <option value="empresay">Empresa Y</option>
                        <option value="empresaz">Empresa Z</option>
                      </select>

                    </div>
                    <div class="form-group col-md-6">
                  
                      <select class="form-control" name="nome_setor" id="nome_setor" required>
                        <option value="" selected hidden></option>
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
                
                    <select class="form-control" name="role" id="role" required>
                      <option value="" selected hidden></option>
                      <option value="administrador">Aministrador</option>
                      <option value="tecnico">Técnico</option>
                      <option value="usuario">Usuário</option>
                    </select>

                  </div>

                  <div>
                    <input type="hidden" name="id" id="id" value="">
                  </div>

              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success">Alterar</button>

              </div>

              </form>

            </div>

          </div>

        </div>

        <!-- Modal de exclusão do registro -->
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalEditExample" aria-hidden="true">
          
          <div class="modal-dialog" role="document">
            
            <div class="modal-content">
              
              <div class="modal-header">
                
                <h2 class="h4 text-secondary">Deletar</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

              </div>
              <div class="modal-body">
                
                <!-- Formulário de Excluir usuário -->
                <form method="POST" action="{{ route('user_admin.destroy','test')}}">
                {!! method_field('DELETE') !!}  
                {{ csrf_field() }}

                  <div class="form-label-group">
              
                  Você realmente deseja <strong>excluir</strong> este usuário do Sistema? Esta ação é irreversível!

                  </div>

                  <div>
                    <input type="hidden" name="id" id="id" value="">
                  </div>

              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success">Excluir</button>

              </div>

              </form>

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
  <script type="text/javascript" src="{{ asset('/js/jquery.easing.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/js/sb-admin.min.js') }}"></script>

  <!-- Modal de Editar-->
  <script type="text/javascript">
        $('#modalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Botão
            var recipient = button.data('whatever') // Extrair todos os dados e atributos
            var recipienteid = button.data('whateverid')
            var recipientename = button.data('whatevername')
            var recipienteemail = button.data('whateveremail')
            var recipientenome_empresa = button.data('whatevernome_empresa')
            var recipientenome_setor = button.data('whatevernome_setor')
            var recipienterole = button.data('whateverrole')

            // Recuperando dados do formulario
            var modal = $(this)
            modal.find('.modal-body #id').val(recipienteid)
            modal.find('.modal-body #name').val(recipientename)
            modal.find('.modal-body #email').val(recipienteemail)
            modal.find('.modal-body #nome_empresa').val(recipientenome_empresa)
            modal.find('.modal-body #nome_setor').val(recipientenome_setor)
            modal.find('.modal-body #role').val(recipienterole)
        })

        //Modal de Excluir

        $('#modalDelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Botão
            // Extrair todos os dados e atributos
            var recipienteid_delete = button.data('whateverid')

            // Recuperando dados do formulario
            var modal = $(this)
            modal.find('.modal-body #id').val(recipienteid_delete)
        })

        </script>

</body>

</html>
