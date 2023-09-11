<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    // home page
    public function home(){
        $products = News::when(request('searchItem'),function($p){
            $ser = request('searchItem');
            $p->where('title','like','%'.$ser.'%');
        })->orderBy('created_at','desc')->paginate(3);
        return view('home',compact('products'));
    }


    // create page
    public function create(Request $request){
        $this->validateRuleAndMessage($request);
        $data = $this->getData($request);


        if($request->hasFile('imageFile')){
            $fileName = uniqid().'_'.$request->file('imageFile')->getClientOriginalName();
            $request->file('imageFile')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        };
        // dd($data);

        News::create($data);
        return redirect()->route('home')->with(['createStatus'=>'Create success...']);
    }

    //show full data page
    public function show($id){
        $product = News::where('id',$id)->first();
        return view('show',compact('product'));
    }

    // delete page
    public function delete($id){
        $product = News::where('id',$id)->first(); //->delete();
        $product->delete();
        return redirect()->route('home')->with(['deleteStatus'=>'Delete success...']);
    }

    //edit
    public function edit($id){
        $product = News::where('id',$id)->first();
        return view('edit',compact('product'));
    }

    // update product data
    public function update(Request $request,$id){
        $this->validateRuleAndMessage($request);
        $data = $this->getData($request);

        // dd($request->file('imageFile'));
        if($request->hasFile('imageFile')){

            $oldImageName = News::where('id',$request->id)->first()->image;
            Storage::delete('public/'.$oldImageName);

            $imageName = uniqid().'_'.$request->file('imageFile')->getClientOriginalName();
            $request->file('imageFile')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        };


        News::where('id',$id)->update($data);
        return redirect()->route('home')->with(['updateStatus'=>'Update success...']);
    }

    // create get data from client site
    private function getData($request){
        $response = [
            'title' => $request->productName,
            'description' => $request->productDescription,
            'address' => $request->productAddress,
            'price' => $request->productPrice,
            'rating' => $request->productRating,
        ];
        return $response;
    }

    // vadilation
    private function validateRuleAndMessage($request){
        $validateRules = [
            'productName' => 'required|unique:news,title,'.$request->id,
            'productDescription' => 'required',
            'productAddress' => 'required',
            'productPrice' => 'required',
            'productRating' => 'required',
        ];
        $validateMessages = [
            'productName.required' => 'You need to fill product name.',
            'productDescription.required' => 'You need to fill description.',
            'productAddress.required' => 'You need to fill product address.',
            'productPrice.required' => 'You need to fill product price.',
            'productRating.required' => 'You need to fill product rating.'
        ];
        Validator::make($request->all(),$validateRules,$validateMessages)->validate();
    }
}
