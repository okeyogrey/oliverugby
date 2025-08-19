<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Http;
use App\Mail\OrderPlacedMail;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(9);
        return view('shop.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }

    public function storeOrder(Request $request)
{
    $validated = $request->validate([
        'product_id'   => 'required|exists:products,id',
        'customer_name'=> 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'location'     => 'required|string|max:255',
        'mpesa_number' => 'required|string|max:20',
        'mpesa_code'   => 'required|string|max:50',
        'quantity'     => 'required|integer|min:1',
    ]);

    // Fetch product
    $product = \App\Models\Product::findOrFail($validated['product_id']);

    // Save order
    $order = \App\Models\Order::create($validated);

    // Send Email Notification
    Mail::to('orders@oliverugby.com') // replace with Olive Rugby’s email
        ->send(new OrderPlacedMail($order, $product));

    // WhatsApp number of Olive Rugby (replace with your actual business WhatsApp number)
    $whatsappNumber = '254715236941'; 

    // Build WhatsApp message
    $message = urlencode("🛒 *New Order Placed!*\n\n".
        "👤 Name: {$validated['customer_name']}\n".
        "📞 Phone: {$validated['phone_number']}\n".
        "📍 Location: {$validated['location']}\n".
        "📦 Product: {$product->title}\n".
        "🔢 Quantity: {$validated['quantity']}\n".
        "💳 Mpesa Number: {$validated['mpesa_number']}\n".
        "✅ Mpesa Code: {$validated['mpesa_code']}\n\n".
        "Please confirm delivery. 🚚"
    );

    // Instead of redirecting, load a view that opens WhatsApp in a new tab
    return view('shop.order-success', [
        'whatsappUrl' => "https://wa.me/{$whatsappNumber}?text={$message}",
    ])->with('success', '✅ Your order has been placed successfully! We have forwarded it to WhatsApp.');
}


}
