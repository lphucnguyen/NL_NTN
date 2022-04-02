function createChart(idChart, titleChart, type, label, data) {
    let myChart = document.getElementById(idChart).getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    var arrBgColor = new Array()
    for (var i = 0; i < label.length; i++) {
        var randomColor = Math.floor(Math.random() * 16777215).toString(16);
        arrBgColor.push('#' + randomColor)
    }

    let massPopChart = new Chart(myChart, {
        type: type, // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data: {
            labels: label,
            datasets: [{
                data: data,
                backgroundColor: arrBgColor,
                borderWidth: 1,
                borderColor: '#777',
                hoverBorderWidth: 3,
                hoverBorderColor: '#000',
                borderRadius: 5,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: titleChart,
                fontSize: 25
            },
            legend: {
                display: false,
                position: 'right',
                labels: {
                    fontColor: '#000',
                },
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    bottom: 0,
                    top: 0
                }
            },
            tooltips: {
                enabled: true
            }
        }
    });
}

var status_order = ['Tổng các đơn hàng', 'Chưa xác nhận', 'Đang giao hàng', 'Hoàn Thành', 'Thất bại'];
var status_order2 = ['Chưa xác nhận', 'Đang giao hàng', 'Hoàn Thành', 'Thất bại'];

data.push('0')

createChart('myChart', title1, 'bar', status_order, data)
createChart('myChart2', title2, 'pie', status_order2, data2)

function statistical(start_date, end_date) {
    $('#start_date').val(start_date)
    $('#end_date').val(end_date)
}
