<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Listing;

class PhoneViewed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    // This still does exactly what you described!
    public function __construct(
        protected Listing $listing
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail']; // Send to both channels
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'A buyer just viewed your phone number!',
            'listing_id' => $this->listing->id,
            'icon' => 'fa-phone', // Set your icon here
            'color' => 'success',
            // 'url' => route('listings.show', $this->listing->id),
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Someone is interested in your ' . $this->listing->name)
            ->greeting('Hi ' . $notifiable->name . '!')
            ->line('A potential buyer just viewed your phone number on SellPoint.')
            // You can even include listing details
            ->line('Ad: ' . $this->listing->name)
            ->line('Price: ₦' . number_format($this->listing->price))
            ->action('Manage My Ad', url('/dashboard/listings/' . $this->listing->id))
            ->line('Safety Tip: Never ship an item before receiving payment!')
            ->salutation('Happy Selling, The SellPoint Team');

        // return (new MailMessage)->view(
        //     'emails.phone_viewed', // Create this at resources/views/emails/phone_viewed.blade.php
        //     [
        //         'listing' => $this->listing,
        //         'user' => $notifiable
        //     ]
        // );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
