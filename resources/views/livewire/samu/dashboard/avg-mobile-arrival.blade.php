<div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div wire:init="getData">
        <div id="avg-mobile-arrival" style="width: auto; height: 400px;"></div>
    </div>

    <script>
        google.charts.load('current', {'packages' : ['corechart']});

        window.livewire.on('avg-mobile-arrival', data => {
            var data = google.visualization.arrayToDataTable(data);
            var options = {
                legend: { position: "none" },
                hAxis: {
                    title: 'Mes-Año',
                },
                vAxis: {
                    title: 'Tiempo promedio llegada móvil',
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('avg-mobile-arrival'));
            chart.draw(data, options);
        });
    </script>
</div>
