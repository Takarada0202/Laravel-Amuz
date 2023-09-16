
{{-- layout 으로 --}}
@extends('products.layout')


{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <h2 class="mt-4 mb-3">Posts List</h2>

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
                <form id="deleteForm" action="{{route('products.destroy', $product->id)}}" method="post" style="display:inline-block;">
                    @method('delete')
                    @csrf
                    <input id="pwdInput{{$product->id}}" value="delete"  name="pwd" onclick="return checkPwd({{ $product->id }})" type="submit"/>
                </form>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection
<script>
    function checkPwd(num){
        let pwd = prompt("삭제하시겠습니까?(글작성시 입력한 비밀번호을 입력해주세요)")
        document.getElementById("pwdInput"+num).value=pwd
    }
    let msg = '{{Session::get('alert')}}';
    let exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
