<form class="my-5" action="#" method="post">
@csrf
  <div class="d-flex justify-content-around">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome prodotto</label>
        <input type="text" value="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Prezzo</label>
        <input type="number" value="price" class="form-control" id="exampleInputPassword1">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Crea</button>
</form>