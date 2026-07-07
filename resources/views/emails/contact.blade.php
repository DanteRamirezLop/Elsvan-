<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nueva consulta de proyecto</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1f1f1f;">
    <h2 style="color: #fb6200;">Nueva consulta desde la web</h2>

    <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr>
            <td><strong>Nombres:</strong></td>
            <td>{{ $data['nombres'] }}</td>
        </tr>
        <tr>
            <td><strong>Apellidos:</strong></td>
            <td>{{ $data['apellidos'] }}</td>
        </tr>
        <tr>
            <td><strong>Celular:</strong></td>
            <td>{{ $data['celular'] }}</td>
        </tr>
        <tr>
            <td><strong>Correo:</strong></td>
            <td>{{ $data['correo'] }}</td>
        </tr>
        <tr>
            <td valign="top"><strong>Solicitud:</strong></td>
            <td>{{ $data['solicitud'] }}</td>
        </tr>
    </table>
</body>
</html>
