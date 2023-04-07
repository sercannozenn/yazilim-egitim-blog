@extends("layouts.admin")
@section('title')
    Dashboard
@endsection
@section("css")
@endsection

@section("content")
    <x-admin.page-description>
        <x-slot name="title">Dashboard</x-slot>
    </x-admin.page-description>


    <x-bootstrap.card>
        <x-slot:header>
            <h2>Makale Listesi</h2>
        </x-slot:header>

        <x-slot:body>
            <div class="row">
                <div class="col-6">
                    <canvas
                        id="chartjs2"
                        style="display: block; width: 100%; height: 300px;"
                        class="chartjs-render-monitor">Your browser does not support the canvas element.
                    </canvas>
                </div>
                <div class="col-6">
                    <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="chartjs4" style="display: block; width: 100%; height: 300px;" class="chartjs-render-monitor">Your browser does not support the canvas element.</canvas>
                </div>
            </div>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section("js")
    <script>
        let articleTitles = "{{ implode(",", array_values($articlesData)) }}";
        let articleLabel = "Makale Görüntüleme";
        let articleData = "{{ implode(",", array_keys($articlesData)) }}";

        articleTitles = articleTitles.split(",");
        articleTitles.forEach(function (val,index) {
            articleTitles[index] = val.substring(0,5);
        })
        articleData = articleData.split(",");

        let userCount = {{ $userData->userCount }};
        let adminCount = {{ $userData->adminCount }};
        let userLabels = ["Normal Kullanıcı Sayısı", "Admin Kullanıcı Sayısı"];
        let userData = [userCount, adminCount];
        let userLabel = "Kullanıcı dağılım grafiği"

    </script>
    <script src="{{ asset('assets/admin/plugins/chartjs/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/charts-chartjs.js') }}"></script>
@endsection
