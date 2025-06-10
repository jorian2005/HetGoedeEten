<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Dish;
use App\Models\Reservation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $gerechten = Dish::all();
        $reservations = Reservation::with('user')->get();
        return view('orders.create', compact('gerechten', 'reservations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'status' => 'required|string',
            'dish_ids' => 'required|array|min:1',
            'dish_ids.*' => 'exists:dishes,id',
        ]);

        // Nieuwe bestelling maken
        $order = Order::create([
            'reservation_id' => $validated['reservation_id'],
            'status' => $validated['status'],
        ]);

        // Elk gerecht als order item opslaan
        foreach ($validated['dish_ids'] as $dishId) {
            OrderItem::create([
                'order_id' => $order->id,
                'dish_id' => $dishId,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order successfully added!');
    }

    public function index()
    {
        $orders = Order::with(['items.dish', 'reservation.user'])->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $gerechten = Dish::all();  // consistent
        $reservations = Reservation::with('user')->get();

        return view('orders.edit', compact('order', 'gerechten', 'reservations'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'status' => 'required|string|max:255',
            'dish_ids' => 'required|array|min:1',
            'dish_ids.*' => 'exists:dishes,id',
        ]);

        // Update order zelf
        $order->reservation_id = $validated['reservation_id'];
        $order->status = $validated['status'];
        $order->save();

        // Oude orderitems verwijderen
        OrderItem::where('order_id', $order->id)->delete();

        // Nieuwe orderitems aanmaken
        foreach ($validated['dish_ids'] as $dishId) {
            OrderItem::create([
                'order_id' => $order->id,
                'dish_id' => $dishId,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }
}
