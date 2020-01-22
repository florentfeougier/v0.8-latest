<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendPaymentAcceptedEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
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
      if($this->payment->order->cart != "shop"){
        $pick = "Votre commande est à récupérer lors de la vente le " . date('d/m/Y', strtotime($this->payment->order->pickup_date))  . " à l'adresse suivante: " . $this->payment->order->pickup_location . " - " . $this->payment->order->pickup_address;

      } else{
        $pick = "Votre commande sera envoyé au point relais sélectionné " . $this->payment->order->pickup_location . ' ' . $this->payment->order->pickup_address . ' ' . $this->payment->order->pickup_postalcode . ' ' . $this->payment->order->pickup_city;

      }

        return (new MailMessage)
                    ->subject('Votre paiement a été accepté!')
                    ->line('Nous vous confirmons la réception de votre paiement. Vous recevrez un ticket récapitulatif une fois validé par notre banque.')
                    ->line('Numéro de commande: ' . $this->payment->order->order_id)
                    ->line('Référence de paiement: ' . $this->payment->ref_id)
                    ->line('Numéro de transaction: ' . $this->payment->transaction_number)
                    ->line("<p style='background: #27ae60;color:#FFF; border-radius:8px; padding:10px;'>" . $pick . "</p>")

                    ->action('Voir les détails de ma commande', url('home/'))
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
