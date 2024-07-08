<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance Chart</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #top-div {
            width: 100%;
            padding: 10px;
            background-color: #f2f2f2;
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div id="top-div">This is a notification Div that will disappear after 5 seconds.</div>
    <div id="attendance-chart" style="width:100%; height:400px;"></div>

    <table id="attendance-table">
        <thead>
            <tr>
                <th>Month</th>
                <th>Degree</th>
                <th>Present</th>
                <th>Absent</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jan</td>
                <td>BS(SE)</td>
                <td>20</td>
                <td>5</td>
            </tr>
            <tr>
                <td>Feb</td>
                <td>BS(SE)</td>
                <td>18</td>
                <td>7</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" style="text-align:right">Total:</th>
                <th id="total-present"></th>
                <th id="total-absent"></th>
            </tr>
        </tfoot>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chartData = @json($attendanceChartData);

            Highcharts.chart('attendance-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Student Attendance Chart'
                },
                xAxis: {
                    categories: ['Present', 'Absent']
                },
                yAxis: {
                    title: {
                        text: 'Days'
                    }
                },
                series: chartData
            });

            $('#attendance-table th:contains("Jan"), #attendance-table td:contains("Jan"), #attendance-table th:contains("BS(SE)"), #attendance-table td:contains("BS(SE)")').css('background-color', 'green');

            setTimeout(function() {
                $('#top-div').fadeOut();
            }, 5000);

            var table = $('#attendance-table').DataTable({
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
                    
                   
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ? i : 0;
                    };

                    // Total over all pages
                    totalPresent = api.column(2).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    totalAbsent = api.column(3).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    // Total over this page
                    pageTotalPresent = api.column(2, { page: 'current' }).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    pageTotalAbsent = api.column(3, { page: 'current' }).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

            
                    $(api.column(2).footer()).html(pageTotalPresent);
                    $(api.column(3).footer()).html(pageTotalAbsent);
                },
                "columnDefs": [
                    { "orderable": false, "targets": 1 } 
                ]
            });
        });
    </script>
</body>
</html>
