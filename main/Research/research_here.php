<?php 
require_once("include/initialize.php");
$userid = $_SESSION['UserID'];
$Course=$_SESSION['Course'] ;

if(isset($_POST['search']))
{
    if ($_POST['valueToSearch']=="")
    {
        $valueToSearch = $valueToSearch ="";
        // search in all table columns
        // using concat mysql function
        $query = "SELECT 
        a.ResearchID,Concat('REF ', LPAD(a.ResearchID,10,0)) as Reference, 
        a.Research,a.Tags,a.Location,a.Abstract,
        SUBSTRING(a.Tags,1,CHAR_LENGTH(a.Tags) - 2) as newTags
        FROM `research` a 
        WHERE CONCAT(`ResearchID`, `Research`, `Tags`, `Abstract`) LIKE '%".$valueToSearch."%' 
        ORDER BY a.Views DESC";
        $search_result = filterTable($query);  
        //redirect("index.php?q=research_here");  
    }
    else
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT 
        a.ResearchID,Concat('REF ', LPAD(a.ResearchID,10,0)) as Reference, 
        a.Research,a.Tags,a.Location,a.Abstract,
        SUBSTRING(a.Tags,1,CHAR_LENGTH(a.Tags) - 2) as newTags
        FROM `research` a 
        WHERE CONCAT(`ResearchID`, `Research`, `Tags`, `Abstract`) LIKE '%".$valueToSearch."%' ORDER BY a.Views DESC";
        $search_result = filterTable($query);  
       // redirect("index.php?q=research_here");
    }

}
else {
    
    $valueToSearch ="~!@#$%^&*()_+";
    $query = "SELECT 
    a.ResearchID,Concat('REF ', LPAD(a.ResearchID,10,0)) as Reference, 
    a.Research,a.Tags,a.Location,a.Abstract,
    SUBSTRING(a.Tags,1,CHAR_LENGTH(a.Tags) - 2) as newTags
    FROM `research` a 
    JOIN myread b on b.ResearchID=a.ResearchID
    JOIN user_access c on c.UserID=b.UserID
    WHERE 1=1
    AND b.UserID<>'$userid'
    AND c.Course='$Course'
    ORDER BY a.Views DESC";
    $search_result = filterTable($query);
    //redirect("index.php?q=research_here");
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost:3307", "root", "", "cas");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<div class="container">
<form action="" method="post">
    <div class="row">
    <h3 class="text-center mt-3"><span class="bi-search"></span> Search here. . .</h3>
        <div class="col-md-3">

        </div>
        <div class="col-md-5">
            <input type="text" name="valueToSearch" class="form-control" value = "<?php echo isset($_POST['valueToSearch']) ? $_POST['valueToSearch'] : ''; ?>" placeholder="Search here. . .">
        </div>
        <div class="col-md-1">
            <button type="submit" name="search"  class="btn btn-primary btn-sm"><span class="bi-search"></span></button>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <div class="row mt-3">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered ">
                    <thead class="table-warning">
                        <th>Research Title</th> 
                    </thead>
                    <tbody>
                        
                        <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td>
                        <a href="index.php?q=researchabstract&id=<?php echo $row['ResearchID'] ?>">
                            <h5>
                            <?php 
                                $str = $row['Research'];
                                $delimiter = ' ';
                                $words = explode($delimiter, $str);

                                foreach ($words as $word) {

                                if ($word==$valueToSearch || $word==ucwords($valueToSearch)) {
                                    echo '<strong>'.strtoupper($word).' '.'</strong>';
                                }
                                else{
                                    echo strtoupper($word) . ' ';
                                }
                                
                                }
                            ?>
                            </h5>
                        </a>
                  
                        <?php 
                        $str = $row['Abstract'];
                        $delimiter = ' ';
                        $words = explode($delimiter, $str);

                        foreach ($words as $word) {

                        if ($word==$valueToSearch || $word==ucwords($valueToSearch)) {
                            echo '<strong>'.$word.' '.'</strong>';
                        }
                        else{
                            echo $word . ' ';
                        }
                        
                        }

                        ?>
                        <br>
                        <hr>
                        <?php 
                       
                        $str = $row['newTags'];
                        $delimiter = ' ';
                        $words = explode($delimiter, $str);
                        
                        echo 'Tags: ';
                        foreach ($words as $word) {

                        if ($word==$valueToSearch || $word==ucwords($valueToSearch)) {
                            echo '<strong>'.$word.' '.'</strong>';
                        }
                        else{
                            echo  $word . ' ';
                        }
                        
                        }
                        ?>
                    </td>
                </tr>
                <?php endwhile;?>
                    </tbody>

                    
                </table>
            </div> 
    </div>

</form>
</div>


