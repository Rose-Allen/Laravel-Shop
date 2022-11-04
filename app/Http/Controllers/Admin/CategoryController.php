<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');

    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {


        $data = $request->validated();


        try {
            DB::beginTransaction();
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $data['status'] = $request->status == true ? '1' : '0';
            $category = Category::firstOrCreate($data);
            DB::commit();
            return redirect()->route('admin.category.index')->with('message', 'Category Added Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

//            }
//        try {
////            if ($request->hasFile('image')){
////                $file = $request->file('image');
////                Category::create($data);
////                return redirect()->route('admin.category.index');
////            }
//            DB::beginTransaction();
//            if (isset($data['image'])) {
//                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
//                dd($data);
//                $category = Category::firstOrCreate($data);
//            }
//            DB::commit();
//
//        } catch (\Exception $exception) {
//            DB::rollBack();
//            abort(500);
//        }
//        return redirect()->route('admin.category.index')->with('message', 'Category Added Successfully');


//        if ($request->hasFile('image')) {
//            $file = $request->file('image');
//            Category::create($data);
//            return redirect()->route('admin.category.index');
//        }

    }
}
