<div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div wire:init="getData">
        <div id="event-last-month" style="width: auto; height: 400px;"></div>
    </div>

    <script>
        google.charts.load('current', {'packages' : ['corechart']});

        window.livewire.on('event-last-month', data => {
            var data = google.visualization.arrayToDataTable(data);
            var options = {
                legend: { position: "none" },
                hAxis: {
                    title: 'Día',
                },
                vAxis: {
                    title: '# eventos atendidos',
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('event-last-month'));
            chart.draw(data, options);
        });
    </script>
</div>
