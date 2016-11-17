<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Thuonghieu;
use Illuminate\Http\Request;

use App\Dienthoai;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class GiohangController extends Controller
{
    //
    /**
     * HomeController constructor.
     */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chitiet()
    {

        return view('giohang.chitiet');
    }

}
