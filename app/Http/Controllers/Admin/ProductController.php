<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
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
        return view('admin.product.index');

    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
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
                    $finalPath = $path.''.$filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalPath,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('message', 'Product Added Successfully');
        }catch (\Exception $exception) {
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

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();


        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $path = Storage::disk('public')->put('/images', $data['image']);
                if (File::exists($path)) {
                    File::delete($path);

                }
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
                $data['status'] = $request->status == true ? '1' : '0';
            }
            $category->update($data);
            DB::commit();
            return redirect()->route('admin.category.index')->with('message', 'Category Updated Successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
