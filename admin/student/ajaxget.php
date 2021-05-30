<?php 
	include ("../../class/connect.php");
	
	if(isset($_POST['department_id']) && $_POST['department_id'] !='')
	{
		$departmentID = $_POST['department_id'];
		$sql = "select * from tbl_program where Dep_ID = $departmentID and iStatus=1";
		$rs = mysqli_query($con,$sql);
		$numRows = mysqli_num_rows($rs);
		
		if($numRows == 0)
		{
			echo 'No program found';
		}
		else
		{
			echo '<label for="defaultSelect">Select Program</label>';
			echo '<select name="program_id" class="form-control form-control prog" id="prog">';
			while($program = mysqli_fetch_assoc($rs))
			{
				echo '<option value="'.$program['ID'].'">'.$program['sName'].'</option>';
			}
			echo '</select>';
		}
		
	}
	if(isset($_POST['prog']) && $_POST['prog'] !='')
	{
		$prog = $_POST['prog'];
		$sql = "select * from tbl_batch where Prog_ID = $prog and iStatus=1";
		$rs = mysqli_query($con,$sql);
		$numRows = mysqli_num_rows($rs);
		
		if($numRows == 0)
		{
			echo 'No batch found';
		}
		else
		{
			echo '<label for="defaultSelect">Select Program</label>';
			echo '<select name="batch_id" class="form-control form-control prog" id="batch">';
			while($batch = mysqli_fetch_assoc($rs))
			{
				echo '<option value="'.$batch['ID'].'">'.$batch['sName'].'</option>';
			}
			echo '</select>';
		}
		
	}
?>