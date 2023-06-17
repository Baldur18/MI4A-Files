

@extends('layout.main')
@section('judul_halaman', 'Halaman dashboard')

@section('content')
     <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Dashboard</h4>
                  Fakultas : {{count($fakultas)}}
                  program studi : {{count($prodi)}}
                  mahasiswa : {{count($mahasiswa)}}
                 <div class="d-flex justify-content-between traffic-status">
                            <div class="item">
                              <p class="mb-">Fakultas</p>
                              <h5 class="font-weight-bold mb-0">{{count($fakultas)}}</h5>
                              <div class="color-border"></div>
                            </div>
                            <div class="item">
                              <p class="mb-">Program Studi</p>
                              <h5 class="font-weight-bold mb-0">{{count($prodi)}}</h5>
                              <div class="color-border"></div>
                            </div>
                            <div class="item">
                              <p class="mb-">Mahasiswa</p>
                              <h5 class="font-weight-bold mb-0">{{count($mahasiswa)}}</h5>
                              <div class="color-border"></div>
                            </div>
                          </div>
                          <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        A basic column chart comparing emissions by pollutant.
        Oil and gas extraction has the overall highest amount of
        emissions, followed by manufacturing industries and mining.
        The chart is making use of the axis crosshair feature, to highlight
        years as they are hovered over.
    </p>
</figure>
<style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
<script>
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
            194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
            106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3,
            51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8,
            51.1]

    }]
});
</script>
                  </div>
                 
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Fakultas</th>
                                <th>Dekan</th>
                                <th>Wakil Dekan</th>
                            </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($fakultas as $item)
                            <tr>
                                <td>{{ $item['nama_fakultas'] }}</td>
                                <td>{{ $item['nama_dekan'] }}</td>
                                <td>{{ $item['nama_wakil_dekan'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    
@endsection