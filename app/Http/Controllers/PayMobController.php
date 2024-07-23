<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PayMob\Facades\PayMob;

class PayMobController extends Controller
{
    //
    public static function pay(float $total_price, int $order_id)
    {
        $auth = PayMob::AuthenticationRequest();
        $order = PayMob::OrderRegistrationAPI([
            'auth_token' => $auth->token,
            'amount_cents' => $total_price * 100, //put your price
            'currency' => 'EGP',
            'delivery_needed' => false, // another option true
            'merchant_order_id' => $order_id, //put order id from your database must be unique id
            'items' => [] // all items information or leave it empty
        ]);

        $PaymentKey = PayMob::PaymentKeyRequest([
            'auth_token' => $auth->token,
            'amount_cents' => $total_price * 100, //put your price
            'currency' => 'EGP',
            'order_id' => $order->id,
            "billing_data" => [ // put your client information
                "apartment" => "803",
                "email" => "claudette09@exa.com",
                "floor" => "42",
                "first_name" => "Clifford",
                "street" => "Ethan Land",
                "building" => "8028",
                "phone_number" => "+86(8)9135210487",
                "shipping_method" => "PKG",
                "postal_code" => "01898",
                "city" => "Jaskolskiburgh",
                "country" => "CR",
                "last_name" => "Nicolas",
                "state" => "Utah"
            ]
        ]);

        // return view('paymob')->with(['token' => $PaymentKey->token]);
        return $PaymentKey->token;
    }

    public function checkout_processed(Request $request)
    {

        $request_hmac = $request->hmac;
        $calc_hmac = PayMob::calcHMAC($request);

        // if ($request_hmac == $calc_hmac) {
        if ($calc_hmac === $request_hmac) {
            $order_id = $request->merchant_order_id;
            $amount_cents = $request->amount_cents;
            $transaction_id = $request->id;
            $order = Order::find($order_id);

            if ($order) {
                if ($request->success == true && ($order->total_price * 100) == $amount_cents) {
                    $order->update([
                        'transaction_status' => 'finished',
                        'transaction_id' => $transaction_id,
                    ]);

                    // إعادة التوجيه إلى الصفحة الرئيسية مع رسالة نجاح
                    return redirect('/')->with('status', 'Transaction completed successfully!');
                } else {
                    $order->update([
                        'transaction_status' => 'failed',
                        'transaction_id' => $transaction_id,
                    ]);

                    // إعادة التوجيه إلى الصفحة الرئيسية مع رسالة فشل
                    return redirect('/')->with('status', 'Transaction failed.');
                }
            } else {
                // إذا لم يتم العثور على الطلب
                return redirect('/')->with('status', 'Order not found.');
            }
        } else {
            // إذا فشل التحقق من HMAC
            return redirect('/')->with('status', 'HMAC verification failed.');
        }
    }
}
