<?php

namespace Modules\Webhook\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon; 
use Laravel\Cashier\Subscription;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Spatie\WebhookClient\Models\WebhookCall;
use Illuminate\Support\Str;
use Log;


class StripeWebhookController extends CashierController
{


    public function handleWebhook(Request $request)
    {

        $payload = json_decode($request->getContent(), true);
        $method = 'handle'.Str::studly(str_replace('.', '_', $payload['type']));
  
        if (method_exists($this, $method)) {
            return $this->{$method}($payload);
        } else {
            return $this->missingMethod();
        }
 

    } 
/**
 * Handle Customer Subscription Updated.
 *
 * @param array $payload
 * @return \Symfony\Component\HttpFoundation\Response
 */
public function handleCustomerSubscriptionUpdated($payload){
       try {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
           $data = $payload['data']['object'];
           $user->subscriptions->filter(function (Subscription $subscription) use ($data) {
             return $subscription->stripe_id === $data['id'];
           })->each(function (Subscription $subscription) use ($data) {
               $subscription->cancel_at_period_end= $data['cancel_at_period_end'];

               if (isset($data['current_period_start'])) {
                   $subscription->current_period_start = Carbon::createFromTimestamp($data['current_period_start']);
                }else {
                 $subscription->current_period_start= null;
               }

              if (isset($data['current_period_end'])) {
                 $subscription->current_period_end = Carbon::createFromTimestamp($data['current_period_end']);
               }else {
                 $subscription->current_period_end = null;
               }
               if (isset($data['cancel_at'])) {
                   if ($data['cancel_at']) {
                     $subscription->cancel_at = Carbon::createFromTimestamp($data['cancel_at']);
                   }else {
                     $subscription->cancel_at = null;
                 }
               }

               if (isset($data['canceled_at'])) {
                   if ($data['canceled_at']) {
                     $subscription->canceled_at = Carbon::createFromTimestamp($data['canceled_at']);
                  }else {
                    $subscription->canceled_at = null;
                  }
               }
              $subscription->save();
            });
         }
       } catch (Exception $exception) {
         return new Response('Webhook Handled - Something Went Wrong' , 422);
      }
  }

  /**
 * Handle Customer Subscription Updated.
 *
 * @param array $payload
 * @return \Symfony\Component\HttpFoundation\Response
 */
 public function handleCustomerSubscriptionCreated($payload){
       try {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
           $data = $payload['data']['object'];
           $user->subscriptions->filter(function (Subscription $subscription) use ($data) {
             return $subscription->stripe_id === $data['id'];
           })->each(function (Subscription $subscription) use ($data) {
               $subscription->cancel_at_period_end= $data['cancel_at_period_end'];

               if (isset($data['current_period_start'])) {
                   $subscription->current_period_start = Carbon::createFromTimestamp($data['current_period_start']);
                }else {
                 $subscription->current_period_start= null;
               }

              if (isset($data['current_period_end'])) {
                 $subscription->current_period_end = Carbon::createFromTimestamp($data['current_period_end']);
               }else {
                 $subscription->current_period_end = null;
               }
               if (isset($data['cancel_at'])) {
                   if ($data['cancel_at']) {
                     $subscription->cancel_at = Carbon::createFromTimestamp($data['cancel_at']);
                   }else {
                     $subscription->cancel_at = null;
                 }
               }

               if (isset($data['canceled_at'])) {
                   if ($data['canceled_at']) {
                     $subscription->canceled_at = Carbon::createFromTimestamp($data['canceled_at']);
                  }else {
                    $subscription->canceled_at = null;
                  }
               }
              $subscription->save();
            });
         }
       } catch (Exception $exception) {
         return new Response('Webhook Handled - Something Went Wrong' , 422);
      }
  }

    /**
     * Handle invoice payment succeeded.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleInvoicePaymentSucceeded($payload)
    {
        try{
            Log::info('1-Webhook Handled - Charge Success - ' . json_encode($payload));
            return new Response('Webhook Handled - Charge Success - ' . json_encode($payload['data']['object']['id'] ), 200);
            
        } catch (\Exception $e) {
            return new Response('Webhook Handled - Something Went Wrong' , 422);
        } 
    } 
    
    /**
     * Handle a Stripe webhook.
     *
     * @param  array  $payload
     * @return Response
     */
    public function handleChargeSucceeded($payload)
    {
        try{
            
            $data = $payload['data']['object'];
            $amount = $data['amount'];
            $cart_total = $amount / 100;
            $shippingaddress = $data['metadata']['shippingaddress'];
            $shippingaddress = json_decode($shippingaddress, true);
            $shipping_charges = $data['metadata']['shipping_charges'];
            $vat_tax  = $data['metadata']['vat_tax'];
            $cartItems = $data['metadata']['cart'];
            $cartItems = json_decode($cartItems, true);
            //dd($data->balance_transaction);

            $user = User::where('id', $shippingaddress['user_id'])->first();

            $order = new Order();
            $order->user_id = $user->id;
            $order->name = $shippingaddress['first_name'] . ' ' . $shippingaddress['last_name'];
            $order->email = $user->email;
            $order->phone = $shippingaddress['phone_number'];
            $order->street1 = $shippingaddress['address'];
            $order->street2 = $shippingaddress['address_line_1'];
            $order->city = $shippingaddress['city'];
            $order->zipcode = $shippingaddress['zipcode'];
            $order->state = $shippingaddress['state'];
            $order->country = $shippingaddress['country'];
            //$order->subscription_id = $userSubscription->id;
            $order->txn_id = $data['balance_transaction'];
            $order->shipping_charges = $shipping_charges;
            $order->order_total = $cart_total;
            $order->vat_tax = $vat_tax;
            $order->status = $data['status'];
            $order->save();

            if (count($cartItems) > 0){

                foreach ($cartItems as $item)
                {
                    $product = Product::where('id', $item['id'])->first();
                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $order->id;
                    $order_detail->product_id = $item['id'];
                    $order_detail->amount = (int)$item['quantity'] * $item['price'];
                    $order_detail->cv = $product->cv;
                    $order_detail->user_id = $user->id;
                    $order_detail->quantity = (int)$item['quantity'];
                    $order_detail->save();
                    
                }
            }

 
            Log::info(['Webhook Handled - Charge Success - ' => $payload]);
            return new Response('Webhook Handled - Charge Success - ' . json_encode($payload['data']['object']['id'] ), 200);
            
        } catch (\Exception $e) {
            Log::info(['Webhook Handled - Something Went Wrong - ' => $e]);
            return new Response('Webhook Handled - Something Went Wrong' , 422);
            
        }
    }
}
