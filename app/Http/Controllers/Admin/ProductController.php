<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));

    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        return view('admin.product.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductRequest $request)
    {

        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['status'] = $request->status == true ? '1' : '0';
            $data['trending'] = $request->trending == true ? '1' : '0';
            $product = Product::firstOrCreate([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'brand' => $data['brand'],
                'small_description' => $data['small_description'],
                'description' => $data['description'],
                'original_price' => $data['original_price'],
                'selling_price' => $data['selling_price'],
                'quantity' => $data['quantity'],
                'trending' => $data['trending'],
                'status' => $data['status'],
                'meta_title' => $data['meta_title'],
                'meta_keyword' => $data['meta_keyword'],
                'meta_description' => $data['meta_description'],
            ]);
            if ($request->hasFile('image')) {
                $path = 'storage/productImages/';

                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $imageFile->move($path, $filename);
                    $finalPath = $path . '' . $filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalPath,
                    ]);
                }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id'=> $product->id,
                        'color_id'=>$color,
                        'quantity'=>$request->colorquantity[$key] ?? 0
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('message', 'Product Added Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }


//        try {
//            DB::beginTransaction();
//            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
//            $data['status'] = $request->status == true ? '1' : '0';
//            $category = Category::firstOrCreate($data);
//            DB::commit();
//            return redirect()->route('admin.category.index')->with('message', 'Category Added Successfully');
//        } catch (\Exception $exception) {
//            DB::rollBack();
//            abort(500);
//        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();
            $data['status'] = $request->status == true ? '1' : '0';
            $data['trending'] = $request->trending == true ? '1' : '0';
            $product->update([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'brand' => $data['brand'],
                'small_description' => $data['small_description'],
                'description' => $data['description'],
                'original_price' => $data['original_price'],
                'selling_price' => $data['selling_price'],
                'quantity' => $data['quantity'],
                'trending' => $data['trending'],
                'status' => $data['status'],
                'meta_title' => $data['meta_title'],
                'meta_keyword' => $data['meta_keyword'],
                'meta_description' => $data['meta_description'],
            ]);

            if ($request->hasFile('image')) {
                $path = 'storage/productImages/';

                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $imageFile->move($path, $filename);
                    $finalPath = $path . '' . $filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalPath,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('message', 'Product Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function destroy(Product $product)
    {
        if ($product->productImages()) {
            foreach ($product->productImages() as $img) {
                if (File::exists($img->image)) {
                    File::delete($img->image);
                }
            }
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('message', 'Product Deleted Successfully');
    }

    public function destroyImage(ProductImage $productImage)
    {
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Delete');
    }


}
