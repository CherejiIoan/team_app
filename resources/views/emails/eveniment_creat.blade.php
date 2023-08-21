<!DOCTYPE html>
<html>
<head>
    <title>Invitație la eveniment</title>
</head>
<body>
    <h1>Invitație la eveniment</h1>
    <p>Salut,</p>
    <p>Ești solicitat să partici la evenimentul următor:</p>
    <p><strong>Nume eveniment:</strong> {{ $eveniment->nume_eveniment }}</p>
    <p><strong>Detalii eveniment:</strong> {{ $eveniment->notite }}</p>
    <p><strong>Data și oră eveniment:</strong> {{ $eveniment->data_eveniment }} la {{ $eveniment->ora_eveniment }}</p>
    <p><strong>Postul disponibil:</strong> {{ $eveniment->tipEveniment->nume_post }}</p>
    
    <p>Te rugăm să ne confirmi dacă ești disponibil pentru a ocupa acest post la eveniment.</p>
    
    <a href="{{ route('confirmare-disponibilitate', ['eveniment_id' => $eveniment->id, 'disponibil' => 'true']) }}">Confirm disponibilitate</a>
    <a href="{{ route('confirmare-disponibilitate', ['eveniment_id' => $eveniment->id, 'disponibil' => 'false']) }}">Nu sunt disponibil</a>
    

    
    <p>Mulțumim,</p>
    <p>Echipa noastră</p>
</body>
</html>