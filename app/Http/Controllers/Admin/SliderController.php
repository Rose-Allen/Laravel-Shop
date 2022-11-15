<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use http\Env\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['image'] = Storage::disk('public')->put('/slider', $data['image']);
            $data['status'] = $request->status == true ? '1' : '0';
            $category = Slider::firstOrCreate($data);
            DB::commit();
            return redirect()->route('admin.slider.index')->with('message', 'Slider Added Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function edit()
    {

    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
