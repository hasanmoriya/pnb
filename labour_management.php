<?php include "header.php";
$result=mysqli_query($conn,"select * from labour");
?>


<div class="container">
  <h2>Labour Information</h2>
             
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Labour Id</th>
        <th>Labour Name</th>
        <th colspan="2">Action</th>
        

        
      </tr>
    </thead>
    <tbody>
     <?php while ($result1=mysqli_fetch_array($result)) {   ?>
      <tr>
        <td><?php echo $result1["id"]; ?></td>
        <td><?php echo $result1["labour_name"]; ?></td>
       <td><a class="btn mini blue-stripe" href="labour_edit.php?lab_id=<?php echo $result1["id"]; ?>">Edit</a></td>
       <td><a class="btn mini blue-stripe remove" href="labour_delete.php?dellab_id=<?php echo $result1["id"]; ?>">Delete</a></td>
        
      </tr>
     <?php } ?>
    </tbody>
  </table>
</div>
<script type="text/javascript">
$('a.remove').on('click', function() {
    var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
        return true;
    }
    return false;
});
</script>
