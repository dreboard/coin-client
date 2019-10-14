<?php

namespace App\Http\Controllers;

use App\Repositories\CoinRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var CoinRepository
     */
    private $coinRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CoinRepository $coinRepository)
    {
        $this->middleware('auth');
        $this->coinRepository = $coinRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cats = $this->coinRepository->getHomePage();
        return view('back.home', ['cats' => $cats]);
    }


}
