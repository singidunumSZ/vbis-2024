<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="from">From:</label>
                        <input type="date" class="form-control date-helper" placeholder="From" id="from">
                    </div>
                    <div class="col-md-6">
                        <label for="from">To:</label>
                        <input type="date" class="form-control date-helper" placeholder="To" id="to">
                    </div>
                </div>
                <div class="chart">
                    <div id="price-per-user-canvas">
                        <canvas id="price-per-user"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart">
                    <div id="number-of-purchases-s-canvas">
                        <canvas id="number-of-purchases-s"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart">
                    <div id="number-of-purchases-m-canvas">
                        <canvas id="number-of-purchases-m"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart">
                    <div id="number-of-purchases-l-canvas">
                        <canvas id="number-of-purchases-l"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        generatePricePerUser();
        generateNumberOfPurchasesS();
        generateNumberOfPurchasesM();
        generateNumberOfPurchasesL();


        $(".date-helper").change(function () {
            generatePricePerUser();
        });
    });

    function generatePricePerUser() {
        $("#price-per-user-canvas").empty();
        $("#price-per-user-canvas").append(
            ' <canvas id="price-per-user"' +
            'style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"' +
            'class="chartjs-render-monitor"></canvas>'
        );

        let from = $("#from").val();
        let to = $("#to").val();

        let url = `/getPricePerUser?from=${from}&to=${to}`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.email;
            });

            let values = result.map(function (e) {
                return e.price;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Price per user",
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', // Prvi stub
                            'rgba(54, 162, 235, 0.2)', // Drugi stub
                            'rgba(255, 206, 86, 0.2)', // Treći stub
                            'rgba(75, 192, 192, 0.2)'  // Četvrti stub
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', // Ivica prvog stuba
                            'rgba(54, 162, 235, 1)', // Ivica drugog stuba
                            'rgba(255, 206, 86, 1)', // Ivica trećeg stuba
                            'rgba(75, 192, 192, 1)'  // Ivica četvrtog stuba
                        ],
                        borderWidth: 1
                    }]
            }

            let options = {}

            let graph = $("#price-per-user").get(0).getContext('2d');

            createGraph(setData, graph, 'bar', options);
        });
    }
    function generateNumberOfPurchasesS() {
        let url = `/getNumberOfPurchasesS`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.email;
            });

            let values = result.map(function (e) {
                return e.number_of_products;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Number of purchases size S",
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', // Prvi stub
                            'rgba(54, 162, 235, 0.2)', // Drugi stub
                            'rgba(255, 206, 86, 0.2)', // Treći stub
                            'rgba(75, 192, 192, 0.2)'  // Četvrti stub
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', // Ivica prvog stuba
                            'rgba(54, 162, 235, 1)', // Ivica drugog stuba
                            'rgba(255, 206, 86, 1)', // Ivica trećeg stuba
                            'rgba(75, 192, 192, 1)'  // Ivica četvrtog stuba
                        ],
                        borderWidth: 1
                    }]
            }

            let options = {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Users' // Naslov X osi (npr. "Korisnici")
                        },

                    },

                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14, // Veličina fonta
                                family: 'Arial', // Tip fonta
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,

                        titleFont: { size: 16 },
                        bodyFont: { size: 14 }
                    }
                }}

            let graph = $("#number-of-purchases-s").get(0).getContext('2d');

            createGraph(setData, graph, 'bar', options);
        });
    }
    function generateNumberOfPurchasesM() {
        let url = `/getNumberOfPurchasesM`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.email;
            });

            let values = result.map(function (e) {
                return e.number_of_products;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Number of purchases size M",
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', // Prvi stub
                            'rgba(54, 162, 235, 0.2)', // Drugi stub
                            'rgba(255, 206, 86, 0.2)', // Treći stub
                            'rgba(75, 192, 192, 0.2)'  // Četvrti stub
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', // Ivica prvog stuba
                            'rgba(54, 162, 235, 1)', // Ivica drugog stuba
                            'rgba(255, 206, 86, 1)', // Ivica trećeg stuba
                            'rgba(75, 192, 192, 1)'  // Ivica četvrtog stuba
                        ],
                        borderWidth: 1
                    }]
            }

            let options = {scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Users' // Naslov X osi (npr. "Korisnici")
                        },

                    },

                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14, // Veličina fonta
                                family: 'Arial', // Tip fonta
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,

                        titleFont: { size: 16 },
                        bodyFont: { size: 14 }
                    }
                }}

            let graph = $("#number-of-purchases-m").get(0).getContext('2d');

            createGraph(setData, graph, 'bar', options);
        });
    }
    function generateNumberOfPurchasesL() {
        let url = `/getNumberOfPurchasesL`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.email;
            });

            let values = result.map(function (e) {
                return e.number_of_products;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Number of purchases size L",
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', // Prvi stub
                            'rgba(54, 162, 235, 0.2)', // Drugi stub
                            'rgba(255, 206, 86, 0.2)', // Treći stub
                            'rgba(75, 192, 192, 0.2)'  // Četvrti stub
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', // Ivica prvog stuba
                            'rgba(54, 162, 235, 1)', // Ivica drugog stuba
                            'rgba(255, 206, 86, 1)', // Ivica trećeg stuba
                            'rgba(75, 192, 192, 1)'  // Ivica četvrtog stuba
                        ],
                        borderWidth: 1

                    }]
            }

            let options = {scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Users' // Naslov X osi (npr. "Korisnici")
                        },

                    },

                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14, // Veličina fonta
                                family: 'Arial', // Tip fonta
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,

                        titleFont: { size: 16 },
                        bodyFont: { size: 14 }
                    }
                }}

            let graph = $("#number-of-purchases-l").get(0).getContext('2d');

            createGraph(setData, graph, 'bar', options);
        });
    }





    function createGraph(setData, graph, chartType, options) {
        new Chart(graph, {
            type: chartType,
            data: setData,
            options: options
        });
    }
</script>
