<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Contactbericht</title>
    <style>
        /* Basis styling voor de body en algemene tekst */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        /* Container voor de e-mail inhoud */
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Styling voor headings */
        h1, h2, h3 {
            color: #2c3e50;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        /* Styling voor sectie headers */
        .section-header {
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 20px;
            color: #34495e;
        }
        /* Styling voor details (naam, email) */
        .detail-item {
            margin-bottom: 10px;
        }
        .detail-item strong {
            color: #555555;
            display: inline-block;
            width: 80px; /* Vaste breedte voor uitlijning */
        }
        /* Bericht box */
        .message-box {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            white-space: pre-wrap; /* Behoudt enters en spaties in bericht */
            font-style: italic;
        }
        /* Knop styling */
        .button {
            display: inline-block;
            background-color: #3498db; /* Blauwe knop */
            color: #ffffff !important; /* Zorg ervoor dat tekst wit blijft */
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            margin-top: 25px;
        }
        .button:hover {
            background-color: #2980b9;
        }
        /* Footer styling */
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #aaaaaa;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>Nieuw Contactbericht Ontvangen</h1>

    <div class="section-header">Verzender Details</div>
    <p class="detail-item">
        <strong>Naam:</strong> {{ $name }}
    </p>
    <p class="detail-item">
        <strong>E-mail:</strong> <a href="mailto:{{ $email }}" style="color: #3498db; text-decoration: none;">{{ $email }}</a>
    </p>

    <div class="section-header">Bericht</div>
    <div class="message-box">
        <p>{{ $messageContent }}</p>
    </div>

    <p style="text-align: center;">
        <a href="mailto:{{ $email }}" class="button">Reageer op dit bericht</a>
    </p>

    <div class="footer">
        <p>Met vriendelijke groet,</p>
        <p>Het team van {{ config('app.name') }}</p>
    </div>
</div>
</body>
</html>
