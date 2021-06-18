<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
class LanguageController extends Controller
{
    
    public function __invoke()
    {
        echo "ABC";
    }
    public function index(Request $request, $language){
        if ($language){
            $request->session()->put('language', $language);
        }
        return redirect()->back();
    }
}
