<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>
      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h1>{{$proveedor->proveedor}}</h1>
            
        </div>
        
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
           <p>{{$proveedor->calle_avenida}}, {{$proveedor->codigo_postal}},</p>
           <p>{{$proveedor->pais}}</p>
           <p>+({{$proveedor->codigo}})-{{$proveedor->numero_telefono}}</p>
        </div>

      </div>

      <div class="row" >
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
            <p>{{$proveedor->correo_electronico}}</p>
        </div>
        <div div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
            <p>{{$proveedor->pagina_web}}</p>
        </div>

        <div div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" >
            <p>Miembro Ifra: {{$proveedor->fecha_inicial}} - 
            @if (!$proveedor->fecha_final)
                Hasta la fecha
            @else 
                {{$proveedor->fecha_final}}
            @endif
        </p>
        </div>
    </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div>
               <h3>Forma Pago</h3>


               <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Plazo</th>
                    <th scope="col">Cuotas</th>
                    <th scope="col">%</th>
                  </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($forma_pago); $i++)
                    <tr>
                        <td>{{$forma_pago[$i]->nombre}}</td>
                        <td>{{$forma_pago[$i]->tipo}}</td>
                        <td>{{$forma_pago[$i]->descripcion}}</td>
                        <td>{{$forma_pago[$i]->plazo_dias}} dias</td>
                        <td>{{$forma_pago[$i]->cuotas}}</td>
                        <td>{{$forma_pago[$i]->porcentaje}}%</td>
                    </tr>
               @endfor
                </tbody>
              </table>

           </div>
           
        </div>

      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div>
                <h3>Forma Envio</h3>

                <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Transpote</th>
                        <th scope="col">Extras</th>
                        <th scope="col">Costo</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($forma_envio); $i++)
                        <tr>
                            <td>{{$forma_envio[$i]->transporte}}</td>
                            <td>
                              @if ($forma_envio[$i]->extras)
                              {{$forma_envio[$i]->extras}}
                              @else 
                              No hay extra disponible
                            @endif
                          </td>
                            <td>{{$forma_envio[$i]->coste}}$</td>
                        </tr>
                   @endfor
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div>
                <h3>Clientes Activos</h3>


                <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Nombre Cliente</th>
                        <th scope="col">Numero Contrato</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Final</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td>Cliente {{$i}}</td>
                            <td>contrato</td>
                            <td>fecha</td>
                            <td>fecha</td>
                        </tr>
                   @endfor
                    </tbody>
                  </table>
            </div>

        </div>
       </div>

       <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div>
                <h3>Ingredientes</h3>

                @for ($i = 0; $i < 7; $i++)
                    Ingrediente {{$i}} <br>
                @endfor
            </div>
     </div>
       </div>

  </body>
</html>