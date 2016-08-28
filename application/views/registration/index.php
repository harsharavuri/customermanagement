<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4>Registration fees of Rs 100 is mandatory, other fees are optional. Tick the corresponding checkboxes which you want to pay </h4>
    <legend>Status</legend>
    <table class="table table-bordered">
        <tr>
            <td><p>Hospitality Status:     <span class="label label-<?php echo ($hospitality === 0)?"danger":"success"; ?>"> <?php echo ($hospitality === 0)? "NOT PAID":"PAID"; ?> </span></p></td>
            <td><p>Registration Status:  <span class="label label-<?php echo ($registration === 0)?"danger":"success"; ?>"> <?php echo ($registration === 0)? "NOT PAID":"PAID"; ?> </span></p></td>
            <td><p>Proshows Status:  <span class="label label-<?php echo ($proshows === 0)?"danger":"success"; ?>"> <?php echo ($proshows === 0)? "NOT PAID":"PAID"; ?> </span></p></td>
        
        </tr>
    </table>

</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
    <form action="<?php echo base_url("hospitality/register"); ?>" role="form" method="POST">
        <legend>Payment for Registration, Hospitality, Proshows </legend>

       <div class="jumbotron">
        <div class="row">

               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <?php if ($registration === 0) { ?>
                 <p><input required type="checkbox" name="registration" <?php echo ($registration === 0)? "":"checked disabled"; ?><label for="registration"> REGISTRATION (Rs.<?php echo REGISTRATION_COST; ?>)</label> </p>
               <?php } ?>
               <?php if ($hospitality === 0) { ?>
                 <p><input type="checkbox" name="hospitality" <?php echo ($hospitality === 0)? "":"checked disabled"; ?><label for="registration"> HOSPITALITY (Rs.<?php echo HOSPITALITY_COST; ?>)</label></p>
              <?php } ?>
               <?php if ($proshows === 0) { ?>
                 <p><input type="checkbox" name="proshows" <?php echo ($proshows === 0)? "":"checked disabled"; ?><label for="proshows"> PROSHOWS (Rs.<?php echo PROSHOWS_COST; ?>)</label></p>
              <?php } ?>
                 </div>
               
               <?php if ($proshows === 0 or $hospitality === 0 or $registration ===0 ) { ?>  
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <input required type="checkbox"> I agree to the <a target="_blank" href="><?php echo base_url("help/terms"); ?>">terms and conditions.</a>
                  <p>
                 <input type="submit" value="PROCEED TO PAYMENT" class=" btn-md btn btn-primary"><br>
                        <small class="text-danger" style="font-size:13px">3% extra will be charged by payment gateway.</small>
                    </p>
               </div>
               <?php } ?>

           </div>
       </div>
        <button hidden type = "submit" >Submit</button>
    </form> 

    
</div>