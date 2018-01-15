
<link rel="stylesheet" type="text/css" href="css/style_view.css" />

<!-- for form Register-->
<div>
  		<div><h1><span class="glyphicon glyphicon-info-sign"></span> Updated information</h1></div>
        <br/>
<div class="table_margin">
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Patient Name</th>
            <th style="text-align: center;">Patient Email</th>
            <th style="text-align: center;">Patient Gender</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Age</th>
            <th style="text-align: center;">Policy Code</th>
            <th style="text-align: center;">Note</th>
            <th style="text-align: center;" colspan="2">Operation</th>
        </tr>
        <tr>
            <td style="text-align: center;"><?php echo ucfirst($userDetails->name); ?></td>
            <td style="text-align: center;"><?php echo $userDetails->email; ?></td>
            <td style="text-align: center;"><?php echo $userDetails->gender; ?></td>
            <td style="text-align: center;"><?php echo $userDetails->dob; ?></td>
            <td style="text-align: center;"><?php echo $userDetails->age; ?></td>
            <td style="text-align: center;"><?php echo $userDetails->policyCode; ?></td>
            <td style="text-align: center;"><?php echo $userDetails->note; ?></td>
            <td style="text-align: center;"><a href="home.php?tag=update_entry"><img src="images/update.png" height="20" width="20" alt="Update information" /></a></td>
        </tr>
    </thead>
</table>
</div>
</div>