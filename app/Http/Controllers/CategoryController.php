<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoryController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    public function index($id)
    {
        try{
            $category = $this->categoryRepository->getCategory($id);
            $types = $this->categoryRepository->getTypeAllCache($id);
            //dd($types);
            return view('back.categories.index', [
                'types' => $types,
                'category' => $category
            ]);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'Your request is not valid');
        }

    }
}
