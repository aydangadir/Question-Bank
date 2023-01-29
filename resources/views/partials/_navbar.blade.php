<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<nav id="navbar" class="navbar body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/" style="margin-left: 1%">
        Question Bank
      </a>

      {{-- <a class="nav-link active" aria-current="page" style="margin-right:2%" href="/create">Add New Question</a> --}}

      <div class="dropdown" style="background-color: #a3b174">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Create New Question
        </button>
        <ul class="dropdown-menu">
          @foreach ($types as $type)
            <li><a class="dropdown-item" href="/create/{{$type['id']}}">{{$type['questionType']}}</a></li>
          @endforeach
        </ul>
      </div>

    </div>
</nav>