@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/category/create" class="btn btn-warning my-3">Create Category</a>
        @endif
    @endif
    {{-- TODO:Change card-deck to column --}}
    <div class="card-deck">
        @foreach ($categories as $category)
            <div class="card bg-dark text-white">
                <a href="/category/{{$category->id}}" class="text-white">
                    <img src="/storage/coverCategories/{{$category->coverCategory}}" style="max-width:1108px; max-height:170px;" alt="category image" class="card-img">
                    <div class="card-img-overlay">
                        <h4 class="card-title">{{$category->name}}</h4>
                        
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    
@endsection