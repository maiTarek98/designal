<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;
use App\Http\Requests\Dashboard\StoreClientReviewRequest;
use App\Http\Requests\Dashboard\UpdateClientReviewRequest;
use Auth;
class ClientReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:client_review-list|client_review-create|client_review-edit|client_review-delete', ['only' => ['index','store']]);
         $this->middleware('permission:client_review-create', ['only' => ['create','store']]);
         $this->middleware('permission:client_review-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:client_review-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $client_reviews = ClientReview::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->search . '%')->orwhere('description', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.client_reviews.index',compact('client_reviews'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client_reviews.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientReviewRequest $request)
    {
        $input = $request->except('_token');
        $input['admin_id']= Auth::guard('admin')->user()->id;
        $client_review = ClientReview::create($input);
        if(request()->hasFile('user_image') && request()->file('user_image')->isValid()){
            $client_review->addMediaFromRequest('user_image')->toMediaCollection('user_image','client_reviews');
        }
        return redirect()->route('client_reviews.index')->with('success',trans('main.created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientReview  $client_reviews
     * @return \Illuminate\Http\Response
     */
    public function show(ClientReview $client_review)
    {
        return view('admin.client_reviews.show',compact('client_review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientReview  $client_reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientReview $client_review)
    {
        return view('admin.client_reviews.edit',compact('client_review'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientReviewRequest  $request
     * @param  \App\Models\ClientReview  $client_reviews
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientReviewRequest $request, ClientReview $client_review)
    {
        $input = $request->except('_token','_method');
        $client_review->update($input);
        if(request()->hasFile('user_image') && request()->file('user_image')->isValid()){
            $client_review->clearMediaCollection('user_image');
            $client_review->addMediaFromRequest('user_image')->toMediaCollection('user_image','client_reviews');
        }
        return redirect()->route('client_reviews.index')
                        ->with('success',trans('main.updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientReview  $client_reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientReview $client_review)
    {
        if($client_review){
            $client_review->clearMediaCollection('user_image');
            $client_review->delete();
        }
        
        return redirect()->route('client_reviews.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
