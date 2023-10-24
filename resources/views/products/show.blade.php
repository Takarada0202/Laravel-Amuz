@extends('products.layout')

@section('content')
    <h2 class="mt-4 mb-3">Product View: {{$product->title}}</h2>
    <p style="text-align: right" class="pt-2">{{$product->created_at}}</p>
    <p style="text-align: right" class="pt-2">{{$product->name}}</p>
    <div class="d-flex flex-row justify-content-end" style="width:1295px;">
        @if($product->name==Auth::user()->name)
        <form action="{{ route('products.edit',$product ) }}" method="get" style="margin: 0 20px;">
            <input type="submit" value="edit" id="editName{{$product->id}}">
            <input type="text" name="name" style="display: none" value="{{ Auth::user()->name }}">
        </form>

        <form id="deleteForm" action="{{route('products.destroy', $product->id)}}" method="post" style="display:inline-block;">
            @method('delete')
            @csrf
            <input id="pwdInput{{$product->id}}" value="delete"  name="pwd" onclick="return checDelkPwd({{ $product->id }})" type="submit"/>
            <input type="text" name="name" style="display: none" value="{{ Auth::user()->name }}">
        </form>
        @else
            <div style="height: 41.5px;"></div>
        @endif
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$product->content}}
        </div>
    </div>
@endsection
