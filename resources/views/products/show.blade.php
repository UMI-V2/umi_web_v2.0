@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Produk</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('products.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3">
                    <h3 class="card-title">UMKM Masa Kini</h3>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home"
                        role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile"
                        role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Jam Buka</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                        href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages"
                        aria-selected="false">Foto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                        href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings"
                        aria-selected="false">Kategori</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                    aria-labelledby="custom-tabs-two-home-tab">
                    @include('products.show_fields')
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-two-profile-tab">
                    {{-- @include('open_hours.show_fields') --}}
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-two-messages-tab">
                    {{-- @include('business_files.show_fields') --}}
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel"
                    aria-labelledby="custom-tabs-two-settings-tab">
                    {{-- @include('products_categories.show_fields') --}}
                </div>
            </div>
        </div>
    </div>

<?php /*
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('products.show_fields')
                </div>
            </div>
        </div>
    </div>
    */ ?>
@endsection
