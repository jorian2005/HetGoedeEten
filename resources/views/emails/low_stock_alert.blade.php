<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Lage Voorraad Alert!</title>
</head>
<body>
<h1>Lage Voorraad Alert!</h1>
<p>Beste kok,</p>
<p>De voorraad van het volgende product is onder het ingestelde minimumniveau gekomen.<br>
    Overweeg om dit product bij te bestellen.</p>
<hr>
<table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
    <thead>
    <tr>
        <th>Product Naam</th>
        <th>Huidige Voorraad</th>
        <th>Minimaal Niveau</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lowStockArticles as $article)
        <tr>
            <td>{{ $article['name'] }}</td>
            <td>{{ $article['stock'] }}</td>
            <td>{{ $article['minimum_stock'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
<p>Zorg ervoor dat de voorraad snel wordt aangevuld.</p>
<p>Met vriendelijke groet,</p>
<p>Het voorraadbeheer systeem van {{ config('app.name') }}</p>
</body>
</html>
