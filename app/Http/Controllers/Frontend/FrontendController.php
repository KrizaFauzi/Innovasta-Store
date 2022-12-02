<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status','0')->get();
        $categories = Category::where('status','0')->get();
        $trendingProducts = Product::where('trending','1')->latest()->take(15)->get();
        $newArrivalsProducts = Product::latest()->take(14)->get();
        $featuredProducts = Product::where('featured','1')->latest()->take(14)->get();

        // Best Selling Products
        $items = DB::table('order_items')
                        ->select('product_id',DB::raw('COUNT(product_id) AS count'))
                        ->groupBy('product_id')
                        ->orderBy("count",'DESC')
                        ->get();
        $product_ids = [];
        foreach ($items as $item)
        {
            array_push($product_ids,$item->product_id);
        }
        $best_sellings = Product::whereIn('id',$product_ids)->get();
        // End Best Selling Products

        // Top Rated Products
        $items_rated = DB::table('ratings')
                        ->select('product_id',DB::raw('AVG(rating) as count'))
                        ->groupBy('product_id')
                        ->orderBy("count",'DESC')
                        ->get();
        $product_ids = [];
        foreach($items_rated as $item)
        {
            array_push($product_ids,$item->product_id);
        }
        $best_rated = Product::whereIn('id',$product_ids)->get();
        // End Top Rated Products

        return view('frontend.index', compact('sliders','categories','trendingProducts','newArrivalsProducts','featuredProducts','best_sellings','best_rated'));
    }

    public function searchProducts(Request $request)
    {
        if ($request->search) {

            $searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            
            return redirect()->back()->with('message','Empty Search');
        }
    }

    public function newArrival()
    {
        $newArrivalsProducts = Product::latest()->take(16)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalsProducts'));
    }

    public function mostBuyed()
    {
        // Best Selling Products
        $items = DB::table('order_items')
                        ->select('product_id',DB::raw('COUNT(product_id) AS count'))
                        ->groupBy('product_id')
                        ->orderBy("count",'DESC')
                        ->get();
        $product_ids = [];
        foreach ($items as $item)
        {
            array_push($product_ids,$item->product_id);
        }
        $best_sellings = Product::whereIn('id',$product_ids)->get();
        // End Best Selling Products
        return view('frontend.pages.most-buyed', compact('best_sellings'));
    }

    public function topRated()
    {
        // Top Rated Products
        $items_rated = DB::table('ratings')
                        ->select('product_id',DB::raw('AVG(rating) as count'))
                        ->groupBy('product_id')
                        ->orderBy("count",'DESC')
                        ->get();
        $product_ids = [];
        foreach($items_rated as $item)
        {
            array_push($product_ids,$item->product_id);
        }
        $best_rated = Product::whereIn('id',$product_ids)->get();
        // End Top Rated Products
        return view('frontend.pages.top-rated', compact('best_rated'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured','1')->latest()->get();
        return view('frontend.pages.featured-products', compact('featuredProducts'));
    }

    public function categories()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if($category){

            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if($category)
        {
            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if($product)
            {
                return view('frontend.collections.products.view', compact('product','category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }
}
