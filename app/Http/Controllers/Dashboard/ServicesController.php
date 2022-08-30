<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\Dashboard\StoreServiceRequest;
use App\Http\Requests\Dashboard\UpdateServiceRequest;
use Auth;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','store']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $services = Service::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->search . '%')->orwhere('description', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.services.index',compact('services'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $input = $request->except('_token');
        $input['admin_id']= Auth::guard('admin')->user()->id;
        $service = Service::create($input);
        if(request()->hasFile('service_image') && request()->file('service_image')->isValid()){
            $service->addMediaFromRequest('service_image')->toMediaCollection('service_image','services');
        }
        return redirect()->route('services.index')->with('success',trans('main.created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $input = $request->except('_token','_method');
        $service->update($input);
        if(request()->hasFile('service_image') && request()->file('service_image')->isValid()){
            $service->clearMediaCollection('service_image');
            $service->addMediaFromRequest('service_image')->toMediaCollection('service_image','services');
        }
        return redirect()->route('services.index')
                        ->with('success',trans('main.updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service){
            $service->clearMediaCollection('service_image');
            $service->delete();
        }
        
        return redirect()->route('services.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
