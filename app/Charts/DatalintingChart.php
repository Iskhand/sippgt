<?php

namespace App\Charts;

use App\Models\Pekerja;
use App\Models\Datalinting;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DatalintingChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function blok1(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $p1 = Pekerja::where('kategori', 'Blok 1')->pluck('nip');
        date_default_timezone_set('Asia/Jakarta');
        $merah = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', $p1)->sum('lt_merah');
        $hitam = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 1')->pluck('nip'))->sum('lt_hitam');
        $cokelat = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 1')->pluck('nip'))->sum('lt_cokelat');
        $jawas = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 1')->pluck('nip'))->sum('lt_jawas');

        $label=[
            'Rosso Merah',
            'Rosso Hitam',
            'Rosso Cokelat',
            'Jawas',
        ];
        return $this->chart->pieChart()
            ->setTitle('Data Linting Blok 1 Hari Ini')
            ->setSubtitle(date('Y-m-d'))
            ->addData(['5', '4', '5', '6'])
            ->setLabels($label);
    }
    public function blok2(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        date_default_timezone_set('Asia/Jakarta');
        $merah = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 2')->pluck('nip'))->count('lt_merah');
        $hitam = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 2')->pluck('nip'))->count('lt_hitam');
        $cokelat = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 2')->pluck('nip'))->count('lt_cokelat');
        $jawas = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 2')->pluck('nip'))->count('lt_jawas');

        $label=[
            'Rosso Merah',
            'Rosso Hitam',
            'Rosso Cokelat',
            'Jawas',
        ];
        return $this->chart->donutChart()
            ->setTitle('Data Linting Blok 2 Hari Ini')
            ->setSubtitle(date('Y-m-d'))
            ->addData([$merah, $hitam, $cokelat, $jawas])
            ->setLabels($label);
    }
    public function blok3(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        date_default_timezone_set('Asia/Jakarta');
        $merah = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 3')->pluck('nip'))->count('lt_merah');
        $hitam = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 3')->pluck('nip'))->count('lt_hitam');
        $cokelat = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 3')->pluck('nip'))->count('lt_cokelat');
        $jawas = Datalinting::where('tanggal', date('Y-m-d'))->whereIn('nip', Pekerja::where('kategori', 'Blok 3')->pluck('nip'))->count('lt_jawas');

        $label=[
            'Rosso Merah',
            'Rosso Hitam',
            'Rosso Cokelat',
            'Jawas',
        ];
        return $this->chart->donutChart()
            ->setTitle('Data Linting Blok 3 Hari Ini')
            ->setSubtitle(date('Y-m-d'))
            ->addData([$merah, $hitam, $cokelat, $jawas])
            ->setLabels($label);
    }
}
