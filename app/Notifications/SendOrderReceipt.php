<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOrderReceipt extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

      $products = $this->order->products;
      $list = "";
      foreach($products as $product){
        $list = $list . ' ' . $product->name . ' x ' . $product->pivot->quantity . ' | ';
      }
        return (new MailMessage)
                    ->subject('Facture de votre commande')
                    ->line('Voici la facture pour votre commande enregistrée le :' . $this->order->created_at)
                    ->line('Email client: ' . $this->order->user->email)
                    ->line('Numéro de commande: ' . $this->order->order_id)
                    ->line('Numéro de paiement: ' . $this->order->payment_id)
                    ->line('Montant: ' . $this->order->amount . '€')
                    ->line('Détails: ' . $list)
                    //->line(foreach($products as $product){echo $product->name})
                    ->line("Merci d'utiliser Plantes Addict !");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

