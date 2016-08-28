<link rel="stylesheet" href="<?php echo asset_url()."css/bootstrap.css"; ?>">


<div id="infoMessage"><?php echo $message;?></div>

<div class="container col-sm-4 col-md-4 col-lg-4 col-md-offset-3">
   <h1><?php echo lang('change_password_heading');?></h1><br>
      <form action="<?php echo base_url('auth/change_password')?>" class="form-horizontal" method="POST">

            <div class="form-group">

                  <?php echo lang('change_password_old_password_label', 'old_password');?>

                  <?php echo form_input($old_password);?>

            </div>
            <div class="form-group">

                  <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>

                  <?php echo form_input($new_password);?>

            </div>

            <div class="form-group">

                  <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />


                  <?php echo form_input($new_password_confirm);?>

            </div>

            <?php echo form_input($user_id);?>
            <p><button type="submit" class="btn btn-md btn-success">Change password</button></p>
      </form>

</div>