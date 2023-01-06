<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Auth;


class BackendController extends Controller
{
    public function index(): View
    {
        
        return view('backend.index');
    }
}
