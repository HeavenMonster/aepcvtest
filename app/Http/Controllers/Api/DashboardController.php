<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\DashboardView;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DashboardView::first();
    }
}
