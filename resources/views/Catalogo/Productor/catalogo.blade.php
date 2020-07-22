@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Catalogo Empresa - {{$hola}}</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <div class="row">
        <div class="col-2">
            Filtros
        </div>
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                  Buscador
          
                </div>
                <div class="card-body p-0" style="display: block;">
                  <table class="table table-striped projects">
                      <thead>
                          <tr>
                            <th style="width: 30%">
                                Nombre Producto
                                <br>
                                  <small>
                                      #CAS/Code Abre
                                  </small>
                            </th>
                            <th style="width: 20%">
                                Tipo
                                <br>
                                <small style="color: white">
                                    natural o sintetico
                                </small>
                            </th>
                            <th style="25">
                                Familia Principal
                                <br>
                                <small style="color: white">
                                    aa
                                </small>
                            </th>
                            <th style="25">
                                Familia Secundaria
                                <br>
                                <small style="color: white">
                                    aas
                                </small>
                                
                            </th>
                              <th style="width: 5%">
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              
                              <td>
                                  <a href="{{ action('FraganciaController@show', 1) }}" style="color: black">
                                      Nombre Producto
                                 
                                  <br>
                                  <small>
                                      #CAS/#ABREV
                                  </small>
                                </a>
                              </td>
                              <td>
                                  Tipo
                              </td>
                              <td>
                                  principal
                              </td>
                              <td>
                                  Secundaria
                              </td>

                              <td class="project-actions text-right">
                                  <a class="btn btn-primary btn-sm" href="{{ action('IngredienteController@show', 1) }}">
                                      <i class="fas fa-file-pdf">
                                      </i>
                                  </a>
                              </td>
                          </tr>
                          
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>

  </section>
      
@endsection
