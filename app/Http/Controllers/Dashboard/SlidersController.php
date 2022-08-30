<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\Dashboard\StoreSliderRequest;
use App\Http\Requests\Dashboard\UpdateSliderRequest;
use Auth;
class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','store']]);
         $this->middleware('permission:slider-create', ['only' => ['create','store']]);
         $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $sliders = Slider::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->search . '%')->orwhere('description', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.sliders.index',compact('sliders'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $input = $request->except('_token');
        $input['admin_id']= Auth::guard('admin')->user()->id;
        $slider = Slider::create($input);
        if(request()->hasFile('slider_image') && request()->file('slider_image')->isValid()){
            $slider->addMediaFromRequest('slider_image')->toMediaCollection('slider_image','sliders');
        }
        return redirect()->route('sliders.index')->with('success',trans('main.created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $sliders
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $sliders
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $sliders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $input = $request->except('_token','_method');
        $slider->update($input);
        if(request()->hasFile('slider_image') && request()->file('slider_image')->isValid()){
            $slider->clearMediaCollection('slider_image');
            $slider->addMediaFromRequest('slider_image')->toMediaCollection('slider_image','sliders');
        }
        return redirect()->route('sliders.index')
                        ->with('success',trans('main.updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slider  $sliders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if($slider){
            $slider->clearMediaCollection('slider_image');
            $slider->delete();
        }
        
        return redirect()->route('sliders.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
