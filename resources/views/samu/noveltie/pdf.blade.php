<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novedades del Día {{ $date }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            /* Soporte para caracteres especiales */
            font-size: 10px;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        h1,
        h2,
        h3 {
            text-align: center;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 18px;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
        }

        h2 {
            font-size: 16px;
            background-color: #f0f0f0;
            padding: 8px;
            margin-top: 20px;
        }

        h3 {
            font-size: 14px;
            margin-top: 15px;
            margin-bottom: 5px;
            text-align: left;
            font-style: italic;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #e9ecef;
            font-weight: bold;
        }

        .no-novelties {
            text-align: center;
            padding: 10px;
            font-style: italic;
            color: #777;
        }

        .detail-column {
            width: 50%;
            /* Dar más espacio a la columna de detalle */
        }

        .time-column {
            width: 15%;
        }

        .creator-column {
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Novedades del Día: {{ $date }}</h1>

        @if($pdfPeriod === 'morning' || $pdfPeriod === 'all')
        <h2>Mañana (08:00 - 16:59)</h2>
        @if($morningNovelties->count() > 0)
        <table>
            <thead>
                <tr>
                    <th class="time-column">Hora</th>
                    <th>Teléfono</th>
                    <th class="detail-column">Detalle</th>
                    <th class="creator-column">Creador</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($morningNovelties as $noveltie)
                <tr>
                    <td>{{ $noveltie->created_at->format('H:i:s') }}</td>
                    <td>{{ $noveltie->telephone ?? '-' }}</td>
                    <td>{{ $noveltie->detail ?? '-' }}</td>
                    <td>{{ $noveltie->creator->officialFullName ?? '-' }}</td>
                    <td>{{ $noveltie->type ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="no-novelties">No se registraron novedades en la mañana.</p>
        @endif
        @endif

        @if($pdfPeriod === 'afternoon' || $pdfPeriod === 'all')
        <h2>Tarde (17:00 - 23:59)</h2>
        @if($afternoonNovelties->count() > 0)
        <table>
            <thead>
                <tr>
                    <th class="time-column">Hora</th>
                    <th>Teléfono</th>
                    <th class="detail-column">Detalle</th>
                    <th class="creator-column">Creador</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($afternoonNovelties as $noveltie)
                <tr>
                    <td>{{ $noveltie->created_at->format('H:i:s') }}</td>
                    <td>{{ $noveltie->telephone ?? '-' }}</td>
                    <td>{{ $noveltie->detail ?? '-' }}</td>
                    <td>{{ $noveltie->creator->officialFullName ?? '-' }}</td>
                    <td>{{ $noveltie->type ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="no-novelties">No se registraron novedades en la tarde.</p>
        @endif
        @endif

        @if($pdfPeriod === 'night' || $pdfPeriod === 'all')
        <h2>Noche (00:00 - 07:59)</h2>
        @if($nightNovelties->count() > 0)
        <table>
            <thead>
                <tr>
                    <th class="time-column">Hora</th>
                    <th>Teléfono</th>
                    <th class="detail-column">Detalle</th>
                    <th class="creator-column">Creador</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nightNovelties as $noveltie)
                <tr>
                    <td>{{ $noveltie->created_at->format('H:i:s') }}</td>
                    <td>{{ $noveltie->telephone ?? '-' }}</td>
                    <td>{{ $noveltie->detail ?? '-' }}</td>
                    <td>{{ $noveltie->creator->officialFullName ?? '-' }}</td>
                    <td>{{ $noveltie->type ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="no-novelties">No se registraron novedades en la noche.</p>
        @endif
        @endif
    </div>
</body>

</html>