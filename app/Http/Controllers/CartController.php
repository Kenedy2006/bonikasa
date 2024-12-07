<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // Método para eliminar un producto del carrito
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Producto eliminado del carrito.');
        } else {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }
    }
}