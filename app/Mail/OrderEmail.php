<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
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
        $address = 'nguyenb1805794@student.ctu.edu.vn';
        $subject = 'Thông báo đơn hàng';
        $name = 'NTNStore';

        $order = $this->order;
        if(!$order) return;

        $order_details = OrderDetail::query()->where('order_id', $order->id)->get();
        $created_order = Carbon::parse($order->created_at)->format('d/m/Y');
        $warranty_order = Carbon::parse($order->created_at)->addMonths(1)->format('d/m/Y');

        return $this->view('emails.order')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'order' => $order,
                            'order_details' => $order_details,
                            'created_order' => $created_order,
                            'warranty_order' => $warranty_order,
                ]);
    }
}
