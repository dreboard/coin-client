<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;
use Barryvdh\Debugbar\Facade as DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class TypeController extends Controller
{

    private $typeRepository;

    /**
     * Create a new controller instance.
     *
     * @param TypeRepository $typeRepository
     */
    public function __construct(TypeRepository $typeRepository)
    {
        $this->middleware('auth');
        $this->typeRepository = $typeRepository;
    }


    public function index($id)
    {
        try{
            $typeInfo = $this->typeRepository->getType($id);
            $typeCoins = $this->typeRepository->getTypeCoins($id);
            $typeCount = count($typeCoins);
            $typeLink = str_replace(' ', '_', $typeInfo[0]->coinType);
            Debugbar::info($typeInfo);
            return view('back.types.index', [
                'typeInfo' => $typeInfo,
                'typeCoins' => $typeCoins,
                'typeLink' =>  $typeLink,
                'typeCount' =>  $typeCount,
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Your request is not valid');
        }

    }
}
