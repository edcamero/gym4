<nav class="col-md-3  d-md-block bg-light sidebar">
        <div class="sidebar-sticky ">
          <ul class="nav flex-column ">
           

                <li class="nav-item py-2">
                    <a class="nav-link" href="">
                    <i class="fas fa-chalkboard-teacher"> </i>
                    <span class="pl-1">Panel de Control</span>
                  </a>
                </li>

                @can('listar-empleado')
                <li class="nav-item ">
                  <a class="nav-link collapsed" data-toggle="collapse" data-target="#empleado" aria-expanded="false" aria-controls="empleado">
                        <i class="fas fa-user-tie"></i>
                      <span class="pl-1">Gestion Empleado</span>
                   </a>
                   
                        <div class="collapse pb-2" id="empleado">
                              <ul class="flex-column pl-2 nav">
                                
                                @can('listar-tipo-empleado')
                                <li class="nav-item"><a class="nav-link py-0" href="{{ route('listar-tipo-empleado') }}">
                                      Gestion de Tipos
                                    </a> 
                                  </li>
                                @endcan


                                  @can('listar-empleado')
                                <li class="nav-item"><a class="nav-link py-0" href="{{ route('listar-empleado') }}">
                                    Consultar Empleado
                                  </a>
                                </li>
                                  @endcan

                                @can('guardar-empleado')
                                <li class="nav-item"><a class="nav-link py-0" href="{{ route('create-empleado') }}">
                                      Agregar Empleado
                                    </a> 
                                  </li>
                                @endcan

                                @can('editar-empleado')
                                <li class="nav-item"><a class="nav-link py-0" href="{{ route('horarios-empleado') }}">
                                      Horarios Empleado
                                    </a> 
                                  </li>
                                @endcan

                                
                               
                               

                              </ul>
                            </div>

                  </li>
                
               @endcan

               @can('listar-cliente')
                <li class="nav-item ">
                  <a class="nav-link collapsed" data-toggle="collapse" data-target="#cliente" aria-expanded="false" aria-controls="cliente">
                      <i class="fas fa-users"></i>
                      <span class="pl-1">Gestion Cliente</span>
                   </a>
                   
                        <div class="collapse pb-2" id="cliente">
                              <ul class="flex-column pl-2 nav">
                                @can('listar-tipo-cliente')
                                <li class="nav-item"><a class="nav-link py-0" href="{{ route('listar-tipo-cliente') }}">
                                      Gestion de Tipos
                                    </a> 
                                  </li>
                                @endcan

                                
                              </ul>


                              
                            </div>

                  </li>
                
               @endcan

                @can('listar-tipo-documento')
                <li class="nav-item py-2">
                  <a class="nav-link" href="{{ route('listar-tipo-documento') }}">
                    <i class="fas fa-passport"></i>
                  <span class="pl-1">Gestion Tipo Documento</span>
                </a>
              </li>
              @endcan

                @can('listar-horario')
                <li class="nav-item py-2">
                  <a class="nav-link" href="{{ route('listar-empleado') }}">
                    <i class="far fa-clock"></i>
                  <span class="pl-1">Horarios</span>
                </a>
              </li>
              @endcan
            
            
            
           
            
          </ul>
  
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            </a>
          </h6>
         
        </div>
      </nav>


    