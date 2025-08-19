<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Order</title>
</head>
<body>
    <h2>🛒 New Order Received</h2>

    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Phone:</strong> {{ $order->phone_number }}</p>
    <p><strong>Location:</strong> {{ $order->location }}</p>
    <p><strong>Product:</strong> {{ $product->title }}</p>
    <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
    <p><strong>Mpesa Number:</strong> {{ $order->mpesa_number }}</p>
    <p><strong>Mpesa Code:</strong> {{ $order->mpesa_code }}</p>

    <hr>
    <p>This order is also sent to WhatsApp.</p>
</body>
</html>
