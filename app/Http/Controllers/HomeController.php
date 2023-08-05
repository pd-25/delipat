<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function siteInfo() {
        $data['siteInfo'] = DB::table('site_infos')->where('slug', 'delipat-site')->first();
        return view('admin.siteInfo', $data);
    }

    public function updateSite(Request $request) {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $data = $request->only('address', 'email', 'phone', 'logo_image', 'favicon_image');
        if (isset($data['logo_image']) && !empty($data['logo_image'])) {
            $db_image = time() . rand(0000, 9999) . '.' . $data['logo_image']->getClientOriginalExtension();
            $data['logo_image']->storeAs("public/SiteInfo", $db_image);
            $data['logo_image'] = $db_image;
        }
        if (isset($data['favicon_image']) && !empty($data['favicon_image'])) {
            $db_image = time() . rand(0000, 9999) . '.' . $data['favicon_image']->getClientOriginalExtension();
            $data['favicon_image']->storeAs("public/SiteInfo", $db_image);
            $data['favicon_image'] = $db_image;
        }
        $update = DB::table('site_infos')->where('slug', 'delipat-site')->update($data);
        if($update) {
            return back()->with('msg', 'Site information updated successfully');
        }else{
            return back()->with('msg', 'Some error occur');
        }
    }

    public function adminLogout() {
        Auth::logout();
        return redirect()->route('login')->with("msg", "Logged out successfully");
    }
}
