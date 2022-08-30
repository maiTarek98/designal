<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
use Auth;
class SubscribesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:subscribe-list|subscribe-delete', ['only' => ['index','store']]);
         $this->middleware('permission:subscribe-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $subscribes = Subscribe::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
            return $query->where('email', 'like', '%' . $request->search . '%');
          });
        })->orderBy('id','DESC')->paginate(5);
        return view('admin.subscribes.index',compact('subscribes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscribe  $subscribes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribes)
    {
        if($subscribes){
            $subscribes->delete();
        }
        
        return redirect()->route('subscribes.index')
                        ->with('success', trans('main.deleted successfully'));

    }
}
