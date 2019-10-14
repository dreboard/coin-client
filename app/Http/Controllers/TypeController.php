<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;
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
            $typeLink = str_replace(' ', '_', $typeInfo[0]->coinType);
            //dump($typeLink);
            return view('back.types.index', [
                'typeInfo' => $typeInfo,
                'typeCoins' => $typeCoins,
                'typeLink' =>  $typeLink
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Your request is not valid');
        }

    }
}
