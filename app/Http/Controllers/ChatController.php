<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendInitialMessage($productId)
    {
        $produk = Produk::with('user')->findOrFail($productId);
        $penjual = $produk->user;

        if ($penjual->id == Auth::id()) {
            return redirect()->back()->with('error', 'Kamu tidak bisa chat dengan diri sendiri.');
        }

        Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $penjual->id,
            'content' => "Halo {$penjual->name}, apakah produk {$produk->nama_produk} masih tersedia?",
        ]);

        // Redirect ke halaman chat, buka langsung si penjual
        return redirect()->route('chat.with', ['userId' => $penjual->id]);
    }
}
