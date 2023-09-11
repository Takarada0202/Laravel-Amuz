{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <h2 class="mt-4 mb-3">Product List</h2>

    <a href="{{route("products.create")}}">
        <button type="button" class="btn btn-dark" style="float: right;">Create</button>
    </a>


    <table class="table table-striped table-hover">
        <colgroup>
            <col width="15%"/>
            <col width="55%"/>
            <col width="15%"/>
            <col width="15%"/>
        </colgroup>
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $key => $product)
        <tr>
            <th scope="row">{{$key+1 + (($products->currentPage()-1) * 10)}}</th>
            <td>
                <a href="{{route("products.show", $product->id)}}">{{$product->title}}</a>
            </td>
            <td>{{$product->created_at}}</td>
            <td>
                <a href="{{route("products.edit", $product)}}">Edit</a>
                <form action="{{route('products.destroy', $product->id)}}" method="post" style="display:inline-block;">
                    @method('delete')
                    @csrf
                    <input onclick="return confirm('정말로 삭제하겠습니까?')" type="submit" value="delete"/>
                </form>
            </td>
            
        </tr>
        @endforeach
        </tbody>
    </table>

    {!! $products->links() !!}
@endsection