<?php
namespace App\Listeners;

use App\Events\NewOrderEvent;
use App\Mail\NewOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewOrderEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  NewOrderEvent  $event
     * @return void
     */
    public function handle(NewOrderEvent $event)
    {
        $order = $event->order;

        // Send email notification
        $adminEmail = env('MAIL_FROM_ADDRESS'); 
        Mail::to($adminEmail)->send(new NewOrderNotification($order));
    }
}
