<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SliderController;
use App\Models\Slider;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the count of pending sliders
        $rejectCount = Slider::where('approve', '0')->count();
        $approveCountS = Slider::where('approve', '1')->count();
        $rejectCountP = Product::where('approve', '0')->count();
        $approveCountC = Product::where('approve', '1')->count();

        // Pass the pendingCount variable to the view
        return view('dashboard', compact('rejectCount', 'approveCountS', 'rejectCountP', 'approveCountC'));
    }
}
