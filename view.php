<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">User Table</div>
	<div class="panel-body">

		<form action="" method="POST" class="form-inline pull-right" role="form">
			<div class="form-group">
				<select name="filterBy" class="form-control">
					<option value="false">Filter</option>
					<option value="yes" <?php if($this->input->get('filterBy')=='yes') echo 'selected' ?> >Yes</option>
					<option value="no" <?php if($this->input->get('filterBy')=='no') echo 'selected' ?> >No</option>
				</select>
			</div>
			<div class="form-group">
				<select name="orderBy" class="form-control">
					<option value="false">order</option>
					<option value="yes" <?php if($this->input->get('orderBy')=='yes') echo 'selected' ?>>Yes</option>
					<option value="no" <?php if($this->input->get('orderBy')=='no') echo 'selected' ?>>No</option>
				</select>
			</div>
			<button type="submit" name="formfilter" value="formfilter" class="btn btn-default">Filter</button>
		</form>
		<a href="" class="btn btn-default">Add New User</a>
	</div>

	<!-- Table -->
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user_listing as $user) { ?>
			<tr>
				<td><?php echo $user->id ?></td>
				<td><?php echo $user->username ?></td>
				<td><?php echo $user->email ?></td>
				<td>
					<a href="<?php echo base_url("user/edit/$user->id") ?>" class="btn btn-default">Edit</a>
					<a href="<?php echo base_url("user/delete/$user->id") ?>" class="btn btn-default">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<div class="panel-footer">
		<?php echo $this->pagination->create_links() ?>
	</div>
</div>

<script>
$(function(){
	$('.btn-filter').click(function(){

	});

});
</script>
