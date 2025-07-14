<?php

use App\Http\Livewire\Samu\RemStatistics;

$stats = $stats['SECTION_L'];
?>

<div>
    <h1>Sección L - Estadísticas</h1>
    <p>Esta sección incluye estadísticas para eventos con clasificación de llamada "T1" y IDs de móviles 1 y 2.</p>
    <table class="table">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Total de Eventos</th>
                <th>Pacientes Únicos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Básico</td>
                <td>{{ $L['BASIC']['TOTAL'] }}</td>
                <td>{{ $L['BASIC']['UNIQUE'] }}</td>
            </tr>
            <tr>
                <td>Avanzado</td>
                <td>{{ $L['ADVANCED']['TOTAL'] }}</td>
                <td>{{ $L['ADVANCED']['UNIQUE'] }}</td>
            </tr>
        </tbody>
    </table>
</div>