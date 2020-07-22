<form action="/exampleCRUD" method="GET" autocomplete="off">
  @csrf
  <div class="form-group">
    <div class="input-group input-group-sm ">
      <input type="text" placeholder="Buscar" name="search" class="form-control">
      <span class="input-group-append">
        <button class="btn btn-info btn-flat" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </span>
    </div>
  </div>

</form>