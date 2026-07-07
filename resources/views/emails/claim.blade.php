<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuevo reclamo registrado</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1f1f1f;">
    <h2 style="color: #fb6200;">Nuevo reclamo desde el libro de reclamaciones</h2>

    <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr>
            <td><strong>N° de reclamo:</strong></td>
            <td>{{ $claim->reference_number }}</td>
        </tr>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td>{{ $claim->name }}</td>
        </tr>
        <tr>
            <td><strong>Domicilio:</strong></td>
            <td>{{ $claim->address }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $claim->mail }}</td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong></td>
            <td>{{ $claim->phone }}</td>
        </tr>
        <tr>
            <td><strong>Tipo de documento:</strong></td>
            <td>{{ $claim->typedocument }}</td>
        </tr>
        <tr>
            <td><strong>Número de documento:</strong></td>
            <td>{{ $claim->document }}</td>
        </tr>
        <tr>
            <td><strong>Servicio:</strong></td>
            <td>{{ $claim->services }}</td>
        </tr>
        <tr>
            <td><strong>Contratado:</strong></td>
            <td>{{ $claim->hired }}</td>
        </tr>
        <tr>
            <td><strong>Tipo de reclamo:</strong></td>
            <td>{{ $claim->typeclaim }}</td>
        </tr>
        <tr>
            <td valign="top"><strong>Descripción:</strong></td>
            <td>{{ $claim->description }}</td>
        </tr>
        <tr>
            <td><strong>Autoriza notificaciones:</strong></td>
            <td>{{ $claim->isauthorization }}</td>
        </tr>
    </table>

    @if($claim->father_name || $claim->father_document || $claim->father_mail || $claim->father_phone || $claim->father_address)
        <h3 style="color: #fb6200;">Datos del padre/madre/apoderado</h3>
        <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
            <tr>
                <td><strong>Nombre:</strong></td>
                <td>{{ $claim->father_name }}</td>
            </tr>
            <tr>
                <td><strong>Documento:</strong></td>
                <td>{{ $claim->father_document }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $claim->father_mail }}</td>
            </tr>
            <tr>
                <td><strong>Teléfono:</strong></td>
                <td>{{ $claim->father_phone }}</td>
            </tr>
            <tr>
                <td><strong>Domicilio:</strong></td>
                <td>{{ $claim->father_address }}</td>
            </tr>
        </table>
    @endif
</body>
</html>
