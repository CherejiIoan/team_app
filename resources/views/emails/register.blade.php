<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completează-ți profilul pentru a beneficia la maximum de contul tău</title>
</head>
<body style="font-family: 'Open Sans', sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; ">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1>Buna {{ $user }}</h1>
        <h2>Completează-ți profilul pentru a beneficia la maximum de contul tău</h2>
        
        <p>Suntem încântați să te avem în comunitatea noastră și vrem să te asigurăm că experiența ta pe platforma noastră va fi una de neuitat. Pentru a beneficia la maximum de toate funcționalitățile contului tău, te rugăm să completezi câteva informații suplimentare în profilul tău.</p>
        <p>Acest lucru ne va ajuta să îți oferim conținut personalizat, solicitările relevante și să te ținem la curent cu ultimele solicitări.</p>
        <p><a href="{{ route('update.profile', ['token' => $user->update_token]) }}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px;">Completează Profilul</a></p>
        <p>Ne asigurăm că toate informațiile furnizate de tine vor fi păstrate în siguranță și confidențialitatea ta este o prioritate pentru noi.</p>
        <p>Dacă ai întrebări sau nevoie de asistență, te rugăm să nu ezita să ne contactezi prin intermediul secțiunii de suport de pe platformă.</p>
        <p>Îți mulțumim pentru încrederea acordată și abia așteptăm să te avem alături de noi pe tot parcursul acestei călătorii.</p>
        <p>Cu stimă,</p>
        <p>TeamApp</p>
    </div>
</body>
</html>
