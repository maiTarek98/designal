<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Charts\UserChart;
use App\Models\Admin;
use App\Models\Service;
use Location;
use App\Models\GeneralSettings;
use DB;
use App;
class HomeController extends Controller
{
    public function index(GeneralSettings $settings)
    {
        $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $usersChart = new UserChart;
        $usersChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $usersChart->dataset(trans('main.usersChart'), 'line', $users)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        $ip = Admin::orderBy('id','DESC')->take(10)->get();
        $admin_ip=[];
        foreach($ip as $val){
            array_push($admin_ip, Location::get($val->ip_address));
        }
        $adminsCount = Admin::count();
        $usersCount = User::count();
        $categorysCount = Service::count();
        return view('admin.home' , compact('usersChart','adminsCount','usersCount','categorysCount','admin_ip','settings'));
    }

    public function loginPage(GeneralSettings $settings){
        return view('admin.login', compact('settings'));
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                        ->with('success',trans('main.signed in'));
        }
        return redirect("admin/login")->with('error',trans('main.invalid data'));

    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect("admin/login")->with('error',trans('main.logout success'));
    }


    function changeLang($langcode){
    
      App::setLocale($langcode);
      session()->put("lang_code",$langcode);
      return redirect()->back();
  }  
    public function notifications(){
        $data = Auth::guard('admin')->user()->notifications()->select('type','id','data','created_at')->orderBy('id','DESC')->get();

        return view('admin.notifications', compact('data'));
    }

    public function read($id){
        $data = DB::table('notifications')->where('id',$id)->update([
            'read_at' => now(),
        ]);

        return redirect()->back();
    }

}
