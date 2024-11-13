<html>
<body>
    <h1>Rappel de Réservation</h1>
    <p>Bonjour {{ $reservation->user->name }},</p>
    <p>Ceci est un rappel amical que votre réservation au restaurant {{ $reservation->restaurant->name }} est dans une heure.</p>
    <p>Détails :</p>
    <ul>
        <li>Date : {{ $reservation->reservation_date }}</li>
        <li>Heure : {{ $reservation->reservation_time }}</li>
        <li>Nombre de personnes : {{ $reservation->number_of_people }}</li>
    </ul>
    <p>Merci de nous avoir choisis !</p>
</body>
</html>
