
<?php
	if (!empty($_POST['update_info'])) {
		
		$name = $_POST['fnametxt'];
		$gender = $_POST['gender'];
		$physicianName = $_POST['physicianName'];
		$dd=$_POST['dd'];
		$mm=$_POST['mm'];
		$yy=$_POST['yy'];
		$age = (date("md", date("U", mktime(0, 0, 0, $dd, $mm, $yy))) > date("md") ? ((date("Y")-$yy)-1):(date("Y")-$yy));
		$dob = $_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
		$policyCode = $_POST['policyCode'];
		$policyCode_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $policyCode);
		$notetxt = $_POST['notetxt'];
		$email = $userDetails->email;

		if($policyCode_check) {
			$userClass -> updateDetails($name, $gender, $dob, $policyCode, $physicianName, $notetxt, $email, $age);
			echo "<h1 style='color: green'>Records Updated!!</h1>";
			// header("Location ./home.php?tag=update_entry");
		}
	}
?>

<!-- for form Register-->
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Update your information</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Complete your information to generate reports</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" value="<?php echo ucfirst($userDetails->name); ?>" placeholder="Your full name" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" <?php echo ($userDetails->gender) == 'Male' ? 'checked' : ''; ?> name="gender" value="Male" /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" <?php echo ($userDetails->gender) == 'Female' ? 'checked' : ''; ?> name="gender" value="Female" /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
		     	
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="policyCode" class="form-control" value="<?php echo $userDetails->policyCode; ?>" placeholder="8 Alphanumeric policy code" />
				</div><br>
				
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="physicianName" class="form-control" value="<?php echo $userDetails->physicianName; ?>" placeholder="Physician name" />
				</div><br>

				<div class="teacher_note_pos">
					<input type="text" name="notetxt" class="form-control" value="<?php echo $userDetails->note; ?>" placeholder="Additional Note (Optional)" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="update_info" href="#" class="btn btn-primary btn-large" value="Update information" />&nbsp;&nbsp;&nbsp;
					<input type="reset" class="btn btn-primary btn-large" value="Reset" />
				</div>
                                    </form>
			</div>
		</div>
	</div>