@extends('products.layout')
@section('content')
    <h2 class="mt-4 mb-3">Product Edit</h2>

    {{-- 유효성 검사에 걸렸을 경우 --}}
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('products.update',$product)}}" method="post">
        {{-- 라라벨은 CSRF로 부터 보호하기 위해 데이터를 등록할 때의 위조를 체크 하기 위해 아래 코드가 필수 --}}
        @csrf
        {{-- 라라벨 patch 메서드 사용 --}}
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" autocomplete="off" value="{{$product->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea rows="10" cols="40" name="content" class="form-control" id="name" autocomplete="off">{{$product->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route("products.index")}}">
            <button type="button" class="btn btn-primary">Cancel</button>
        </a>
    </form>
@endsection