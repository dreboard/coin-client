<?php

namespace App\Http\Controllers;

use App\Repositories\CoinRepository;
use Illuminate\Http\Request;

class CoinHomeController extends Controller
{
    public function __construct(CoinRepository $coinRepository)
    {
        $this->coinRepository = $coinRepository;
    }


    public function getCats()
    {
        return response()->json(['categories' => $this->coinRepository->getHomePage()]) ;
    }
}
