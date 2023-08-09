@component('mail::message')
# Vous avez reçu une demande de réservation.

Cliquez sur le bouton ci-dessous pour répondre à la réservation.

@component('mail::button', ['url' => $url])
Répondre à la réservation
@endcomponent

Merci de votre attention !

@endcomponent
