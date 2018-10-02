<?php
?>

<h2><?=$title;?></h2>
<?php echo validation_errors();?>

<?php echo form_open('users/register');?>
<div class="form-group">
    <label>Name</label>
    <input class="form-control" type="text" name="name" placeholder="Name">
</div>
<div class="form-group">
    <label>ZipCode</label>
    <input class="form-control" type="text" name="zipcode" placeholder="Zipcode">
</div>
<div class="form-group">
    <label>Email</label>
    <input class="form-control" type="email" name="email" placeholder="Email">
</div>
<div class="form-group">
    <label>Username</label>
    <input class="form-control" type="text" name="username" placeholder="username">
</div>
<div class="form-group">
    <label>Password</label>
    <input class="form-control" type="password" name="password" placeholder="password">
</div>
<div class="form-group">
    <label>Confirmed Password</label>
    <input class="form-control" type="password" name="password2" placeholder="confirm password">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
