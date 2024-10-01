<?php

namespace App\Http\Controllers;

class LangController extends Controller
{
    private $langActive = [
        'vi',
        'en',
    ];

    public function changeLanguage($lang)
    {
        if (in_array($lang, $this->langActive)) {
            session()->put('lang', $lang);
        }
        return redirect()->back();
    }
}
