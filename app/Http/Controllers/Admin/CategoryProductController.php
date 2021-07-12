<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    private $product, $category;

    public function __construct(Product $product, Category $category) {
        $this->product = $product;
        $this->category = $category;
    }

    public function index($idProduct){
        $product = $this->product->find($idProduct);


        if(!$product){
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.index', compact('product', 'categories'));
    }

    public function categoriesAvailable(Request $request, $idProduct){
        $filters = $request->except('_token');
        
        $product = $this->product->find($idProduct);

        if(!$product){
            return redirect()->back();
        }
        
        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', compact('product', 'categories', 'filters'));
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);


        if(!$product){
            return redirect()->back();
        }

        if(!$request->categories || count($request->categories) == 0){
            return redirect()->back()->with('error', 'Nenhum plano foi selecionado!');
        }

        $product->categories()->attach($request->categories);
        
        return redirect()->route('products.categories.index', $idProduct);
    }

    public function detachCategoryProduct($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if(!$product || !$category){
            return redirect()->back();
        }

        $product->categories()->detach($category);

        return redirect()->route('products.categories.index', $idProduct);
    }

    public function products($idCategory){
        $category = $this->category->find($idCategory);

        if(!$category){
            return redirect()->back();
        }

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }
}