
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-list-alt"></span> Your current reports</h1></div><br/><br/>

<?php

    if($userDetails->policyCode != '' && $userDetails->policyCode != NULL && $userDetails->age != NULL && $userDetails->age != '') {
?>
    <iframe src="view_reports.php" style="width:600px; height:500px;" frameborder="0"></iframe>
<?php
    } else{ 
        echo "<h1 style='color: green;'>Your details are incomplete, kindly fill your details <a href='home.php?tag=update_entry'>here</a> to generate your reports.</h1>";
    }
?>
<br/><br/>
</div>