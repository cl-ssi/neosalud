<div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="row my-1">
        <fieldset class="form-group col-md-12">
            <div class="input-group">
                <span class="input-group-text" id="for-month">Mes y Año</span>
                <input
                    type="month"
                    id="for-month"
                    class="form-control form-control-sm"
                    wire:model.debounce.1000ms="year_month"
                >
            </div>
        </fieldset>
    </div>

    <div wire:init="getData">
        <div id="event-by-mobile" style="width: auto; height: 300px;"></div>
    </div>

    <script>
        google.charts.load('current', {'packages' : ['corechart']});

        window.livewire.on('event-by-mobile', data => {
            var data = google.visualization.arrayToDataTable(data);
            var options = {
                legend: { position: "none" },
                hAxis: {
                    title: 'Móviles',
                },
                vAxis: {
                    title: '# de eventos',
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('event-by-mobile'));
            chart.draw(data, options);
        });
    </script>
</div>
