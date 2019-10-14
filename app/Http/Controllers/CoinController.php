<?php

namespace App\Http\Controllers;

use App\Repositories\CoinRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Class CoinController
 * @package App\Http\Controllers
 */
class CoinController extends Controller
{
    /**
     * @var CoinRepository
     */
    private $coinRepository;

    /**
     * CoinController constructor.
     * @param CoinRepository $coinRepository
     */
    public function __construct(CoinRepository $coinRepository)
    {
        $this->coinRepository = $coinRepository;
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index(int $id)
    {
        try{
            $coin = $this->coinRepository->getCoin($id);
            $varieties = $this->coinRepository->getCoinVarieties($id);
            $subTypes = $this->coinRepository->getSubTypes($id);
            $typeLink = str_replace(' ', '_', $coin[0]->coinType);
            $varietyList = $this->coinRepository->listCoinVarieties($id);
            return view('back.coins.index', [
                'coin' => $coin,
                'varieties' => $varieties,
                'typeLink' =>  $typeLink,
                'subTypes' =>  $subTypes,
                'varietyList' =>  $varietyList
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Your request is not valid');
        }

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function coinsByYear(Request $request)
    {
        try{
            if ($request->has(['century', 'theYear'])) {
                $coinYear = $request->input('century').$request->input('theYear');
            } else {
                $coinYear = $request->input('coinYear');
            }

            $coins = $this->coinRepository->getCoinsByYear($coinYear);
            return view('back.coins.by_year', [
                'coins' => $coins
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Your request is not valid');
        }

    }

}
