$(document).ready(function() {

    getBulan();

});

function filterTahun() {
    $("#chart").empty();
    $('#chart').append('<canvas id="myAreaChart"></canvas>');
    getBulan();
}

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function getBulan() {
    var tahun = $('#tahun').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getFilterTahun';
    $.ajax({
        type: 'POST',
        data: {
            tahun: tahun,
        },
        url: base_url,
        dataType: 'json',
        success: function(hasil) {
            grafik(
                hasil.bmJanuari,
                hasil.bmFebruari,
                hasil.bmMaret,
                hasil.bmApril,
                hasil.bmMei,
                hasil.bmJuni,
                hasil.bmJuli,
                hasil.bmAgustus,
                hasil.bmSeptember,
                hasil.bmOktober,
                hasil.bmNovember,
                hasil.bmDesember,
                hasil.bkJanuari,
                hasil.bkFebruari,
                hasil.bkMaret,
                hasil.bkApril,
                hasil.bkMei,
                hasil.bkJuni,
                hasil.bkJuli,
                hasil.bkAgustus,
                hasil.bkSeptember,
                hasil.bkOktober,
                hasil.bkNovember,
                hasil.bkDesember
            );
        }
    });

}




function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


function grafik(
    bmJanuari, bmFebruari, bmMaret, bmApril, bmMei, bmJuni, 
    bmJuli, bmAgustus, bmSeptember, bmOktober, bmNovember, bmDesember,
    bkJanuari, bkFebruari, bkMaret, bkApril, bkMei, bkJuni, 
    bkJuli, bkAgustus, bkSeptember, bkOktober, bkNovember, bkDesember
    ) {
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                label: "Barang Masuk",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    bmJanuari,
                    bmFebruari,
                    bmMaret,
                    bmApril,
                    bmMei,
                    bmJuni,
                    bmJuli,
                    bmAgustus,
                    bmSeptember,
                    bmOktober,
                    bmNovember,
                    bmDesember,
                ],
            },
            {
                label: "Barang Keluar",
                lineTension: 0.3,
                backgroundColor: "rgba(231, 74, 59, 0.05)",
                borderColor: "#e74a3b",
                pointRadius: 3,
                pointBackgroundColor: "#e74a3b",
                pointBorderColor: "#e74a3b",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "#5a5c69",
                pointHoverBorderColor: "#5a5c69",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    bkJanuari,
                    bkFebruari,
                    bkMaret,
                    bkApril,
                    bkMei,
                    bkJuni,
                    bkJuli,
                    bkAgustus,
                    bkSeptember,
                    bkOktober,
                    bkNovember,
                    bkDesember,
                ],
            },
        ],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: true
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });


    return myLineChart;

}