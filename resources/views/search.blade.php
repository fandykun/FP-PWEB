<form action="{{URL::to('/search')}}" method="POST" class="form-inline mx-auto" role="search">
    {{ csrf_field() }}
    <input type="text" class="typeahead form-control mr-sm-2" name="query" placeholder="Find your product"
        aria-label="search">
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
</form>