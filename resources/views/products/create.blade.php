
@extends('products.layout')

@section('content')

    <h2 class="mt-4 mb-3">Post Create</h2>

    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('create.Product')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea rows="10" cols="40" name="content" class="form-control" id="content" autocomplete="off"></textarea>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" name="pwd" class="form-control" id="pwd" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
