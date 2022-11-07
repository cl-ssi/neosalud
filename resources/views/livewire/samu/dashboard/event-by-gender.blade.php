<div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="row g-2 my-1">
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
        <div id="event-by-gender" style="width: auto; height: 300px;"></div>
    </div>

    <script>
        google.charts.load('current', {'packages' : ['corechart']});

        window.livewire.on('event-by-gender', data => {
            var data = google.visualization.arrayToDataTable(data);

            var options = {
                is3D: true,
                slices: {
                    0: { color: '#006cb7' },
                    1: { color: '#c90076' },
                    2: { color: '#491152' },
                    3: { color: '#8fce00' },
                    4: { color: '#5b5b5b' },
                    5: { color: '#c90076' },
                }
            }
            var chart = new google.visualization.PieChart(document.getElementById('event-by-gender'));
            chart.draw(data, options);
        });
    </script>
</div>
