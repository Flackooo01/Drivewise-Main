<?php
$db = new Database();
$query = $db->conn->query("
SELECT Monthname(date_report) as monthname, count(ID) as bilang FROM `lto_report`
WHERE YEAR(date_report) = YEAR(now()) 
group by month(date_report)
");

foreach ($query as $data) {
    $month[] = $data['monthname'];
    $amount[] = $data['bilang'];
}

$query1 = $db->conn->query("
select Vehicle_Violation as monthname, COUNT(Vehicle_Violation) as bilang from lto_report group by Vehicle_Violation
");

foreach ($query1 as $data) {
    $month1[] = $data['monthname'];
    $amount1[] = $data['bilang'];
}

$query2 = $db->conn->query("
select Vehicle_Type as monthname, COUNT(Vehicle_Type) as bilang from lto_report group by Vehicle_Type
");

foreach ($query2 as $data) {
    $month2[] = $data['monthname'];
    $amount2[] = $data['bilang'];
}

$query3 = $db->conn->query("
select Vehicle_Plate_No as monthname, COUNT(Vehicle_Plate_No) as bilang from lto_report group by Vehicle_Plate_No
");

foreach ($query3 as $data) {
    $month3[] = $data['monthname'];
    $amount3[] = $data['bilang'];
}



?>
<div class="container">
    <div class="row row-cols-1 row-cols-md-6 g-1 mt-3">
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-1" style="max-width: 18rem;">
                <div class="card-header"><h2><span class="bi-people"></span></h2></div>
                <div class="card-body">
                    <?php
                      $bilang = 0;
                      $queryy = "SELECT COALESCE((select count(*) from lto_userlist), 0) as val";
                      $mydb->setQuery($queryy);
                      $curr = $mydb->loadResultList();
                      foreach ($curr as $ress) {
                        $bilang = $ress->val;
                      }
                      echo ' <h5 class="card-title">' . $bilang . '</h5>';
                    ?>
                    <p class="card-text">Registered Users</p>
                </div>
            </div>  
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-dark mb-1" style="max-width: 18rem;">
                <div class="card-header"><h2><span class="bi-journal-arrow-up"></span></h2></div>
                <div class="card-body">
                    <?php
                      $bilang = 0;
                      $queryy = "SELECT COALESCE((select count(*) from lto_report), 0) as val";
                      $mydb->setQuery($queryy);
                      $curr = $mydb->loadResultList();
                      foreach ($curr as $ress) {
                        $bilang = $ress->val;
                      }
                      echo ' <h5 class="card-title">' . $bilang . '</h5>';
                    ?>
                    <p class="card-text">Total Reports</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-dark mb-1" style="max-width: 18rem;">
                <div class="card-header"><h2><span class="bi-journal-arrow-up"></span></h2></div>
                <div class="card-body">
                    <?php
                      $bilang = 0;
                      $queryy = "SELECT COALESCE((select count(*) from lto_report where Status='ONGOING'), 0) as val";
                      $mydb->setQuery($queryy);
                      $curr = $mydb->loadResultList();
                      foreach ($curr as $ress) {
                        $bilang = $ress->val;
                      }
                      echo ' <h5 class="card-title">' . $bilang . '</h5>';
                    ?>
                    <p class="card-text">Ongoing Reports</p>
                </div>
            </div>
          </div>

        <div class="col-md-3">
            <div class="card text-white bg-dark mb-1" style="max-width: 18rem;">
                <div class="card-header"><h2><span class="bi-journal-arrow-up"></span></h2></div>
                <div class="card-body">
                    <?php
                      $bilang = 0;
                      $queryy = "SELECT COALESCE((select count(*) from lto_report where Status='SOLVED'), 0) as val";
                      $mydb->setQuery($queryy);
                      $curr = $mydb->loadResultList();
                      foreach ($curr as $ress) {
                        $bilang = $ress->val;
                      }
                      echo ' <h5 class="card-title">' . $bilang . '</h5>';
                    ?>
                    <p class="card-text">Solved Reports</p>
                </div>
            </div>
          </div>



    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="container">
                <canvas id="myChart1"></canvas>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="container">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="container">
                <canvas id="myChart3"></canvas>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // === include 'setup' then 'config' above ===
    const labels = <?php echo json_encode($month) ?>;
    const data = {
      labels: labels,
      datasets: [{
        label: "Monthly Report",
        data: <?php echo json_encode($amount) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rbga(153, 168, 50, 0.2)',

          'rbga(74, 168, 50, 0.2)',
          'rbga(50, 168, 123, 0.2)',
          'rbga(50, 127, 168, 0.2)',
          'rbga(80, 50, 168, 0.2)',
          'rbga(168, 50, 105, 0.2)'

        ],
        borderColor: [
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black'
        ],
        borderWidth: 2
      }]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    var myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    function beforePrintHandler () {
    for (let id in Chart.instances) {
        Chart.instances[id].resize();
    }
}

    // === include 'setup' then 'config' above ===
    const labels1 = <?php echo json_encode($month1) ?>;
    const data1 = {
      labels: labels1,
      datasets: [{
        label: "Per Violation",
        data: <?php echo json_encode($amount1) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'

        ],
        borderColor: [
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black'
        ],
        borderWidth: 2
      }]
    };

    const config1 = {
      type: 'bar',
      data: data1,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    var myChart1 = new Chart(
      document.getElementById('myChart1'),
      config1
    );

    function beforePrintHandler () {
    for (let id in Chart.instances) {
        Chart.instances[id].resize();
    }
}

  // === include 'setup' then 'config' above ===
  const labels2 = <?php echo json_encode($month2) ?>;
    const data2 = {
      labels: labels2,
      datasets: [{
        label: "Per Vehicle",
        data: <?php echo json_encode($amount2) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'

        ],
        borderColor: [
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black'
        ],
        borderWidth: 2
      }]
    };

    const config2 = {
      type: 'bar',
      data: data2,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    var myChart2 = new Chart(
      document.getElementById('myChart2'),
      config2
    );

    function beforePrintHandler () {
    for (let id in Chart.instances) {
        Chart.instances[id].resize();
    }
}



 // === include 'setup' then 'config' above ===
 const labels3 = <?php echo json_encode($month3) ?>;
    const data3 = {
      labels: labels3,
      datasets: [{
        label: "Per Plate Number",
        data: <?php echo json_encode($amount3) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'

        ],
        borderColor: [
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black',
          'black'
        ],
        borderWidth: 2
      }]
    };

    const config3 = {
      type: 'bar',
      data: data3,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    var myChart3 = new Chart(
      document.getElementById('myChart3'),
      config3
    );

    function beforePrintHandler () {
    for (let id in Chart.instances) {
        Chart.instances[id].resize();
    }
}

window.addEventListener('beforeprint', () => {
  myChart.resize(600, 600);
});
window.addEventListener('afterprint', () => {
  myChart.resize();
});
  </script>