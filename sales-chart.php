  <?php
    include('includes/config.php');
    $query = mysqli_query($con, "SELECT tblproducts.CategoryName ,SUM(tblproducts.ProductPrice*tblsales.Quantity) as Cost from tblsales join tblproducts on tblsales.ProductId=tblproducts.id WHERE tblsales.InvoiceGenDate BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) AND CURRENT_DATE() GROUP BY tblproducts.CategoryName ");
    while ($row = mysqli_fetch_array($query)) {
        $cost[] = $row['Cost'];
        $labels[] = $row['CategoryName'];
    }
    ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
      <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
      <link href="dist/css/style.css" rel="stylesheet" type="text/css">
      <style>
          .chart {
              max-width: 600px;
              max-height: 600px;
              height: auto;
              margin: auto;
          }

          .piechart {
              max-width: 600px;
              max-height: 600px;
              margin: auto;
              height: auto;
          }

          .barchart {
              max-width: 600px;
              max-height: 600px;
              margin: auto;
              height: auto;
          }
      </style>
  </head>

  <body>


      <div class="container">
          <header>
              <div class="d-flex ">
                  <button type="button" id="weekly" class="btn btn-success btn-lg w-100 m-2">Weekly</button>
                  <button type="button" id="monthly" class="btn btn-warning btn-lg w-100 m-2">Monthly</button>
              </div>
          </header>
          <!-- Row -->
          <div class="row">
              <div class="col-xl-12">
                  <section class="hk-sec-wrapper">

                      <div class="row">
                          <div class="col-sm">
                              <div class="piechart" id="piechart"> </div>
                              <div class="barchart" id="barchart"> </div>
                              <div class="chart" id="chart">
                              </div>
                          </div>
                  </section>

              </div>
          </div>
      </div>

      <script src="vendors/jquery/dist/jquery.min.js"></script>
      <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
      <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="vendors/apexcharts/dist/apexcharts.js"></script>
      <!-- <script src="dist/js/index.js"></script> -->
      <script>
          const client = new XMLHttpRequest();

          function makeChart(context){
            if (context=='weekly') {
              getData('weekly-sales.php',"Weekly")
            } 
            if(context=='monthly') {
              getData('monthly-sales.php',"Monthly")
            }
          }


          function getData(url,ctx) {

                var url = window.location.origin + "/FRTMS/api/" + url
                client.open('GET', url, true)
                client.send(null)
                client.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        raw_data = JSON.parse(this.responseText)
                        var cost = raw_data.cost
                        var labels = raw_data.labels
                        renderPieChart(cost, labels, ctx)
                        renderBarChart(cost, labels, ctx)
                    }
                }
            }



          // Bar Graph
          function renderBarChart(raw_cost, labels, ctx) {

              const cost = []
              raw_cost.forEach(element => {
                  cost.push(parseInt(element))
              });



              var baroptions = {
                  series: [{
                      data: cost
                  }],
                  title: {
                      text: `${ctx}Total Cost Per Category`,
                      align: "left",
                      margin: 20,
                      offsetX: 0,
                      offsetY: 0,
                      floating: false,
                      style: {
                          fontSize: "24px",
                          fontWeight: "bold",
                          fontFamily: "verdana",
                          color: "#263238",
                          padding: '3rem'
                      },
                  },
                  chart: {
                      type: 'bar',
                      height: 350
                  },
                  plotOptions: {
                      bar: {
                          borderRadius: 4,
                          horizontal: false,
                      }
                  },
                  dataLabels: {
                      enabled: false
                  },
                  xaxis: {
                      categories: labels,
                  }
              };



              const el = document.getElementById("barchart");
              el.innerHTML = ""

              var barchart = new ApexCharts(el, baroptions);
              barchart.render();
          }

          // Bar Graph



          // Pie/ Donut Chart
          function renderPieChart(raw_cost, labels, ctx) {
              const cost = []
              // const context = ctx == 'monthly' ? "Monthly" : "Weekly"
              raw_cost.forEach(element => {
                  cost.push(parseInt(element))
              });

              var pieoptions = {
                  series: cost,
                  chart: {
                      width: 400,
                      type: 'donut',

                  },
                  legend: {
                              position: 'bottom',
                              offsetY:-10,
                              onItemHover:{
                                highlightDataSeries:true
                              },
                              onItemClick:{
                                toggleDataSeries:true
                              }
                          },
                  title: {
                      text: `${ctx} Total Cost Per Category`,
                      align: "left",
                      margin: 20,
                      offsetX: 0,
                      offsetY: 0,
                      floating: false,
                      style: {
                          fontSize: "24px",
                          fontWeight: "bold",
                          fontFamily: "verdana",
                          color: "#263238",
                          padding: '3rem'
                      },
                  },
                  labels: labels,
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

              const el = document.getElementById("piechart");
              el.innerHTML = ""

              var piechart = new ApexCharts(el, pieoptions);
              piechart.render();
          }

          //  Pie Chart End 


          


            

          // function renderChart(data) {
          //     const el = document.getElementById("chart");
          //     el.innerHTML = ''
          //     const series = []
          //     for (let index = 0; index < data.length; index++) {
          //         const item = array[index];

          //         if (item.CategoryName == 'cereals') {
          //             series[index] = {
          //                 name: "Cereals",

          //             }
          //         }

          //     }
          //     console.log(data)
          //     var data = null
          //     var now = new Date();
          //     var options = {
          //         chart: {
          //             height: 350,
          //             type: "line",
          //             stacked: false,
          //             // toolbar: {
          //             //   show: false,
          //             // },
          //         },
          //         dataLabels: {
          //             enabled: false,
          //         },
          //         colors: ["#FF1654", "#247BA0", "#8823e7"],
          //         series: [{
          //                 name: "Series A",
          //                 data: [14, 20, 25, 15, 25, 28, 38],
          //             },
          //             {
          //                 name: "Series B",
          //                 data: [20, 29, 37, 36, 44, 45, 50],
          //             },
          //             {
          //                 name: "Series c",
          //                 data: [10, 19, 32, 39, 42, 49, 55],
          //             },
          //         ],
          //         stroke: {
          //             width: [4, 4, 4],
          //         },
          //         plotOptions: {
          //             bar: {
          //                 columnWidth: "20%",
          //             },
          //         },
          //         title: {
          //             text: "Poultry Sales",
          //             align: "center",
          //             margin: 10,
          //             offsetX: 0,
          //             offsetY: 0,
          //             floating: false,
          //             style: {
          //                 fontSize: "18px",
          //                 fontWeight: "bold",
          //                 fontFamily: "verdana",
          //                 color: "#263238",
          //             },
          //         },
          //         xaxis: {
          //             categories: [
          //                 now.getDate() - 6,
          //                 now.getDate() - 5,
          //                 now.getDate() - 4,
          //                 now.getDate() - 3,
          //                 now.getDate() - 2,
          //                 now.getDate() - 1,
          //                 now.getDate(),
          //             ],
          //         },

          //         tooltip: {
          //             shared: false,
          //             intersect: true,
          //             x: {
          //                 show: false,
          //             },
          //         },
          //         legend: {
          //             horizontalAlign: "left",
          //             offsetX: 40,
          //         },
          //     };
          //     var chart = new ApexCharts(document.querySelector("#chart"), options);

          //     chart.render();
          // }




          $("#monthly").click(function(e) {
              e.preventDefault();
                makeChart('monthly')

          });

          $("#weekly").click(function(e) {
              e.preventDefault();
              makeChart('weekly')

          });
      </script>



  </body>

  </html>