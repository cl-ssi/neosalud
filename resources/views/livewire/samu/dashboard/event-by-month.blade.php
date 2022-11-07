<div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div wire:init="getData">
        <div id="event-by-month" style="width: auto; height: 300px;"></div>
    </div>

    <script>
        google.charts.load('current', {'packages' : ['corechart']});

        window.livewire.on('event-by-month', data => {
            var data = google.visualization.arrayToDataTable(data);
            var options = {
                legend: { position: "none" },
                hAxis: {
                    title: 'Mes',
                },
                vAxis: {
                    title: '# de eventos',
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('event-by-month'));
            chart.draw(data, options);
        });
    </script>
</div>
