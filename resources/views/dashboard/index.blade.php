@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="column">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">Dashboard UMKM Masa Kini</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-suitcase"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Lapak</span>
                                    <span class="info-box-number">{{ $totalUsaha }}</span>
                                </div>

                            </div>

                        </div>


                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Produk</span>
                                    <span class="info-box-number">{{ $totalProduk }}</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pengguna</span>
                                    <span class="info-box-number">{{ $totalUser }}</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-handshake"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Transaksi</span>
                                    <span class="info-box-number">{{ $totalTransaksi }}</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-credit-card"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Auto Payment</span>
                                    <span class="info-box-number">{{ $transaksiAutoPayment }}</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-credit-card"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Manual Payment</span>
                                    <span class="info-box-number">{{ $transaksiManualPayment }}</span>
                                </div>

                            </div>

                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-12">



                            @push('leaflet_css')
                                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
                                    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
                                    crossorigin="" />

                                <style>
                                    #map {
                                        height: 300px;
                                        border-radius: 1%
                                    }
                                </style>
                            @endpush

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sebaran UMKM</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="d-md-flex">
                                        <div class="p-1 flex-fill" style="overflow: hidden">

                                            <div id="map" style="height: 325px; overflow: hidden" class="leaflet">
                                                <div class="map"><svg height="318.92516996871734" version="1.1"
                                                        width="515.766" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        style="overflow: hidden; position: relative; left: -0.5px; top: -0.734375px;"
                                                        viewBox="0 0 959 593" preserveAspectRatio="xMinYMin">
                                                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created
                                                            with Raphaël 2.3.0 and Mapael undefined
                                                            (https://www.vincentbroute.fr/mapael/)</desc>
                                                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>


                                                    </svg>
                                                    <div class="mapTooltip" style="display: none;"></div>
                                                    <div class="zoomButton zoomReset" title="Reset zoom">•</div>
                                                    <div class="zoomButton zoomIn" title="Zoom in">+</div>
                                                    <div class="zoomButton zoomOut" title="Zoom out">-</div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @push('leaflet_js')
                                <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
                                    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
                                    crossorigin=""></script>

                                <script>
                                    var map = L.map('map', {
                                        scrollWheelZoom: false
                                    }).setView([-6.406576, 108.282833], 13);

                                    var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                    }).addTo(map);


                                    // var location from database in laravel array
                                    var locations = @json($alamatToko);

                                    for (var i = 0; i < locations.length; i++) {
                                        marker = new L.marker([locations[i][1], locations[i][2]])
                                            .bindPopup(locations[i][0])
                                            .addTo(map);
                                    }
                                </script>
                            @endpush

                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">History Transaksi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>No Pemesanan</th>
                                                    <th>Nama Produk</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($historiTransaksi as $sales)
                                                    <tr></tr>
                                                    <td>{{ $sales->sales_history['no_pemesanan'] }}
                                                    </td>
                                                    <td>{{ $sales->sales_history['nama_produk'] }}</td>
                                                    <td><span
                                                            class="badge badge-success">{{ $sales->sales_history['transaction_status'] }}</span>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="card-footer clearfix" style="text-align: center">

                                    <a href="{{ route('transactionProducts.index') }}" class="btn btn-sm btn-info">Lihat
                                        Semua Pesanan</a>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="card">
                                        <div class="card-header border-transparent">
                                            <h3 class="card-title">Produk Terpopuler</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Produk</th>
                                                            <th>Total Terjual</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($transactionProduct as $product)
                                                            <tr>
                                                                <td>{{ $product->nama }}</td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        {{ $product->total_order }}</div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="card-footer clearfix" style="text-align: center">

                                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-info">Lihat
                                                Semua Produk</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="card">
                                        <div class="card-header border-transparent">
                                            <h3 class="card-title">Toko Terpopuler</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Toko</th>
                                                            <th>Jumlah Transaksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($totalLapakPopuler as $businessPopular)
                                                            <tr>
                                                                <td>{{ $businessPopular->nama_usaha }}</td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        {{ $businessPopular->total_business }}</div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="card-footer clearfix" style="text-align: center">

                                            <a href="{{ route('businesses.index') }}" class="btn btn-sm btn-info">Lihat
                                                Semua Toko</a>

                                        </div>

                                    </div>

                                </div>


                                <div class="col-md-4">


                                    <div class="card">
                                        <div class="card-header border-transparent">
                                            <h3 class="card-title">Metode Pembayaran
                                                Terpopuler</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Jenis Metode</th>
                                                            <th>Jumlah Digunakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($totalLapakPopuler as $businessPopular)
                                                            <tr>
                                                                <td>{{ $businessPopular->nama_usaha }}</td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        {{ $businessPopular->total_business }}</div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="card-footer clearfix" style="text-align: center">

                                            <a href="{{ route('masterPaymentMethods.index') }}"
                                                class="btn btn-sm btn-info">Lihat Semua Metode</a>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Frekuensi Transaksi Perbulan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="grafikTransaksi"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;"
                                            width="523" height="312" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>

                                {{-- <div class="card-footer clearfix" style="text-align: left" id="perhari"> 
                                    <a class="btn btn-sm btn-info">
                                        Perhari
                                        </a>
                                </div>
                                <div class="card-footer clearfix" style="text-align: left" id="perminggu">    
                                    <a class="btn btn-sm btn-info">
                                    Perminggu
                                    </a>
                                </div>
                                <div class="card-footer clearfix" style="text-align: left" id="perbulan">    
                                    <a class="btn btn-sm btn-info">
                                    Perbulan
                                    </a>
                                </div>
                                <div class="card-footer clearfix" style="text-align: left" id="pertahun">    
                                    <a class="btn btn-sm btn-info">
                                    Pertahun
                                    </a>
                                </div> --}}

                            </div>

                            {{-- <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Metode Pembayaran Terpopuler</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="produkPopulerChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;"
                                        width="523" height="312" class="chartjs-render-monitor"></canvas>
                                </div>


                            </div> --}}

                        </div>

                        <div class="col-md-4">
                            @push('chartjs_scripts')
                                <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

                                <script>
                                    $(document).ready(function() {
                                        graphicChart()
                                    })

                                    function addData(chart, label, data) {
                                        chart.data.labels.push(label);
                                        chart.data.datasets.forEach((dataset) => {
                                            dataset.data.push(data);
                                        });
                                        chart.update();
                                    }

                                    function graphicChart() {

                                        const labels = [

                                        ];

                                        const dataGrafikTransaksi = {
                                            labels: labels,
                                            datasets: [{
                                                label: 'Total Transaksi',
                                                backgroundColor: 'rgb(255, 99, 132)',
                                                borderColor: 'rgb(255, 99, 132)',
                                                data: [],
                                            }]
                                        };

                                        const config = {
                                            type: 'bar',
                                            data: dataGrafikTransaksi,
                                            options: {}
                                        };

                                        const grafikTransaksi = new Chart(
                                            document.getElementById('grafikTransaksi'),
                                            config
                                        );

                                        $.ajax({
                                            type: "GET",
                                            url: "./dashboard/data",
                                            success: function(data) {
                                                var data = data.data;
                                                var labels = []
                                                console.log(data);
                                                for (var i = 0; i < data.length; i++) {
                                                    addData(grafikTransaksi, data[i].bulan, data[i].jumlah)
                                                }
                                                console.log(labels);
                                            }
                                        });
                                    }
                                </script>
                            @endpush

                        </div>

                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
