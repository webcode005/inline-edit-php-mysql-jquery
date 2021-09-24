<?php 
include_once("conection.php");
?>
<title>Inline Editing using PHP MySQL and jQuery Ajax</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/functions.js"></script>
<div class="container">
	<h2>Example: Inline Editing using PHP MySQL and jQuery ajax</h2>
	<?php
	$sql = "SELECT id, employee_name, employee_salary, employee_age FROM employee LIMIT 5";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	?>
	<table class="table table-condensed table-hover table-striped bootgrid-table">
		<thead>
		  <tr>			
			<th>Employee Name</th>
			<th>Salary</th>
			<th>Age</th>				
		  </tr>
		</thead>
		<tbody>
		 <?php
		 while( $rows = mysqli_fetch_assoc($resultset) ) { 
		 ?>
			  <tr>				  
				  <td contenteditable="true" data-old_value="<?php echo $rows["employee_name"]; ?>" onBlur="saveInlineEdit(this,'employee_name','<?php echo $rows["id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["employee_name"]; ?></td>
				  <td contenteditable="true" data-old_value="<?php echo $rows["employee_salary"]; ?>"  onBlur="saveInlineEdit(this,'employee_salary','<?php echo $rows["id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["employee_salary"]; ?></td>
				  <td contenteditable="true" data-old_value="<?php echo $rows["employee_age"]; ?>"  onBlur="saveInlineEdit(this,'employee_age','<?php echo $rows["id"]; ?>')" onClick="highlightEdit(this);"><?php echo $rows["employee_age"]; ?></td>
			  </tr>
		<?php
		}
		?>
		</tbody>
	</table>		  
		  
			
</div>
