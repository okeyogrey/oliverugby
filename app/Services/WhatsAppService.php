<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    public static function sendMessage($to, $message)
    {
        $url = "https://graph.facebook.com/v19.0/" . env('WHATSAPP_PHONE_ID') . "/messages";

        return Http::withToken(env('WHATSAPP_TOKEN'))
            ->post($url, [
                "messaging_product" => "whatsapp",
                "to" => $to,
                "type" => "text",
                "text" => ["body" => $message],
            ])
            ->json();
    }
}
