
<?php
// connect to database
$con = mysqli_connect('localhost:3307','root','','cas');
mysqli_select_db($con, 'pagination');

// define how many results you want per page
$results_per_page = 10;

// find out the number of results stored in database
$sql='SELECT * FROM research';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

?>
<div class="container">

<div class="row">

    <h3 class="text-center mt-3"><span class="bi-search"></span> Search here. . .</h3>
        <div class="table-responsive">
            <table id="" class="table table-bordered  table-hover">
                <thead class="table-warning">
                    <th>Reasearch Title</th> 
                </thead>
                <tbody>

<?php
// retrieve selected results from database and display them on page
$sql=" SELECT a.ResearchID,Concat('REF ', LPAD(a.ResearchID,10,0)) as Reference, 
a.Research,a.Tags,a.Location,a.Abstract,
SUBSTRING(a.Tags,1,CHAR_LENGTH(a.Tags) - 2) as newTags
FROM `research` a  LIMIT  " . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
    ?>
                            <tr>
                            <td>
                            <a href="index.php?q=researchabstract&id=<?php echo $row['ResearchID'] ?>">
                            <h5><?php echo $row['Research'] ?></h5>
                            </a>
                            <?php echo $row['Abstract'] ?>
                            <br>
                            <hr>
                            <?php echo 'Tags: ('. $row['newTags'] . ')' ?>
                            </td>
                            </tr>

    <?php
}
// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<a href="pagination.php?page=' . $page . '">' . $page . '</a> ';
  }
?>
                    </tbody>
                </table>
            </div> 
    </div>
</div
<?php



?>


