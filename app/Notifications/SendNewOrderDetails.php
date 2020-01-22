<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewOrderDetails extends Notification
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

      $products = "";
      foreach($this->order->products as $product){
        $products = $products . $product->name . " x " . $product->pivot->quantity . " | ";
      }
        return (new MailMessage)
                    ->subject('Nouvelle commande enregistrée et payée')
                    ->line("Une nouvelle commande a été entregistré et le paiement a été validé par e-transaction.")
                    ->line('<b>Numéro de commande: ' . $this->order->order_id . "</b>")
                    ->line('<i>Référence de paiement: ' . $this->order->payment_id . "</i>")
                    ->line('<i>Utilisateur: ' . $this->order->user->email . "</i>")
                    ->line('<small> Panier: ' . ucfirst($this->order->cart) . "</small>")
                    ->line('<small>Montant: ' . $this->order->amount . '€' . "</small>")
                    ->line('<small>Produits: ' . $products . "</small>")

                    ->action('Voir les détails', url('/manager/orders/' . $this->order->order_id))
                    ->line("A+");
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

