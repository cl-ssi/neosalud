<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\SampleChartTwo;
use App\Charts\Samu\EventByCommune;
use App\Charts\Samu\EventByMobile;
use App\Charts\Samu\EventByMonth;
use App\Charts\Samu\EventBySex;
use App\Charts\Samu\EventLastMonth;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $month;

    public function render()
    {
        $eventLastMonth = new EventLastMonth;
        $eventLastMonth->labels($eventLastMonth->getLabel());
        $eventLastMonth->dataset('Eventos por día', 'bar', $eventLastMonth->getDataset())
            ->color('#491152')
            ->backgroundColor('#491152');

        $eventByCommune = new EventByCommune;
        $eventByCommune->labels($eventByCommune->getLabel());
        $eventByCommune->dataset('Eventos por comuna', 'bar', $eventByCommune->getDataset())
            ->color('#006cb7')
            ->backgroundColor('#006cb7');

        $eventByMobile = new EventByMobile;
        $eventByMobile->labels($eventByMobile->getLabel());
        $eventByMobile->dataset('Eventos por móviles', 'bar', $eventByMobile->getDataset())
            ->color('#006cb7')
            ->backgroundColor('#006cb7');

        $eventByMonth = new EventByMonth;
        $eventByMonth->labels($eventByMonth->getLabel());
        $eventByMonth->dataset('Eventos por mes', 'bar', $eventByMonth->getDataset())
            ->color('#006cb7')
            ->backgroundColor('#006cb7');

        $eventBySex = new EventBySex;
        $eventBySex->labels($eventBySex->getLabel())->options([ 'scales' => [ 'yAxes' => [ 'display' => false ] ] ]);
        $eventBySex->dataset('Eventos por sexo', 'doughnut', $eventBySex->getDataset())
            ->color(['#006cb7', '#c90076', '#491152', '#8fce00', '#5b5b5b'])
            ->backgroundColor(['#006cb7', '#c90076', '#491152', '#8fce00', '##5b5b5b']);

        return view('livewire.samu.dashboard.dashboard-index', compact([
            'eventLastMonth',
            'eventByCommune',
            'eventByMobile',
            'eventByMonth',
            'eventBySex'
        ]));
    }
}
