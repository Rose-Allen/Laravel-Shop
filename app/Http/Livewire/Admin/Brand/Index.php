<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ];
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function storeBrand()
    {
        $data = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', "Brand Added Successfully");
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function update()
    {
        $data = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', "Brand Updated Successfully");
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        $brand = Brand::find($this->brand_id);
        $brand->delete();
        session()->flash('message', "Brand Deleted");
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $brands = Brand::paginate(10);
        return view('livewire.admin.brand.index', compact('brands'))->extends('layouts.admin')->section('content');
    }
}
