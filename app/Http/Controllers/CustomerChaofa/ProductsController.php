<?php

namespace App\Http\Controllers\CustomerChaofa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tyrechaofa;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    
    public function product_tyre(Request $request) {
        $NUM_PAGE = 10;
        $tyres = Tyrechaofa::where('stock','!=','0')->OrderBy('size','asc')->get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/customer/chaofa/customer_tyre')->with('page',$page)
                                                     ->with('NUM_PAGE',$NUM_PAGE)
                                                     ->with('tyres',$tyres);
    }
}
