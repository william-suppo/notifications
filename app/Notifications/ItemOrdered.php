<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ItemOrdered extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public string $item, public float $price)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
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
            ->subject('Coucou')
            ->line('Yop yop');
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'Confirmation de commande',
            'content' => sprintf("Votre commande de %s pour un montant de %s€ a été prise en compte.", $this->item, $this->price),
            'sent_at' => now()->format('d/m/Y H:i'),
        ]);
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
            'title' => 'Confirmation de commande',
            'content' => sprintf("Votre commande de %s pour un montant de %s€ a été prise en compte.", $this->item, $this->price),
            'sent_at' => now()->format('d/m/Y H:i'),
        ];
    }
}
