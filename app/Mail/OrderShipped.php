<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('joanreneki@gmail.com')
            ->view('emails.orders.order')
            ->text('emails.orders.shipped_plain')
//            ->attach('/path/to/file', [
//                'as' => 'name.pdf'
//            ])
        ;
    }

    public function ship(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        // Ship order...

        Mail::to($request->user())
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->send(new OrderShipped($order));
    }
}
