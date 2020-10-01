@extends('layouts.app')

@section('title', 'Grafik Pendidikan')

@section('styles')
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <h2 class="mb-0">Grafik Pendidikan</h2>
                        <p class="mb-0 text-sm">Kelola Grafik Pendidikan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body">
        <div id="container"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Grafik Pendidikan'
        },
        subtitle: {
            text: "Total Penduduk: {{ $total }} Jiwa"
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:f} Jiwa'
                }
            },
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                showInLegend: true
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> Jiwa<br/>'
        },

        series: [
            {
                name: "Pendidikan",
                colorByPoint: true,
                shadow:1,
                border:1,
                data: {!! json_encode($data) !!}
            }
        ]
    });
</script>
@endpush
