<?php
$db = new Database();
$query = $db->conn->query("
SELECT Monthname(date_report) as monthname, count(Report_ID) as bilang FROM `lto_report`
WHERE YEAR(date_report) = YEAR(now()) 
group by month(date_report)
");

foreach ($query as $data) {
    $month[] = $data['monthname'];
    $amount[] = $data['bilang'];
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
        </div

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
        </div



    </div>
    <hr>
    <div class="row row-cols-1 row-cols-md-6 g-1 ">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="col-md-12">
            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <hr>
</div>

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
          'rbga(168, 50, 105, 0.2)',

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
 
window.addEventListener('beforeprint', () => {
  myChart.resize(600, 600);
});
window.addEventListener('afterprint', () => {
  myChart.resize();
});
  </script>



