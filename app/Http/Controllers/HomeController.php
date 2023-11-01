<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\History;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoryKaca = History::whereHas('category' , function($q){
            $q->where('id', 4);
        })->get();
        $categoryKaca = count($categoryKaca);
        $categoryPlastik = History::whereHas('category' , function($q){
            $q->where('id', 1);
        })->get();
        $categoryPlastik = count($categoryPlastik);
        $categoryKertas = History::whereHas('category' , function($q){
            $q->where('id', 2);
        })->get();
        $categoryKertas = count($categoryKertas);
        $categoryLogam = History::whereHas('category' , function($q){
            $q->where('id', 3);
        })->get();
        $categoryLogam = count($categoryLogam);
        // dd($categoryKaca, $categoryKertas, $categoryLogam, $categoryPlastik);
        $data = [
            'categoryKaca' => $categoryKaca,
            'categoryPlastik' => $categoryPlastik,
            'categoryKertas' => $categoryKertas,
            'categoryLogam' => $categoryLogam,
        ];
        return view('welcome', $data);
    }


}
