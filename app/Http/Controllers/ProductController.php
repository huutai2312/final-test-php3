<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Product;
    use App\Models\Category;

    class ProductController extends Controller
    {
        public function index()
        {
            $products = Product::orderBy('views', 'desc')->get();
            return view('product', compact('products'));
        }

        public function create()
        {
            $categories = Category::all();
            return view('create', compact('categories'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'detail' => 'nullable|string',
                'price' => 'required|numeric',
                'image' => 'nullable|image',
                'category_id' => 'required|exists:categories,id',
            ]);

            $product = new Product();
            $product->title = $request->title;
            $product->description = $request->description;
            $product->detail = $request->detail;
            $product->price = $request->price;
            if ($request->hasFile('image')) {
                $product->image = $request->file('image')->store('images');
            }
            $product->category_id = $request->category_id;
            $product->save();

            return redirect('/products');
        }

    }
