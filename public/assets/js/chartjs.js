$(function() {
  'use strict';

  if($('#chartjsGroupedBar').length) {
    new Chart($('#chartjsGroupedBar'), {
      type: 'bar',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [
          {
            label: "Jumlah Pengunjung",
            backgroundColor: "#f77eb9",
            data: [10, 20, 30, 15, 18, 19, 50, 34, 28, 29, 12, 22]
          }, {
            label: "Jumlah Peminjam",
            backgroundColor: "#7ee5e5",
            data: [50, 34, 28, 29, 12, 22, 5, 6, 2, 8, 1, 9]
          }
        ]
      }
    });
  }

});
