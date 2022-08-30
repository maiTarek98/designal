<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Http\Requests\Dashboard\StorePortfolioRequest;
use App\Http\Requests\Dashboard\UpdatePortfolioRequest;
use Auth;
class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:portfolio-list|portfolio-create|portfolio-edit|portfolio-delete', ['only' => ['index','store']]);
         $this->middleware('permission:portfolio-create', ['only' => ['create','store']]);
         $this->middleware('permission:portfolio-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:portfolio-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $portfolios = Portfolio::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->search . '%')->orwhere('description', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.portfolios.index',compact('portfolios'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $input = $request->except('_token');
        $input['admin_id']= Auth::guard('admin')->user()->id;
        $portfolio = Portfolio::create($input);
        if(request()->hasFile('portfolio_image') && request()->file('portfolio_image')->isValid()){
            $portfolio->addMediaFromRequest('portfolio_image')->toMediaCollection('portfolio_image','portfolios');
        }
        return redirect()->route('portfolios.index')->with('success',trans('main.created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolios
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolios
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit',compact('portfolio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfolioRequest  $request
     * @param  \App\Models\Portfolio  $portfolios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $input = $request->except('_token','_method');
        $portfolio->update($input);
        if(request()->hasFile('portfolio_image') && request()->file('portfolio_image')->isValid()){
            $portfolio->clearMediaCollection('portfolio_image');
            $portfolio->addMediaFromRequest('portfolio_image')->toMediaCollection('portfolio_image','portfolios');
        }
        return redirect()->route('portfolios.index')
                        ->with('success',trans('main.updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if($portfolio){
            $portfolio->clearMediaCollection('portfolio_image');
            $portfolio->delete();
        }
        
        return redirect()->route('portfolios.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
