<div class="card my-3">
        <ul class="list-group list-group-flush">
            @if($products)
                @foreach($products as $key => $value)
                    <li class="list-group-item">
                        {{$value['name']}}
                        <span class="float-end">
                            <a type="button" class="btn btn-outline-info" href="#">Info</a>
                            <a type="button" class="btn btn-outline-danger" href="#">Cancella</a>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>