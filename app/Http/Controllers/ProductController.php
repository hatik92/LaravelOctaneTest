<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        dd($request->all());
        session(['title' => 123]);
        $session = session()->all();
        dd($session);
        return view('components.product', ['prod' => 'Lemon']);
    }
        
    /**
     * info
     *
     * @return void
     */
    public function info()
    {
        dd(session()->all());
        return phpinfo();
    }
        
    /**
     * test
     *
     * @return void
     */
    public function test()
    {
        dd(session()->all());
        dd(123);
    }
        
    /**
     * test2
     *
     * @return void
     */
    public function test2()
    {
        dd(session()->all());
        dd('test123');
    }
}
