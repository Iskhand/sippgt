<?php

namespace App\Charts;

use App\Models\Pekerja;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PekerjaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function pekerja(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $blok1=Pekerja::where('kategori', 'Blok 1')->count();
        $blok2=Pekerja::where('kategori', 'Blok 2')->count();
        $blok3=Pekerja::where('kategori', 'Blok 3')->count();
        $label=[
            'Blok 1',
            'Blok 2',
            'Blok 3',
        ];
        return $this->chart->pieChart()
            ->setTitle('Data Pekerja')
            ->setSubtitle(date('Y'))
            ->addData([$blok1, $blok2, $blok3])
            ->setLabels($label);
    }
}
