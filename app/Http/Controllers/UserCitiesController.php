<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favorite(Request $request)
    {
        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with(['error'=>'You must be logged in']);
        }
        echo "Test";
    }
}
