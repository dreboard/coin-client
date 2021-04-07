<?php

namespace App\Http\Controllers;

use App\Repositories\HomeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var HomeRepository
     */
    private $homeRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->homeRepository = new HomeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cats = $this->homeRepository->getHomePage();
        return view('back.home', ['cats' => $cats]);
    }


}
