<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\URL;

class AuthServiceProvider extends ServiceProvider
{


    /**
     * 
     * Bootstrap services.
     */
    public function boot()
    {
        // $this->registerPolicies();
    
        // Redéfinit le lien de réinitialisation pour les API
        ResetPassword::createUrlUsing(function ($notifiable, string $token) {
            // Utilise l'URL de l'application frontend pour la réinitialisation du mot de passe
            return config('app.frontend_url') . '/reset-password?token=' . $token . '&email=' . urlencode($notifiable->getEmailForPasswordReset());
        });
    }
}
