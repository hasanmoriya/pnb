<?php include "header.php";

if (isset($_GET['lab_id'])) {
  $data=$_GET['lab_id'];
  $result=mysqli_query($conn,"select * from labour where id='$data'");
  $result1=mysqli_fetch_array($result);
  
}
if(isset($_REQUEST['register']))
{
  $name=$_REQUEST["labour_name"];
  
  mysqli_query($conn,"update labour set labour_name='".$name."' where id='".$data."'");
  header("location:labour_management.php");
 
}

?>


  <div class="container">
    <div class="row main">
      
       <div class="panel-title text-center">
        <h3 class="title">Update Labour</h3>
        <hr />
      </div>
    </div> 
    <div class="main-login main-center">
      <form class="form-horizontal" id="fr" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
          
          <div class="cols-sm-12">
            <div class="input-group">
              <input type="text" class="form-control" value="<?php echo $result1["labour_name"]; ?>" name="labour_name" id="labour_name"  placeholder="Enter Labour Name"/>
            </div>
          </div>
        </div>

        <input type="submit" name="register" value="Update" class="btn btn-primary">
       
            <!-- <div class="login-register">
                    <a href="index.php">Login</a>
                  </div> -->
                </form>
              </div>
            </div>
          </div>

          
        </body>
        </html>