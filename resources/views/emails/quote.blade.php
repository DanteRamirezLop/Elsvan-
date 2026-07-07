<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nueva cotización de proyecto</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1f1f1f;">
    <h2 style="color: #fb6200;">Nueva cotización desde la web</h2>

    <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr>
            <td><strong>Proyecto:</strong></td>
            <td>{{ $data['proyecto'] }}</td>
        </tr>
        <tr>
            <td><strong>Tipo de departamento:</strong></td>
            <td>{{ $data['departamento'] }}</td>
        </tr>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td>{{ $data['nombre'] }}</td>
        </tr>
        <tr>
            <td><strong>Celular:</strong></td>
            <td>{{ $data['celular'] }}</td>
        </tr>
        <tr>
            <td><strong>Tipo de documento:</strong></td>
            <td>{{ $data['tipo_documento'] }}</td>
        </tr>
        <tr>
            <td><strong>Número de documento:</strong></td>
            <td>{{ $data['numero_documento'] }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td valign="top"><strong>Mensaje:</strong></td>
            <td>{{ $data['mensaje'] ?? '' }}</td>
        </tr>
    </table>
</body>
</html>
