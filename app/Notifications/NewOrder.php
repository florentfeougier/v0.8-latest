<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrder extends Notification
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

        return (new MailMessage)
                    ->subject('Votre commande a bien été enregistré!')
                    ->line('Nous vous confirmons la création de votre commande d\'un montant de ' . $this->order->amount . '€')
                    ->line('Numéro de commande: ' . $this->order->order_id)
                    ->line('Retrouvez les détails de votre commande et savoir ou récupérer votre commande en cliquant sur le bouton ci-dessous:')
                    ->action('Voir les détails de ma commande', url('profile/' . $this->order->user->name . "/commandes/" . $this->order->order_id))
                    ->line('Si vous venez de procéder au paiement, vous recevrez un mail de confirmation une fois validé par notre banque, autrement cliquer sur le bouton ci-dessus pour procéder au paiement.')

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

