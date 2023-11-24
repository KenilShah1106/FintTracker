@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('page-content')

    <div class="row sparkboxes mt-4 mb-4">
        <div class="col-md-4">
            <div class="box box1">
                <div id="spark1"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box2">
                <div id="spark2"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box3">
                <div id="spark3"></div>
            </div>
        </div>
    </div>

    <div class="row justify-content-around mb-3 mt-4">
        <div class="card-group col-md-2">
            <div class="card">
                <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Till This Month</span>
                    <div class="card-title h5 d-block text-darker">
                        Opening Balance
                    </div>
                    <h4 class="">
                        &#8377;{{$openingBalance}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-group col-md-2">
            <div class="card">
                <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Till This Month</span>
                    <div class="card-title h5 d-block text-darker">
                        Closing Balance
                    </div>
                    <h4 class="">
                        &#8377;{{$closingBalance}}
                    </h4>
                </div>
            </div>
        </div>
        {{-- <div class="card-group col-md-2">
            <div class="card">
                <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">This Month</span>
                    <div class="card-title h5 d-block text-darker">
                        Highest Spend
                    </div>
                    <h4 class="">
                        &#8377;{{$highestSpend}}
                    </h4>
                </div>
            </div>
        </div> --}}
        <div class="card-group col-md-2">
            <div class="card">
                <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Till This Month</span>
                    <div class="card-title h5 d-block text-darker">
                        Total Money In
                    </div>
                    <h4 class="">
                        &#8377;{{$totalMoneyIn}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-group col-md-2">
            <div class="card">
                <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Till This Month</span>
                    <div class="card-title h5 d-block text-darker">
                        Total Money Out
                    </div>
                    <h4 class="">
                        &#8377;{{$totalMoneyOut}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex w-100 justify-content-end">
        {{-- <button class="btn btn-outline-primary" id="generateReport" disabled>
            Generate Report
        </button> --}}
        <button class="btn btn-primary" type="button" id="generateReport" disabled>
            <div class="d-flex">
                <div class="d-none me-2" id="spinnerWrapper">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                Generate Report
            </div>
        </button>
    </div>
    <div class="row justify-content-sm-around">
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Transaction Types</div>
            <div class="card-body p-3">
                <div id="transaction_type_pie">
                </div>
            </div>
        </div>
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Transaction Categories</div>
            <div class="card-body p-3">
                <div id="category_pie">
                </div>
            </div>
        </div>
    </div>




    <div class="row justify-content-sm-around mt-5">
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Transaction trends by month</div>
            <div class="card-body p-3">
                <div id="transaction_type_line">
                </div>
            </div>
        </div>
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Transaction trends by categories</div>
            <div class="card-body p-3">
                <div id="category_line">
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-sm-around mt-5">
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Category trends by amount spend</div>
            <div class="card-body p-3">
                <div id="category_amount_line">
                </div>
            </div>
        </div>
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Categories and amount spend in each month</div>
            <div class="card-body p-3">
                <div id="category_month_amount_line">
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-sm-around mt-5">
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Bubble chart</div>
                <div class="card-body p-3">
                    <div id="bubble_chart"></div>
                </div>
        </div>
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Heatmap</div>
                <div class="card-body p-3">
                    <div id="heatmap_chart"></div>
                </div>
        </div>
    </div>
   

    <div class="row justify-content-sm-around mt-5">
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Treemap</div>
                <div class="card-body p-3">
                    <div id="treemap_chart"></div>
                </div>
        </div>
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
        <div class="card-title p-3 fw-bolder fs-2">Radar Chart</div>
        <div class="card-body p-3">
            <div id="radar_chart"></div>
        </div>
    </div>
    </div>
   
    <div class="row justify-content-sm-around mt-5">
        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Polar Area Chart</div>
            <div class="card-body p-3">
                <div id="polar_area_chart"></div>
            </div>
        </div>

        <div class="card mb-3 p-1 d-flex justify-content-center col-md-5">
            <div class="card-title p-3 fw-bolder fs-2">Box Plot</div>
                <div class="card-body p-3">
                    <div id="box_plot_chart"></div>
                </div>
        </div>
        
    </div>


@endsection

@section('page-scripts')


    <script>

        let transactionTypesData = <?php echo json_encode($typePercentageMapping); ?>;;
        let labelsArray = <?php echo json_encode($transactionsTypes); ?>;;
        var typeOptions = {
            series: transactionTypesData,
            chart: {
                width: 500,
                type: 'pie',
            },
            labels: labelsArray,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        let categoryPercentData = <?php echo json_encode($categoryPercentageMapping); ?>;
        labelsArray = <?php echo json_encode($categories); ?>;
        var categoriesOptions = {
            series: categoryPercentData,
            chart: {
                width: 500,
                type: 'pie',
            },
            labels: labelsArray,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        let monthWiseData =  <?php echo json_encode($monthWiseData); ?>;
        var typeOptionsLine = {
            series: [{
                name: "Transactions",
                data: monthWiseData
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Transaction Trends by Month',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            }
        };

        let categoryWiseData = <?php echo json_encode($categoryWiseData); ?>;;
        let categoriesArray = <?php echo json_encode($categories); ?>;
        var categoriesOptionsLine = {
            series: [{
                name: "Transactions",
                data: categoryWiseData
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Transaction Trends by Categories',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: categoriesArray,
            }
        };

        let categoryAmountWiseData = <?php echo json_encode($categoryAmountWiseData); ?>;


        var categoryAmountOptions = {
            series: [{
                name: "Amount",
                data: categoryAmountWiseData
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Category Trends by amount',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: categoriesArray,
            }
        };

        let categoryMonthAmountWiseData = <?php echo json_encode($categoryMonthAmountWiseData); ?>;
        let shoppingData = categoryMonthAmountWiseData['Shopping']
        let financeData = categoryMonthAmountWiseData['Finance']
        let travelData = categoryMonthAmountWiseData['Travel']
        let foodData = categoryMonthAmountWiseData['food']
        let miscData = categoryMonthAmountWiseData['miscellaneous']

        var categoryMonthAmountOptions = {
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: true
                },
                zoom: {
                    enabled: true
                }
            },
            series: [{
                name: "Shopping",
                data: shoppingData
            },
            {
                name: "Finance",
                data: financeData
            },
            {
                name: "Travel",
                data: travelData
            },
            {
                name: "food",
                data: foodData
            },
            {
                name: "miscellaneous",
                data: miscData
            },

            ],

            plotOptions: {
                    bar: {
                        horizontal: false,
                    }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
            },
            fill: {
                opacity: 1
            }
        };

        let heatmapData = [
    {
        x: 'Shopping',
        y: 'UPI',
        value: 200  // intensity
    },
    {
        x: 'Finance',
        y: 'Bank Transfer',
        value: 150
    },
    // Add more data points for other categories and types...
];

var heatmapOptions = {
    series: [{
        data: heatmapData
    }],
    chart: {
        height: 350,
        type: 'heatmap',
    },
    plotOptions: {
        heatmap: {
            radius: 10,  // adjust the radius of each data point
        }
    },
    dataLabels: {
        enabled: false
    },
    title: {
        text: 'Heatmap',
        align: 'left'
    },
    xaxis: {
        type: 'category',
        categories: ['Shopping', 'Finance', 'Travel', 'Food', 'Miscellaneous']
    },
    yaxis: {
        type: 'category',
        categories: ['UPI', 'Bank Transfer', 'Cash']
    },
    colorScale: {
        ranges: [
            {
                from: 0,
                to: 100,
                color: '#D9534F',  // color for lower intensity
                name: 'Low'
            },
            {
                from: 101,
                to: 200,
                color: '#5BC0DE',  // color for medium intensity
                name: 'Medium'
            },
            {
                from: 201,
                to: 300,
                color: '#5CB85C',  // color for higher intensity
                name: 'High'
            }
        ]
    },
    tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
            return '<div class="tooltip">' +
                '<span>' + w.globals.labels[dataPointIndex.y] + ' - ' + w.globals.labels[dataPointIndex.x] + '</span>' +
                '<span>Intensity: ' + w.config.series[seriesIndex].data[dataPointIndex].value + '</span>' +
                '</div>';
        }
    }
};

var heatmapChart = new ApexCharts(document.querySelector("#heatmap_chart"), heatmapOptions);
heatmapChart.render();

        var transactionLineChart = new ApexCharts(document.querySelector("#transaction_type_line"), typeOptionsLine);
        transactionLineChart.render();

        var categoryLineChart = new ApexCharts(document.querySelector("#category_line"), categoriesOptionsLine);
        categoryLineChart.render();

        let transactionPieChart = new ApexCharts(document.querySelector("#transaction_type_pie"), typeOptions);
        let categoryPieChart = new ApexCharts(document.querySelector("#category_pie"), categoriesOptions);

        transactionPieChart.render();
        // setTimeout(function () {
        //     chart.dataURI().then(({ imgURI, blob }) => {
        //         $.ajax({
        //             url: "{{route('storeImageFromUri')}}",
        //             type: "POST",
        //             data: {
        //                 _token: "{{ csrf_token() }}",
        //                 image: imgURI,
        //                 type: 'transaction_type_pie'
        //             },
        //             success: function (data) {
        //                 console.log(data);
        //             }
        //         });
        //     });
        //         // var pdf = new jsPDF();
        //         // pdf.addImage(imgURI, 'PNG', 50, 50);
        //         // pdf.save("download.pdf");
        // }, 1000);

        categoryPieChart.render();

        var categoryAmountChart = new ApexCharts(document.querySelector("#category_amount_line"), categoryAmountOptions);
        categoryAmountChart.render();

        var categoryMonthAmountChart = new ApexCharts(document.querySelector("#category_month_amount_line"), categoryMonthAmountOptions);
        categoryMonthAmountChart.render();

        const generateReportBtn = $('#generateReport');
        setTimeout(function () {
            generateReportBtn.prop('disabled', false);
            generateReportBtn.click(function () {
                generateReportBtn.prop('disabled', true);
                $('#spinnerWrapper').removeClass('d-none');
                generateReport(transactionPieChart);
            });
        }, 1000);

        let bubbleChartData = [
    {
        x: 'Shopping',
        y: 200,  // transaction amount
        z: 10   // bubble size
    },
    {
        x: 'Finance',
        y: 150,
        z: 8
    },
    // Add more data points for other categories...
];

let treemapData = [
    {
        x: 'Shopping',
        y: 'UPI',
        value: 200  // transaction amount
    },
    {
        x: 'Shopping',
        y: 'Bank Transfer',
        value: 100
    },
    {
        x: 'Finance',
        y: 'UPI',
        value: 150
    },
    {
        x: 'Finance',
        y: 'Bank Transfer',
        value: 120
    },
    // Add more data points for other categories and types...
];

var treemapOptions = {
    series: [{
        data: treemapData
    }],
    chart: {
        height: 350,
        type: 'treemap',
    },
    title: {
        text: 'Treemap',
        align: 'left'
    },
    tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
            return '<div class="tooltip">' +
                '<span>' + w.globals.labels[dataPointIndex.x] + ' - ' + w.globals.labels[dataPointIndex.y] + '</span>' +
                '<span>Transaction Amount: &#8377;' + w.config.series[seriesIndex].data[dataPointIndex].value + '</span>' +
                '</div>';
        }
    }
};

var treemapChart = new ApexCharts(document.querySelector("#treemap_chart"), treemapOptions);
treemapChart.render();

var bubbleChartOptions = {
    series: [{
        data: bubbleChartData
    }],
    chart: {
        height: 350,
        type: 'bubble',
    },
    dataLabels: {
        enabled: false
    },
    title: {
        text: 'Bubble Chart',
        align: 'left'
    },
    xaxis: {
        type: 'category',
        categories: ['Shopping', 'Finance', 'Travel', 'Food', 'Miscellaneous']
    },
    yaxis: {
        title: {
            text: 'Transaction Amount'
        }
    },
    tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
            return '<div class="tooltip">' +
                '<span>' + w.globals.labels[dataPointIndex] + '</span>' +
                '<span>Transaction Amount: &#8377;' + w.config.series[seriesIndex].data[dataPointIndex].y + '</span>' +
                '<span>Bubble Size: ' + w.config.series[seriesIndex].data[dataPointIndex].z + '</span>' +
                '</div>';
        }
    }
};

// Assuming you have the necessary data for the Polar Area Chart
let polarAreaChartData = [
    {
        category: 'Shopping',
        amount: 200
    },
    {
        category: 'Finance',
        amount: 150
    },
    // Add more data points for other categories...
];

var polarAreaChartOptions = {
    series: polarAreaChartData.map(data => data.amount),
    chart: {
        height: 350,
        type: 'polarArea',
    },
    title: {
        text: 'Polar Area Chart',
        align: 'left'
    },
    labels: polarAreaChartData.map(data => data.category),
    fill: {
        opacity: 0.8,
        colors: ['#5CB85C', '#5BC0DE', '#D9534F', '#F0AD4E', '#337AB7'] // Customize colors as needed
    },
    tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
            const category = w.globals.labels[dataPointIndex];
            const amount = w.config.series[seriesIndex][dataPointIndex];

            return '<div class="tooltip">' +
                '<span>' + category + '</span>' +
                '<span>Amount: &#8377;' + amount + '</span>' +
                '</div>';
        }
    }
};

var polarAreaChart = new ApexCharts(document.querySelector("#polar_area_chart"), polarAreaChartOptions);
polarAreaChart.render();


// Assuming you have the necessary data for the Radar Chart
let radarChartData = [
    {
        category: 'Shopping',
        amount: 200,
        frequency: 5,
        // Add more attributes...
    },
    {
        category: 'Finance',
        amount: 150,
        frequency: 3,
        // Add more attributes...
    },
    // Add more data points for other categories...
];

let boxPlotData = [
    {
        category: 'Shopping',
        amounts: [100, 150, 200, 250, 300, 400] // Example amounts for Shopping category
    },
    {
        category: 'Finance',
        amounts: [50, 100, 150, 200, 250, 300] // Example amounts for Finance category
    },
    // Add more data points for other categories...
];

var boxPlotOptions = {
    series: boxPlotData.map(data => ({
        name: data.category,
        data: [data.amounts]
    })),
    chart: {
        height: 350,
        type: 'boxPlot',
    },
    title: {
        text: 'Box Plot',
        align: 'left'
    },
    xaxis: {
        categories: boxPlotData.map(data => data.category),
    },
    yaxis: {
        title: {
            text: 'Transaction Amount'
        }
    },
    tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
            const category = w.globals.labels[dataPointIndex];
            const q1 = w.config.series[seriesIndex].data[dataPointIndex].q1;
            const median = w.config.series[seriesIndex].data[dataPointIndex].median;
            const q3 = w.config.series[seriesIndex].data[dataPointIndex].q3;
            const low = w.config.series[seriesIndex].data[dataPointIndex].low;
            const high = w.config.series[seriesIndex].data[dataPointIndex].high;

            return '<div class="tooltip">' +
                '<span>' + category + '</span>' +
                '<span>Q1: &#8377;' + q1 + '</span>' +
                '<span>Median: &#8377;' + median + '</span>' +
                '<span>Q3: &#8377;' + q3 + '</span>' +
                '<span>Low: &#8377;' + low + '</span>' +
                '<span>High: &#8377;' + high + '</span>' +
                '</div>';
        }
    }
};

var boxPlotChart = new ApexCharts(document.querySelector("#box_plot_chart"), boxPlotOptions);
boxPlotChart.render();

var radarChartOptions = {
    series: [{
        name: 'Attributes',
        data: radarChartData.map(data => [data.amount, data.frequency]) // Map your attributes here
    }],
    chart: {
        height: 350,
        type: 'radar',
    },
    title: {
        text: 'Radar Chart',
        align: 'left'
    },
    xaxis: {
        categories: radarChartData.map(data => data.category),
    },
    yaxis: {
        labels: {
            show: false, // You can customize this based on your preference
        }
    },
    tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
            const category = w.globals.labels[dataPointIndex];
            const amount = w.config.series[seriesIndex].data[dataPointIndex][0];
            const frequency = w.config.series[seriesIndex].data[dataPointIndex][1];

            return '<div class="tooltip">' +
                '<span>' + category + '</span>' +
                '<span>Amount: &#8377;' + amount + '</span>' +
                '<span>Frequency: ' + frequency + '</span>' +
                '</div>';
        }
    }
};

var radarChart = new ApexCharts(document.querySelector("#radar_chart"), radarChartOptions);
radarChart.render();


var bubbleChart = new ApexCharts(document.querySelector("#bubble_chart"), bubbleChartOptions);
bubbleChart.render();



        function generateReport(transactionPieChart) {
            let transactionPieImage,categoryPieImage, categoryAmountImage, categoryMonthAmountImage, transactionLineImage, categoryLineImage;
            let promise1 = transactionPieChart.dataURI().then(({ imgURI, blob }) => {
                transactionPieImage = imgURI;
            });

            let promise2 = categoryPieChart.dataURI().then(({ imgURI, blob }) => {
                categoryPieImage = imgURI;
            });

            let promise3 = transactionLineChart.dataURI().then(({ imgURI, blob }) => {
                transactionLineImage = imgURI;
            });

            let promise4 = categoryLineChart.dataURI().then(({ imgURI, blob }) => {
                categoryLineImage = imgURI;
            });

            let promise5 =categoryAmountChart.dataURI().then(({ imgURI, blob }) => {
                categoryAmountImage = imgURI;
            });

            let promise6 =categoryMonthAmountChart.dataURI().then(({ imgURI, blob }) => {
                categoryMonthAmountImage = imgURI;
            });

            const promises = [promise1, promise2, promise3, promise4, promise5, promise6];

            Promise.all(promises).then(() => {

                $.ajax({
                        url: "{{route('storeImageFromUri')}}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            images: [transactionPieImage, categoryPieImage, transactionLineImage, categoryLineImage, categoryAmountImage, categoryMonthAmountImage],
                            stats: [transactionTypesData, categoryPercentData, monthWiseData, categoryWiseData, categoryAmountWiseData, categoryMonthAmountWiseData]
                        },
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function (data) {
                            console.log(data);
                            generateReportBtn.prop('disabled', false);
                            $('#spinnerWrapper').addClass('d-none');
                            var blob = new Blob([data]);
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = "report.pdf";
                            link.click();
                        }
                });
            });
        }

    </script>
@endsection
