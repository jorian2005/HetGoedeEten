<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->get('periode', 'maand'); // standaard 'maand'

        $now = Carbon::now();

        switch ($periode) {
            case 'jaar':
                $start = $now->copy()->startOfYear();
                $end = $now->copy()->endOfYear();
                break;
            case 'maand':
                $start = $now->copy()->startOfMonth();
                $end = $now->copy()->endOfMonth();
                break;
            case 'week':
                $start = $now->copy()->startOfWeek();
                $end = $now->copy()->endOfWeek();
                break;
            case 'dag':
                $start = $now->copy()->startOfDay();
                $end = $now->copy()->endOfDay();
                break;
            default:
                // fallback naar maand
                $start = $now->copy()->startOfMonth();
                $end = $now->copy()->endOfMonth();
                break;
        }

        $totalOrders = Order::whereBetween('created_at', [$start, $end])->count();

        return view('dashboard', compact('totalOrders', 'periode'));
    }
}
