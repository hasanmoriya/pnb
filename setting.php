<?php include "header.php";
if(isset($_REQUEST['update']))
{
	$shopname=$_REQUEST['shop_name'];
	$shop_address=$_REQUEST["shop_address"];
  	$pancard_no=$_REQUEST["pancard_no"];
  	$gst_no=$_REQUEST["gst_no"];
    
  	update_options('shop_name',$shopname);
  	update_options('shop_address',$shop_address);
  	update_options('pancard_no',$pancard_no);
  	update_options('gst_no',$gst_no);
  	
}


?>

 <button class="btn btn-danger btn2">Change Setting</button><br><br><br>
<form id="frmodel" method="post">
      
        <fieldset>

          <!-- Form Name -->
          <legend>Shop Details</legend>

          <!-- Text input-->
           <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Shop Name</label>
            <div class="col-sm-10">
              <input type="text" name="shop_name" value="<?php echo getSetting('shop_name'); ?>" placeholder=" Enter Shop Name" class="form-control">
            </div>
          </div><br><br>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Address</label>
            <div class="col-sm-10">
              <input type="text" name="shop_address" value="<?php echo getSetting('shop_address'); ?>" placeholder=" Enter Address" class="form-control">
            </div>
          </div><br><br>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Pancard No</label>
            <div class="col-sm-10">
              <input type="text" name="pancard_no" value="<?php echo getSetting('pancard_no'); ?> "placeholder="Enter pancard No" class="form-control">
            </div>
          </div><br><br>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Gst No</label>
            <div class="col-sm-10">
              <input type="text" name="gst_no" value="<?php echo getSetting('gst_no'); ?> "placeholder="Enter Gst NO" class="form-control">
            </div>
          </div><br><br>

         
           
          

          

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <input type="submit" class="btn btn-primary" name="update" value="Update">
    
              </div>
            </div>
          </div>

        </fieldset>
      </form>

      <script>
$(document).ready(function(){
    // $(".btn1").click(function(){
    //     $("p").hide();
    // });
    $("#frmodel").hide();
    $(".btn2").click(function(){
        $("#frmodel").toggle();
    });
});
</script>