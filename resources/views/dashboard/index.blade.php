<?php
/* <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />fdoijfdoijfoidjfoijd
            </div>
        </div>
    </div>
</x-app-layout> */
?>

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
            <!--    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div> -->
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    {{-- <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">CPU Traffic</span>
                                <span class="info-box-number">
                                    10
                                    <small>%</small>
                                </span>
                            </div>

                        </div>

                    </div> --}}

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-suitcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Lapak</span>
                                <span class="info-box-number">{{ $totalUsaha }}</span>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Produk</span>
                                <span class="info-box-number">{{ $totalProduk }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Pengguna</span>
                                <span class="info-box-number">{{ $totalUser }}</span>
                            </div>

                        </div>

                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Transaksi</span>
                                <span class="info-box-number">{{ $totalTransaksi }}</span>
                            </div>

                        </div>

                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Auto Payment</span>
                                <span class="info-box-number">{{ $transaksiAutoPayment }}</span>
                            </div>

                        </div>

                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Manual Payment</span>
                                <span class="info-box-number">{{ $transaksiManualPayment }}</span>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Monthly Recap Report</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="#" class="dropdown-item">Action</a>
                                            <a href="#" class="dropdown-item">Another action</a>
                                            <a href="#" class="dropdown-item">Something else here</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="#" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-center">
                                            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                        </p>
                                        <div class="chart">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>

                                            <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 680px;" width="680" class="chartjs-render-monitor"></canvas>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-center">
                                            <strong>Goal Completion</strong>
                                        </p>
                                        <div class="progress-group">
                                            Add Products to Cart
                                            <span class="float-right"><b>160</b>/200</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" style="width: 80%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-group">
                                            Complete Purchase
                                            <span class="float-right"><b>310</b>/400</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" style="width: 75%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-group">
                                            <span class="progress-text">Visit Premium Page</span>
                                            <span class="float-right"><b>480</b>/800</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" style="width: 60%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-group">
                                            Send Inquiries
                                            <span class="float-right"><b>250</b>/500</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                            <h5 class="description-header">$35,210.43</h5>
                                            <span class="description-text">TOTAL REVENUE</span>
                                        </div>

                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                            <h5 class="description-header">$10,390.90</h5>
                                            <span class="description-text">TOTAL COST</span>
                                        </div>

                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                            <h5 class="description-header">$24,813.53</h5>
                                            <span class="description-text">TOTAL PROFIT</span>
                                        </div>

                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                            <h5 class="description-header">1200</h5>
                                            <span class="description-text">GOAL COMPLETIONS</span>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div> --}}


                <div class="row">

                    <div class="col-md-8">

                        {{-- @push('leaflet_css')
                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
                            integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
                            crossorigin=""/>

                            <style>
                                #map { height: 300px; border-radius: 1% }
                            </style>
                        @endpush

                            <div class="card-body p-0">
                                <div class="d-md-flex">
                                    <div class="p-1 flex-fill" style="overflow: hidden">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                        
                        @push('leaflet_js')
                            <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
                                integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
                                crossorigin="">
                            </script>

                            <script>
                                var map = L.map('map').setView([51.505, -0.09], 13);

                                var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                }).addTo(map);

                                var marker = L.marker([51.5, -0.09]).addTo(map);

                                var circle = L.circle([51.508, -0.11], {
                                    color: 'red',
                                    fillColor: '#f03',
                                    fillOpacity: 0.5,
                                    radius: 500
                                }).addTo(map);

                                var polygon = L.polygon([
                                    [51.509, -0.08],
                                    [51.503, -0.06],
                                    [51.51, -0.047]
                                ]).addTo(map);
                            </script>
                        @endpush --}}

                        @push('leaflet_css')
                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
                            integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
                            crossorigin=""/>

                            <style>
                                #map { height: 300px; border-radius: 1% }
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
                                            <div class="map"><svg height="318.92516996871734" version="1.1" width="515.766" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px; top: -0.734375px;" viewBox="0 0 959 593" preserveAspectRatio="xMinYMin">
                                                    <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0 and Mapael undefined (https://www.vincentbroute.fr/mapael/)</desc>
                                                    <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                                    
                                                    
                                                </svg>
                                                <div class="mapTooltip" style="display: none;"></div>
                                                <div class="zoomButton zoomReset" title="Reset zoom">•</div>
                                                <div class="zoomButton zoomIn" title="Zoom in">+</div>
                                                <div class="zoomButton zoomOut" title="Zoom out">−</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>

                        @push('leaflet_js')
                            <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
                                integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
                                crossorigin="">
                            </script>

                            <script>
                                var map = L.map('map').setView([51.505, -0.09], 13);

                                var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                }).addTo(map);

                                var marker = L.marker([51.5, -0.09]).addTo(map);

                                var circle = L.circle([51.508, -0.11], {
                                    color: 'red',
                                    fillColor: '#f03',
                                    fillOpacity: 0.5,
                                    radius: 500
                                }).addTo(map);

                                var polygon = L.polygon([
                                    [51.509, -0.08],
                                    [51.503, -0.06],
                                    [51.51, -0.047]
                                ]).addTo(map);
                            </script>
                        @endpush

                        <div class="row">
                            <div class="col-md-6">

                                {{-- <div class="card direct-chat direct-chat-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Direct Chat</h3>
                                        <div class="card-tools">
                                            <span title="3 New Messages" class="badge badge-warning">3</span>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                                <i class="fas fa-comments"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="direct-chat-messages">

                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-infos clearfix">
                                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                </div>

                                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

                                                <div class="direct-chat-text">
                                                    Is this template really for free? That's unbelievable!
                                                </div>

                                            </div>


                                            <div class="direct-chat-msg right">
                                                <div class="direct-chat-infos clearfix">
                                                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                                </div>

                                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

                                                <div class="direct-chat-text">
                                                    You better believe it!
                                                </div>

                                            </div>


                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-infos clearfix">
                                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                    <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                                </div>

                                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

                                                <div class="direct-chat-text">
                                                    Working with AdminLTE on a great new app! Wanna join?
                                                </div>

                                            </div>


                                            <div class="direct-chat-msg right">
                                                <div class="direct-chat-infos clearfix">
                                                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                    <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                                </div>

                                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

                                                <div class="direct-chat-text">
                                                    I would love to.
                                                </div>

                                            </div>

                                        </div>


                                        <div class="direct-chat-contacts">
                                            <ul class="contacts-list">
                                                <li>
                                                    <a href="#">
                                                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">
                                                        <div class="contacts-list-info">
                                                            <span class="contacts-list-name">
                                                                Count Dracula
                                                                <small class="contacts-list-date float-right">2/28/2015</small>
                                                            </span>
                                                            <span class="contacts-list-msg">How have you been? I was...</span>
                                                        </div>

                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                                                        <div class="contacts-list-info">
                                                            <span class="contacts-list-name">
                                                                Sarah Doe
                                                                <small class="contacts-list-date float-right">2/23/2015</small>
                                                            </span>
                                                            <span class="contacts-list-msg">I will be waiting for...</span>
                                                        </div>

                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">
                                                        <div class="contacts-list-info">
                                                            <span class="contacts-list-name">
                                                                Nadia Jolie
                                                                <small class="contacts-list-date float-right">2/20/2015</small>
                                                            </span>
                                                            <span class="contacts-list-msg">I'll call you back at...</span>
                                                        </div>

                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">
                                                        <div class="contacts-list-info">
                                                            <span class="contacts-list-name">
                                                                Nora S. Vans
                                                                <small class="contacts-list-date float-right">2/10/2015</small>
                                                            </span>
                                                            <span class="contacts-list-msg">Where is your new...</span>
                                                        </div>

                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">
                                                        <div class="contacts-list-info">
                                                            <span class="contacts-list-name">
                                                                John K.
                                                                <small class="contacts-list-date float-right">1/27/2015</small>
                                                            </span>
                                                            <span class="contacts-list-msg">Can I take a look at...</span>
                                                        </div>

                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">
                                                        <div class="contacts-list-info">
                                                            <span class="contacts-list-name">
                                                                Kenneth M.
                                                                <small class="contacts-list-date float-right">1/4/2015</small>
                                                            </span>
                                                            <span class="contacts-list-msg">Never mind I found...</span>
                                                        </div>

                                                    </a>
                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <form action="#" method="post">
                                            <div class="input-group">
                                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                                <span class="input-group-append">
                                                    <button type="button" class="btn btn-warning">Send</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>

                                </div> --}}

                            </div>

                            <div class="col-md-6">

                                {{-- <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Latest Members</h3>
                                        <div class="card-tools">
                                            <span class="badge badge-danger">8 New Members</span>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body p-0">
                                        <ul class="users-list clearfix">
                                            <li>
                                                <img src="dist/img/user1-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                                <span class="users-list-date">Today</span>
                                            </li>
                                            <li>
                                                <img src="dist/img/user8-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Norman</a>
                                                <span class="users-list-date">Yesterday</span>
                                            </li>
                                            <li>
                                                <img src="dist/img/user7-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Jane</a>
                                                <span class="users-list-date">12 Jan</span>
                                            </li>
                                            <li>
                                                <img src="dist/img/user6-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">John</a>
                                                <span class="users-list-date">12 Jan</span>
                                            </li>
                                            <li>
                                                <img src="dist/img/user2-160x160.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Alexander</a>
                                                <span class="users-list-date">13 Jan</span>
                                            </li>
                                            <li>
                                                <img src="dist/img/user5-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Sarah</a>
                                                <span class="users-list-date">14 Jan</span>
                                            </li>
                                            <li>
                                                <img src="dist/img/user4-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Nora</a>
                                                <span class="users-list-date">15 Jan</span>
                                            </li>
                                            <li>
                                                <img src="dist/img/user3-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Nadia</a>
                                                <span class="users-list-date">15 Jan</span>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="card-footer text-center">
                                        <a href="javascript:">View All Users</a>
                                    </div>

                                </div> --}}

                            </div>

                        </div>

                    {{-- <div class="col-md-48"> --}}

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
                                                <td><a href="pages/examples/invoice.html">{{ $sales->sales_history["no_pemesanan"] }}</a></td>
                                                <td>{{ $sales->sales_history["nama_produk"] }}</td>
                                                <td><span class="badge badge-success">{{ $sales->sales_history["transaction_status"] }}</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card-footer clearfix">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                            </div>
                        </div>

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
                                            @foreach($transactionProduct as $product)
                                            <tr>
                                                <td>{{ $product->nama }}</td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $product->total_order }}</div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card-footer clearfix">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                            </div>
                            
                        </div>

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
                                            @foreach($totalLapakPopuler as $businessPopular)
                                            <tr>
                                                <td>{{ $businessPopular->nama_usaha }}</td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $businessPopular->total_business }}</div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card-footer clearfix">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                            </div>

                        </div>


                        
                        <div class="card card-danger">
                            <div class="card-header">
                            <h3 class="card-title">Donut Chart</h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                            </div>
                            </div>
                            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;" width="523" height="312" class="chartjs-render-monitor"></canvas>
                            </div>
                            
                            </div>

                    </div>

                    <div class="col-md-4">

                        {{-- <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Inventory</span>
                                <span class="info-box-number">5,200</span>
                            </div>

                        </div>

                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="far fa-heart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mentions</span>
                                <span class="info-box-number">92,050</span>
                            </div>

                        </div>

                        <div class="info-box mb-3 bg-danger">
                            <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Downloads</span>
                                <span class="info-box-number">114,381</span>
                            </div>

                        </div>

                        <div class="info-box mb-3 bg-info">
                            <span class="info-box-icon"><i class="far fa-comment"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Direct Messages</span>
                                <span class="info-box-number">163,921</span>
                            </div>

                        </div> --}}

                        <div class="card">
                            <div class="card-header">
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

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="produkPopulerChart" height="99" width="199" style="display: block; width: 199px; height: 99px;" class="chartjs-render-monitor"></canvas>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                            <li><i class="far fa-circle text-success"></i> IE</li>
                                            <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                            <li><i class="far fa-circle text-info"></i> Safari</li>
                                            <li><i class="far fa-circle text-primary"></i> Opera</li>
                                            <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            United States of America
                                            <span class="float-right text-danger">
                                                <i class="fas fa-arrow-down text-sm"></i>
                                                12%</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            India
                                            <span class="float-right text-success">
                                                <i class="fas fa-arrow-up text-sm"></i> 4%
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            China
                                            <span class="float-right text-warning">
                                                <i class="fas fa-arrow-left text-sm"></i> 0%
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lapak Terpopuler</h3>
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
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="pieChart" height="99" width="199" style="display: block; width: 199px; height: 99px;" class="chartjs-render-monitor"></canvas>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                            <li><i class="far fa-circle text-success"></i> IE</li>
                                            <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                            <li><i class="far fa-circle text-info"></i> Safari</li>
                                            <li><i class="far fa-circle text-primary"></i> Opera</li>
                                            <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            United States of America
                                            <span class="float-right text-danger">
                                                <i class="fas fa-arrow-down text-sm"></i>
                                                12%</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            India
                                            <span class="float-right text-success">
                                                <i class="fas fa-arrow-up text-sm"></i> 4%
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            China
                                            <span class="float-right text-warning">
                                                <i class="fas fa-arrow-left text-sm"></i> 0%
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        @push('chartjs_scripts')
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
                        <script>
                            const ctx = document.getElementById('produkPopulerChart').getContext('2d');
                            const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
                            const produkPopulerChart = new Chart(
                                ctx,
                                {
                                    type: 'doughnut',
                                    data: data
                                }
                            )
                        </script>
                        @endpush


                        {{-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recently Added Products</h3>
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
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                                <span class="badge badge-warning float-right">$1800</span></a>
                                            <span class="product-description">
                                                Samsung 32" 1080p 60Hz LED Smart HDTV.
                                            </span>
                                        </div>
                                    </li>

                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Bicycle
                                                <span class="badge badge-info float-right">$700</span></a>
                                            <span class="product-description">
                                                26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                            </span>
                                        </div>
                                    </li>

                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">
                                                Xbox One <span class="badge badge-danger float-right">
                                                    $350
                                                </span>
                                            </a>
                                            <span class="product-description">
                                                Xbox One Console Bundle with Halo Master Chief Collection.
                                            </span>
                                        </div>
                                    </li>

                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">PlayStation 4
                                                <span class="badge badge-success float-right">$399</span></a>
                                            <span class="product-description">
                                                PlayStation 4 500GB Console (PS4)
                                            </span>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div class="card-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All Products</a>
                            </div>

                        </div> --}}

                    </div>

                </div>

            </div>
        </section>

    </div>
</div>
@endsection
