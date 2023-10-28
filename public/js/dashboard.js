$(function() {
  'use strict'

  var gridLineColor = 'rgba(77, 138, 240, .1)';

  var colors = {
    primary:         "#727cf5",
    secondary:       "#7987a1",
    success:         "#42b72a",
    info:            "#68afff",
    warning:         "#fbbc06",
    danger:          "#ff3366",
    light:           "#ececec",
    dark:            "#282f3a",
    muted:           "#686868"
  }


    $.get(baseUrl + '/api/dashboard/tamu', function(data) {
        // Data JSON akan tersedia di sini
        var bulan = data.bulan;
        var dataTamu = data.data;
        var maks = data.max;

        // Tamu chart start
        if ($('#tamu-chart').length) {
            var tamuChart = document.getElementById('tamu-chart').getContext('2d');
            new Chart(tamuChart, {
                    type: 'bar',
                    data: {
                        labels: bulan,
                        datasets: [{
                            label: 'Tamu',
                            data: dataTamu,
                            backgroundColor: colors.primary
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
                            labels: {
                                display: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                barPercentage: .3,
                                categoryPercentage: .6,
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    fontColor: '#8392a5',
                                    fontSize: 10
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    color: gridLineColor
                                },
                                ticks: {
                                    fontColor: '#8392a5',
                                    fontSize: 10,
                                    min: 0,
                                    max: maks
                                }
                            }]
                        }
                    }
                }
            );
        }
        // Tamu chart end
    });



    $.get(baseUrl + '/api/dashboard/peminjaman', function(data) {
        // Data JSON akan tersedia di sini
        var bulan = data.bulan;
        var dataPeminjaman = data.data;
        var maks = data.max;

        // Peminjaman chart start
        if ($('#peminjaman-chart').length) {
            var peminjamanChart = document.getElementById('peminjaman-chart').getContext('2d');
            new Chart(peminjamanChart, {
                    type: 'bar',
                    data: {
                        labels: bulan,
                        datasets: [{
                            label: 'Peminjaman',
                            data: dataPeminjaman,
                            backgroundColor: colors.primary
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
                            labels: {
                                display: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                barPercentage: .3,
                                categoryPercentage: .6,
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    fontColor: '#8392a5',
                                    fontSize: 10
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    color: gridLineColor
                                },
                                ticks: {
                                    fontColor: '#8392a5',
                                    fontSize: 10,
                                    min: 0,
                                    max: maks
                                }
                            }]
                        }
                    }
                }
            );
        }
        // Peminjaman chart end
    });

});
