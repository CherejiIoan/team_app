<!DOCTYPE html>
<html>
<head>
    <title>Bun venit în aplicație!</title>
</head>
<body>
    <h1>Bun venit în aplicație, {{ $user->name }}!</h1>
    <p>Contul tău a fost creat cu succes. Aici sunt informațiile contului tău:</p>
    <ul>
        <li>Nume: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
    </ul>
    <p>Te rugăm să completezi profilul tău pentru a beneficia la maximum de aplicație.</p>
</body>
</html>