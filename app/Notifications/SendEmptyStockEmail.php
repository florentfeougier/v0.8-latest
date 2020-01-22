<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmptyStockEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
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

        return (new MailMessage)
                    ->subject("Votre stock de ". $this->product->name . " est épuisé")
                    ->line('Nous vous confirmons la création de votre commande.')
                    ->line('Produit: ' . $this->product->name)
                    ->line('Montant: ' . $this->product->amount . '€')
                    ->line('Cliquez sur le lien ci-dessous pour procéder au paiement:')
                    ->action('Payer ma commande', url('/compte/commandes/' . $this->product->product_id))
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
