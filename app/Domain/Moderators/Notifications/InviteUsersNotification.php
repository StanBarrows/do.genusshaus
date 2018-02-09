<?php

namespace Genusshaus\Domain\Moderators\Notifications;

use Genusshaus\App\Domain\Users\User;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InviteUsersNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    protected $place;

    public function __construct(User $user, Place $place)
    {
        $this->user = $user;
        $this->place = $place;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject('Invitiation Genusshaus')
            ->greeting('Hello '.$this->user->name)
            ->line('You received an invitation for '.$this->place->name)
            ->action('Register', route('invitiations.register', 'user='.$this->user->email.'&place='.$this->place->uuid))
            ->line('Please do not hesitate to contact us, if you have any further questions!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
