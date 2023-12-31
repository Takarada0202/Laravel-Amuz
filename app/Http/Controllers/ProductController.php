<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(product $product){
        $this->product = $product;
        $this->middleware('auth');
    }

    public function index(){
        $products = $this->product->latest()->paginate(5);
        return view('products.index', compact('products'));
    }
    public function create(){
        return view('products.create');
    }

    public function createProduct(Request $request)
    {
        $request = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'content' => 'required',

        ]);
        $this->product->create($request);
        return redirect()->route('products.index');
    }
    public function show(Product $product){
        return view('products.show', compact('product'));
    }
    public function edit(Product $product, Request $request){
        $reqUserName = $request->name;
        $proUserName = $product->name;
        if($reqUserName != $proUserName) {
            return redirect()->route('products.index')->with('alert','글을 작성하시 사용자가 아닙니다.');
        } else if($reqUserName == $proUserName) {
            return view('products.edit',compact('product'));
        }
        // if($request == '' || $request == null) {
        //     return redirect()->route('products.index')->with('alert', '비밀번호을 입력해주세요');
        // } else if($request -> pwd == $product -> pwd) {
        //     return view('products.edit',compact('product'));
        // } else {
        //     return redirect()->route('products.index')->with('alert', '비밀번호가 틀렸습니다');
        // }
        // return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        $request = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $product->update($request);
        return redirect()->route('products.index', $product)->with('alert', ' 수정되었습니다.');
    }
    public function destroy(Product $product, request $request){
        $reqUserName = $request->name;
        $proUserName = $product->name;
        if($reqUserName != $proUserName) {
            return redirect()->route('products.index')->with('alert','글을 작성하시 사용자가 아닙니다.');
        } else if($reqUserName == $proUserName) {
            $product->delete();
            return redirect()->route('products.index')->with('alert', '삭제되었습니다');
        }
        // if($request == '' || $request == null) {
        //     return redirect()->route('products.index')->with('alert', '비밀번호을 입력해주세요');
        // } else if($request -> pwd == $product -> pwd) {
        //     $product->delete();
        //     return redirect()->route('products.index')->with('alert', '삭제되었습니다');
        // } else {
        //     return redirect()->route('products.index')->with('alert', '비밀번호가 틀렸습니다');
        // }
    }
}
