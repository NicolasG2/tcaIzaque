@extends('templates.main', ['titulo' => 'Gráficos', 'rota' => 'templates.home'])

@section('titulo')
    Gráficos
@endsection

@section('conteudo')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <div class="row">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Gráficos de Dados</h2>
            <div class="row">

                <div class="col-md-6 mb-4">
                    <canvas id="grafico1"></canvas>
                </div>

                <div class="col-md-6 mb-4">
                    <canvas id="grafico2"></canvas>
                </div>

                <div class="col-md-6 mb-4">
                    <canvas id="grafico3"></canvas>
                </div>

                <div class="col-md-6 mb-4">
                    <canvas id="grafico4"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script type="text/javascript">
        let marcas = {!! json_encode($marcas) !!};
        let cores = {!! json_encode($cores) !!};
        let modelos = {!! json_encode($modelos) !!};
        let estados = {!! json_encode($estados) !!};

        if (marcas && Object.keys(marcas).length > 0) {
            new Chart(document.getElementById('grafico1'), {
                type: 'bar',
                data: {
                    labels: Object.keys(marcas),
                    datasets: [{
                        label: 'Total de Modelos por Marca',
                        data: Object.values(marcas),
                        backgroundColor: 'rgba(54, 162, 235, 1)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        if (cores && Object.keys(cores).length > 0) {
            new Chart(document.getElementById('grafico2'), {
                type: 'pie',
                data: {
                    labels: Object.keys(cores),
                    datasets: [{
                        label: 'Total de Carros por Cor',
                        data: Object.values(cores),
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: true
                        }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        chart3d: {
                            enabled: true,
                            depth: 20,
                            perspective: 50,
                            shadow: true
                        }
                    }
                }
            });
        }

        if (modelos && Object.keys(modelos).length > 0) {
            new Chart(document.getElementById('grafico3'), {
                type: 'pie',
                data: {
                    labels: Object.keys(modelos),
                    datasets: [{
                        label: 'Total de Carros por Modelo',
                        data: Object.values(modelos),
                        backgroundColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: true
                        }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        chart3d: {
                            enabled: true,
                            depth: 20,
                            perspective: 50,
                            shadow: true
                        }
                    }
                }
            });
        }


        if (estados && Object.keys(estados).length > 0) {
            new Chart(document.getElementById('grafico4'), {
                type: 'bar',
                data: {
                    labels: Object.keys(estados),
                    datasets: [{
                        label: 'Total de Carros por Estado',
                        data: Object.values(estados),
                        backgroundColor: 'rgba(75, 192, 192, 1)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
@endsection
