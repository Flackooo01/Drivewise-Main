<?php 
require_once("include/initialize.php");
$userid = $_SESSION['UserID'];
$Course = $_SESSION['Course'];
$id = 	$_GET['id'];
$Research = New Research();
$res = $Research->single_data($id);
$Research = $res->Research;
$ResearchID = $res->ResearchID;
$Location = $res->Location;
$Abstract = $res->Abstract;
$Tags = $res->Tags;

$sql = "UPDATE `research` set `Views` = (`Views`+1) where `ResearchID`='$ResearchID'";
$mydb->setQuery($sql);
$mydb->executeQuery();

$sql1 = "SELECT * From myread WHERE UserID = '$userid' AND ResearchID='$ResearchID'";
$mydb->setQuery($sql1);
$row = $mydb->executeQuery();
$maxrow = $mydb->num_rows($row);

if ($maxrow > 0) {
    //nothing to do
} else {
    $sql2 = "INSERT INTO myread (`UserID`,`ResearchID`,`Course`) VALUES ('$userid','$ResearchID','$Course')";
    $mydb->setQuery($sql2);
    $mydb->executeQuery();
}

?>

<div class="container">
    <div class="row">
        <h4 class="text-center mt-3"><span class="bi-book-fill"></span> Abstract</h4>
        <hr>
        <h5><?php echo $Research?></h5>
        <p><?php echo $Abstract?></p>
        <a href="<?php echo web_root.$Location?>" target="_blank">View full document</a>
    </div>
    <hr>

    
        <?php 
            if($_SESSION['UserType']=="Student")
            {

                $sql = "SELECT * From mysave WHERE ResearchID = '{$ResearchID}' AND UserID='{$_SESSION['UserID']}'";
                $mydb->setQuery($sql);
                $row = $mydb->executeQuery();
                $maxrow = $mydb->num_rows($row);
                if ($maxrow>0) { 
                ?> 
                    <a title="Saved"  class="btn btn-warning btn-sm savethisdelete" data-id="<?php echo $ResearchID ?>"> <span class="bi-star"></span></a>
                    <?php
                }else{ 
                    ?>
                    <a title="Save this?"  class="btn btn-outline-warning btn-sm savethis"  data-id="<?php echo $ResearchID ?>"> <span class="bi-star"></span></a>
                    <?php } 
                    
                    $sql = "SELECT * From mycite WHERE ResearchID = '{$ResearchID}' AND UserID='{$_SESSION['UserID']}'";
                    $mydb->setQuery($sql);
                    $row = $mydb->executeQuery();
                    $maxrow = $mydb->num_rows($row);
                    if ($maxrow>0) { 
                    ?>
                    <a title="Cited"  class="btn btn-success btn-sm citethisdelete" data-id="<?php echo $ResearchID ?>"> <span class="bi-chat-left-quote"></span></a>
                <?php
                }else{ 
                    ?>
                    <a title="Cite this?"  class="btn btn-outline-success btn-sm citethis"  data-id="<?php echo $ResearchID ?>"> <span class="bi-chat-left-quote"></span></a>
                    <?php } ?>

                    

                    
        <?php }
        else{
            ?>
             <a title="Cite"  class="btn btn-outline-success btn-sm citethis"  data-id="<?php echo $ResearchID ?>"> <span class="bi-chat-left-quote"></span></a>
        <?php
        }
        ?>
         <a title="Cited by"  class="btn btn-outline-success btn-sm referencethis"  data-id="<?php echo $ResearchID ?>"> 100</a>
        <a title="Pin as Reference"  class="btn btn-outline-primary btn-sm referencethis"  data-id="<?php echo $ResearchID ?>"> <span class="bi-pin-angle"></span></a>
        <hr>


        <div class="row">
        <h4 class="text-center mt-3"><span class="bi-lightbulb"></span> Related Research</h4>
        <hr>
        <div class="table-responsive">
                <table id="" class="table table-bordered  table-hover">
                    <thead class="table-warning">
                        <th>Reasearch Title</th> 
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $sql = "SELECT a.ResearchID,Concat('REF ', LPAD(a.ResearchID,10,0)) as Reference, 
                        a.Research,a.Tags,a.Location,a.Abstract,
                        SUBSTRING(a.Tags,1,CHAR_LENGTH(a.Tags) - 2) as newTags
                        FROM `research` a 
                        WHERE a.ResearchID<>'$ResearchID'";
                        $mydb->setQuery($sql);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {

                            if (wordSimilarity($Tags,$result->Tags)>0)
                            {

                            
                            ?>
                            <tr>
                            <td>
                            <a href="index.php?q=researchabstract&id=<?php echo $result->ResearchID ?>">
                            <h5><?php echo strtoupper($result->Research) ?></h5>
                            </a>
                            <?php echo $result->Abstract  ?>
                            <hr>
                            <?php echo 'Tags: ('. $result->newTags . ')' ?>
                            </td>
                            </tr>
                            <?php
                            }
                        }
                                function wordSimilarity($s1,$s2) {

                                    $words1 = preg_split('/\s+/',$s1);
                                    $words2 = preg_split('/\s+/',$s2);
                                    $diffs1 = array_diff($words2,$words1);
                                    $diffs2 = array_diff($words1,$words2);
                                
                                    $diffsLength = strlen(join("",$diffs1).join("",$diffs2));
                                    $wordsLength = strlen(join("",$words1).join("",$words2));
                                    if(!$wordsLength) return 0;
                                
                                    $differenceRate = ( $diffsLength / $wordsLength );
                                    $similarityRate = 1 - $differenceRate;
                                    return $similarityRate;
                                
                                }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>

