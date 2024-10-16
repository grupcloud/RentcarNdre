@extends('layout.app')
@section('content')
    @auth
        <p>Selamat Datang <b>{{ Auth::user()->nama_user }}</b></p>
    @endauth
    @if (Auth::user()->level == 'Admin')
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-header">
                        <i class="fa-solid fa-user"></i> User
                    </div>
                    <div class="card-body">
                        <h3>{{ $jumlah_user }} Data User</h3>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('user.index') }}" class="text-white text-decoration-none">Selengkapnya &rsaquo;</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-header">
                        <i class="fa-solid fa-cart-shopping"></i> Total Transaksi
                    </div>
                    <div class="card-body">
                        <h3>Rp {{ number_format($total_transaksi, 0, ',', '.') }}</h3>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('sewa.index') }}" class="text-white text-decoration-none">Selengkapnya
                            &rsaquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <i class="fa-solid fa-car"></i> Jumlah Mobil
                    </div>
                    <div class="card-body">
                        <h3>{{ $jumlah_rentcar }} Data Mobil</h3>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('rentcar.index') }}" class="text-white text-decoration-none">Selengkapnya
                            &rsaquo;</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="card bg-info text-white">
                    <div class="card-header">
                        <i class="fa-solid fa-signal"></i> Jumlah Transaksi
                    </div>
                    <div class="card-body">
                        <h3>{{ $jumlah_transaksi }} Jumlah Transaksi</h3>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('sewa.index') }}" class="text-white text-decoration-none">Selengkapnya
                            &rsaquo;</a>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <div id="container" class="my-5"></div>

        <script>
            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Grafik Penyewaan 30 Hari Terakhir'
                },
                xAxis: {
                    categories: <?= json_encode($categories) ?>
                },
                yAxis: {
                    title: {
                        text: 'Total'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Penyewaan',
                    data: <?= json_encode($data) ?>
                }]
            });
        </script>
    @endif
@endsection
