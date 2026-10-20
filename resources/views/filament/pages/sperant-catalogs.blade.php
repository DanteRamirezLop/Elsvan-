<div style="display: grid; gap: 1.5rem;">
    @foreach ($catalogs as $catalog)
        <div>
            <h3 style="font-weight: 600; margin-bottom: .5rem;">{{ $catalog['title'] }}</h3>

            @if ($catalog['error'])
                <p style="color: rgb(220 38 38);">{{ $catalog['error'] }}</p>
            @elseif (empty($catalog['rows']))
                <p style="opacity: .6;">Sin registros.</p>
            @else
                <table style="width: 100%; font-size: .875rem; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; opacity: .6;">
                            <th style="padding: .25rem .5rem; width: 6rem;">ID</th>
                            <th style="padding: .25rem .5rem;">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalog['rows'] as $row)
                            <tr style="border-top: 1px solid rgba(128, 128, 128, .2);">
                                <td style="padding: .25rem .5rem; font-family: monospace;">{{ $row['id'] }}</td>
                                <td style="padding: .25rem .5rem;">{{ $row['name'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endforeach
</div>
