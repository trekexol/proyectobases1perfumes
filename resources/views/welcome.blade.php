@extends('adminlte::page')

@section('title', 'Pagina Inicio')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <span><h2>Buscar Productos: </h2></span>
            <select class="js-example-data-ajax" style="width: 100%"></select>
            
            <br>
          </div>
      
        </div>
        <div class="card-header"></div>
        <div class="row">
          
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                  <h2 class="text-center">¡Visita a nuestros Proveedores!</h2>
                  <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nunc justo, hendrerit vitae nulla quis, venenatis lobortis mi. 
                  Nam quis felis faucibus dolor dignissim fermentum. Nullam mollis mi turpis, ut viverra arcu elementum eu.
                   Donec quis mauris ultricies, rhoncus risus a, hendrerit est. Sed sed consectetur neque. Nullam sed ullamcorper dui. Donec accumsan faucibus rutrum. Ut risus odio, ornare sit amet fringilla at, facilisis at velit. Praesent eu augue eros. Nunc faucibus ipsum at mauris feugiat, in finibus neque dapibus. Vestibulum ut hendrerit nunc. Donec quis enim ligula. Aenean euismod porta quam, eget egestas ante dapibus in. Vivamus nec fermentum nisi, id maximus eros. </p>
                  <h4 class="text-center"><a href="{{action('ProveedorController@index')}}" >Ver más</a></h4>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                  <h2 class="text-center">¡Visita a nuestros Productores!</h2>
                  <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nunc justo, hendrerit vitae nulla quis, venenatis lobortis mi. 
                    Nam quis felis faucibus dolor dignissim fermentum. Nullam mollis mi turpis, ut viverra arcu elementum eu.
                     Donec quis mauris ultricies, rhoncus risus a, hendrerit est. Sed sed consectetur neque. Nullam sed ullamcorper dui. Donec accumsan faucibus rutrum. Ut risus odio, ornare sit amet fringilla at, facilisis at velit. Praesent eu augue eros. Nunc faucibus ipsum at mauris feugiat, in finibus neque dapibus. Vestibulum ut hendrerit nunc. Donec quis enim ligula. Aenean euismod porta quam, eget egestas ante dapibus in. Vivamus nec fermentum nisi, id maximus eros. </p>
                    <h4 class="text-center"><a href="{{action('ProductorController@index')}}" >Ver más</a></h4>
                </div>
              </div>
            </div>
        </div>
  
          </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    <div class="card-header">
      <div class="row">
        <div class="col-4">
          <h2>Recomendados<h2>
        </div>
  
        <div class="col-8">
          Filtros
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="wrapper">
      
      <div class="carousel">
        @for ($i = 0; $i < 7; $i++)
        <div class="container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Square_200x200.png">
            <h6 style="width: 200px" class="text-center">Nombre Producto</h6>
            <h6 style="width: 200px" class="text-center"><strong>Perfumista</strong></h6>
        </div>
        @endfor
      </div>
    </div>
  </section>
@stop



@section('css')
@stop

@section('js')
<script>

$(".js-example-data-ajax").select2({
  ajax: {
    languaje: 'es',
    url: "https://api.github.com/search/repositories",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
      params.page = params.page || 1;

      return {
        results: data.items,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: true
  },
  placeholder: 'Ingrese #CAS, nombre o #Fragancia',
  minimumInputLength: 1,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection
});

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='select2-result-repository clearfix'>" +
      "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
      "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'></div>" +
        "<div class='select2-result-repository__description'></div>" +
        "<div class='select2-result-repository__statistics'>" +
          "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
          "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
          "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
        "</div>" +
      "</div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(repo.full_name);
  $container.find(".select2-result-repository__description").text(repo.description);
  $container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
  $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
  $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

  return $container;
}

function formatRepoSelection (repo) {
  return repo.full_name || repo.text;
}

$(document).ready(function(){
  $('.carousel').slick({
  slidesToShow: 3,
  dots:true,
  centerMode: true,
  centerPadding: '60px',
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
  });
});
</script>
@stop