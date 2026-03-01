<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favorite(Request $request, $city)
    {
        $user = Auth::user();
        dd($user);
        if($user === null)
        {
            return redirect()->back()->with(['error'=>'You must be logged in']);
        }
        
        UserCities::create([
            'city_id' => $city,
            'user_id' => $user->id
        ]);

        return redirect()->back();
    }

    public function delete($cityId)
    {
        $userCity = UserCities::where('city_id',$cityId);
        $userCity->delete();
        return redirect()->back();
    }
}
