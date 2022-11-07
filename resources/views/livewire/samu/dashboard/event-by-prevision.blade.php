<div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="row g-2 my-1">
        <fieldset class="form-group col-md-3">
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
        <div id="event-by-prevision" style="width: auto; height: 450px;"></div>
    </div>

    <script>
        google.charts.load('current', {'packages' : ['corechart']});

        window.livewire.on('event-by-prevision', data => {
            var data = google.visualization.arrayToDataTable(data);
            var options = {
                is3D: true
            }

            var chart = new google.visualization.PieChart(document.getElementById('event-by-prevision'));
            chart.draw(data, options);
        });
    </script>
</div>
