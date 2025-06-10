@component('mail::message')
    # Nieuw Contactbericht Ontvangen

    Er is zojuist een nieuw bericht binnengekomen via het contactformulier van je website.

    ---

    ### **Verzender Details**

    * **Naam:** {{ $name }}
    * **E-mailadres:** [{{ $email }}](mailto:{{ $email }})

    ---

    ### **Bericht**

    @component('mail::panel')
        {{ $messageContent }}
    @endcomponent

    ---

    @component('mail::button', ['url' => 'mailto:' . $email])
        Reageer op dit bericht
    @endcomponent

    Met vriendelijke groet,

    Het team van **{{ config('app.name') }}**
@endcomponent
