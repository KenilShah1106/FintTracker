<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('masters.rewards.index', compact(['products']));
    }

    public function updateRewardPoints(Request $request) {
        $reward_points = (auth()->user()->reward_points - $request->price);
        auth()->user()->update([
            'reward_points' => $reward_points,
        ]);
    }
}
