
@extends('products.layout')

@section('content')

    <h2 class="mt-4 mb-3">Product Create</h2>

    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('products.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">title</label>
            <input type="text" name="title" class="form-control" id="title" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea rows="10" cols="40" name="content" class="form-control" id="name" autocomplete="off"></textarea>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">pwd</label>
            <input type="password" name="pwd" class="form-control" id="pwd" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection