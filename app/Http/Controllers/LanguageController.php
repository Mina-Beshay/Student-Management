<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function languageSwitch(Request $request){

        $language = $request->input(key: 'language');
        //Store the language in the session

        session( key: ['language' => $language]);

        return redirect()->back()->with ( key: ['language_switched' => $language]);
    }

}
