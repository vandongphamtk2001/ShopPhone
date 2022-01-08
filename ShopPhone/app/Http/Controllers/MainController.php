<?php

namespace App\Http\Controllers;

use App\Http\Services\Banner\BannerService;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductClientService;

class MainController extends Controller
{
    protected $banner;
    protected $category;
    protected $product;
    protected $productDetail;
    protected $image;


    public function __construct(BannerService $banner, CategoryService $category, ProductClientService $product){
        $this->category=$category;
        $this->banner=$banner;
        $this->product=$product;
    }

    public function index()
    {
        return view('home', [
            'title'=>'Sản phẩm',
            'banners'=>$this->banner->show(),
            'categories'=>$this->category->show(),
            'phones'=>$this->product->getPhone(),
            'pins'=>$this->product->getPin(),
            'phukiens'=>$this->product->getPhuKien()
        ]);
    }
}
