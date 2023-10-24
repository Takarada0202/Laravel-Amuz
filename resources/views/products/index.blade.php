
{{-- layout 으로 --}}
@extends('products.layout')


{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <h2 class="mt-4 mb-3">Posts List</h2>

    <a href="{{route("products.create",Auth::user()->name)}}">
        <button type="button" class="btn btn-dark" style="float: right;">Create</button>
    </a>


    <table class="table table-striped table-hover">
        <colgroup>
            <col width="15%"/>
            <col width="70%"/>
            <col width="15%"/>
        </colgroup>
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Created At</th>
        </tr>
        </thead>
        <tbody >
        @foreach ($products as $key => $product)
        <tr style="width: 1300px; height:58.5px;">
            <th scope="row">{{$key+1 + (($products->currentPage()-1) * 5)}}</th>
            <td>
                <a href="{{route("products.show", $product->id)}}">{{$product->title}}</a>
            </td>
            <td>{{$product->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $products->onEachSide(2)->links() !!}
    </div>
@endsection
<script>
    let msg = '{{Session::get('alert')}}';
    let exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
