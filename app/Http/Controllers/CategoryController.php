<?php

namespace App\Http\Controllers;

use Facades\App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Create Category home page data
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index(int $id)
    {
        try{
            $category = CategoryRepository::getCategory($id);
            $types = CategoryRepository::getTypeAllCache($id);
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
