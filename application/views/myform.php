<html>
<head>
<title>Input Data</title>
</head>
<body>

	<?php echo form_open('form'); ?>

	<h4>Username</h4>
	<?php echo form_error('username'); ?>
	<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="30" />

	<h4>Password</h4>
	<?php echo form_error('password'); ?>
	<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="30" />

	<h4>Password Confirm</h4>
	<?php echo form_error('passconf'); ?>
	<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="30" />

	<h4>Email Address</h4>
	<?php echo form_error('email'); ?>
	<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="30" />

	<div><input type="submit" value="Submit" /></div>

	</form>

</body>
</html>