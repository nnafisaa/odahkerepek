<html>    
    <head>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
    </head>  
    <body>

<div class="container">
	
	<div class="row">
	<div class="col-lg-12">
			<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user</button>
	</div>
	</div>

	<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" id="name" class="form-control" />
					<span id="error_name" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" id="username" class="form-control" />
					<span id="error_username" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" name="password" id="password" class="form-control" />
					<span id="error_password" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Type</label>
					<input type="text" name="type" id="type" class="form-control" />
					<span id="error_type" class="text-danger"></span>
				</div>
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>

		<div id="action_alert" title="Action">
			
		</div>

	</div>
</body>
</html>

	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Name</th>
					<th class="text-center">Username</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM users order by name asc");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo $row['name'] ?>
				 	</td>
				 	<td>
				 		<?php echo $row['username'] ?>
				 	</td>
				 	<td>
				 		<center>
								<button class="btn btn-sm btn-danger delete_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
						</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>


$("#user_dialog").dialog({
	autoOpen:false,
	width:400
});

$('#new_user').click(function(){
	$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('insert');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
})

$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_name = '';
		var error_username = '';
		var error_password = '';
		var error_type = '';
		if($('#name').val() == '')
		{
			error_name = 'Name is required';
			$('#error_name').text(error_name);
			$('#name').css('border-color', '#cc0000');
		}
		else
		{
			error_name = '';
			$('#error_name').text(error_name);
			$('#name').css('border-color', '');
		}
		if($('#username').val() == '')
		{
			error_username = 'Username is required';
			$('#error_username').text(error_username);
			$('#username').css('border-color', '#cc0000');
		}
		else
		{
			error_username = '';
			$('#error_username').text(error_username);
			$('#username').css('border-color', '');
		}
		if($('#password').val() == '')
		{
			error_password = 'Password is required';
			$('#error_password').text(error_password);
			$('#password').css('border-color', '#cc0000');
		}
		else
		{
			error_password = '';
			$('#error_password').text(error_password);
			$('#password').css('border-color', '');
		}
		if($('#type').val() == '')
		{
			error_type = 'Type is required';
			$('#error_type').text(error_type);
			$('#type').css('border-color', '#cc0000');
		}
		else
		{
			error_type = '';
			$('#error_type').text(error_type);
			$('#type').css('border-color', '');
		}
		
		if(error_name != '' || error_username != '' || error_password != '' || error_type != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});

$('#action_alert').dialog({
		autoOpen:false
});

$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
$('.delete_cat').click(function(){
		_conf("Are you sure to delete?","delete_cat",[$(this).attr('data-id')])
	})
	function delete_cat($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

</script>