<?php

namespace App\Http\Controllers;
use App\Models\Url; 
use Illuminate\Http\Request;

class URLController extends Controller
{
    public function register(Request $request) {
        if(!$request->filled('url')) {
            return redirect()->back()->with('error', 'URL input can\'t be empty, please, fill it.'); 
        }

        $doesExist = Url::where('url', $request->input('url'))->first(); 

        if($doesExist) {
            return redirect()->back()->with('success', env('APP_URL') . '/' . $doesExist->id); 
        } else {
            $created = Url::create([
                "url" => $request->input('url'), 
            ]); 

            if($created) {
                return redirect()->back()->with('success', env('APP_URL') . '/' . $created->id);
            } else {
                return redirect()->back()->with('error', 'An error has been appreared, try again...'); 
            }
        } 
    }

    public function redirectToUrl($id) {
        $doesExist = Url::where('id', $id)->first(); 

        if($doesExist) {
            return redirect()->away($doesExist->url);
        } else {
            return redirect('/'); 
        } 
    }
}

