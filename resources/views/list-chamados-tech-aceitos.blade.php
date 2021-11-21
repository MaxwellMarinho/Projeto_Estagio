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
      <li class="nav-item dropdown">
        <a class="nav-link text-primary dropdown-toggle" href="#" id="chamadosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Chamado</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="chamadosDropdown">
          <a class="dropdown-item" href="{{ route('user_tech.index')}}">Novos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item active" href="">Andamento</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('finalizados')}}">Finalizados</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">
            Histórico de chamados
          </li>
        </ol>

        <div class="container">
          
          <div class="bg-light shadow-sm p-4 m-2">

            <h2 class="h4 text-secondary">Chamados Em Andamento</h2>
            <hr>
            <div class="table-responsive">

              <!-- Tabela de histórico de chamados -->
              <table class="table border-bottom">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Equipamento</th>
                    <th scope="col">Problema</th>
                    <th scope="col">Data</th>
                    <th scope="col"></th>
                  </tr>
                </thead>       
                <tbody>
                @foreach($chamados as $chamado)
                @if($chamado->status == 'Confirmado')
                  <tr class="table-success">
                    <th scope="row">{{$chamado->id}}</th>
                    <td>{{$chamado->titulo}}</td>
                    <td>{{$chamado->name}}</td>
                    <td>{{$chamado->equipamento}}</td>
                    <td>{{$chamado->problema}}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($chamado->updated_at))}}</td>
                    <td hidden>{{$chamado->observacao}}</td>
                    <td>
                    <a href="" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalView"
                          data-whateverid="{{$chamado->id}}"
                          data-whatevertitulo="{{$chamado->titulo}}"
                          data-whatevername="{{$chamado->name}}"
                          data-whateverequipamento="{{$chamado->equipamento}}"
                          data-whateverproblema="{{$chamado->problema}}"
                          data-whateverobservacao="{{$chamado->observacao}}">
                        <i class="fas fa-eye"></i>
                    </td>
                  </tr>
                  @endif
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

        <!-- Modal de visualização do registro -->
        <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="modalViewExample" aria-hidden="true">
          
          <div class="modal-dialog" role="document">
            
            <div class="modal-content">
              
              <div class="modal-header">
                
                <h2 class="h4 text-secondary">Chamado</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

              </div>
              <div class="modal-body">
                
                <!-- Formulário de visualização do usuário -->
                <form method="POST" action="{{ route('finalizar','finalizarChamado')}}">
                {!! method_field('PUT') !!}  
                {{ csrf_field() }}
          
                  <div class="form-label-group mb-3">
              
                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome do usuário" value="" required>
                    <label for="inputTitle">Título do chamado</label>

                  </div>
                  <div class="form-label-group mb-3">
              
                    <input type="text" name="" id="name" class="form-control" placeholder="Nome do usuário" value="" required>
                    <label for="inputUser">Nome do usuário</label>

                  </div>
                  <div class="form-label-group mb-3">
              
                    <input type="text" name="equipamento" id="equipamento" class="form-control" placeholder="Nome do usuário" value="" required>
                    <label for="recipient-titulo">Equipamento</label>

                  </div>
                  <div class="form-label-group mb-3">
              
                    <input type="text" name="problema" id="problema" class="form-control" placeholder="Nome do usuário" value="" required>
                    <label for="recipient-titulo">Problema</label>

                  </div>
                  <div class="form-group mt-3">
                
                    <textarea class="form-control noresize" name="observacao" id="observacao" placeholder="Descrição (Máximo de 300 caracteres)" rows="5"></textarea>

                  </div>

                  <div>
                    <input type="hidden" name="id" id="id" value="">
                  </div>

                  <div>
                    <input type="hidden" name="status" value="Finalizado">
                  </div>

              </div>
              
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-outline-success">Finalizar</button>
                
              </div>

              </form>

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

    <script type="text/javascript">
        $('#modalView').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Botão
            var recipient = button.data('whatever') // Extrair todo os dados e atributos
            var recipienteid = button.data('whateverid')
            var recipientetitulo = button.data('whatevertitulo')
            var recipientename = button.data('whatevername')
            var recipienteequipamento = button.data('whateverequipamento')
            var recipienteproblema = button.data('whateverproblema')
            var recipienteobservacao = button.data('whateverobservacao')

            // Recuperando dados do formulario
            var modal = $(this)
            modal.find('.modal-body #id').val(recipienteid)
            modal.find('.modal-body #titulo').val(recipientetitulo)
            modal.find('.modal-body #name').val(recipientename)
            modal.find('.modal-body #equipamento').val(recipienteequipamento)
            modal.find('.modal-body #problema').val(recipienteproblema)
            modal.find('.modal-body #observacao').val(recipienteobservacao)
        })
    </script>

</body>

</html>
