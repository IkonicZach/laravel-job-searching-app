<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplicationNotification extends Notification
{
    use Queueable;
    public $application;

    /**
     * Create a new notification instance.
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->markdown('mails.job-application-noti', ['application' => $this->application]);
        // ->line('Your application has been submitted.')
        // ->line('Details:')
        // ->line('Job Title: ' . $this->application->job->title)
        // ->line('Applicant Name: ' . $this->application->user->name)
        // ->line('Email: ' . $this->application->email)
        // ->line('Phone: ' . $this->application->phone)
        // ->action('View Application', url('/applications/' . $this->application->id))
        // ->line('Thank you for using our job board!')
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
