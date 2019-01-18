<?php include "header.php";?>

<form id="invoice_generate" method="post">
  <div id="divInvoiceTbl">
  <table id="table_invoice" class="table table-bordered table order-list" width="100%">
    <tr>
      <td colspan="8">
        <div><h3 align="center"><?php echo getSetting('shop_name'); ?></h3></div><br>
        <div align="center"><?php echo getSetting('shop_address'); ?></div>
      </td>
    </tr>

    <tr>
      <td colspan="6">
        <!-- <table style="border: 0px;" id="tablegst"><tr>
          <td><b>Name & Address:&nbsp;</b></td><td><input type="text" class="cname" name="cname" placeholder="Enter Client Name"></td></tr>
          <tr><td></td><td><input type="text" name="ccity" placeholder="Enter City"><br><br></td></tr>
          <tr><td colspan="2"><b>GSTINNO:<?php echo getSetting('gst_no'); ?></b></td></tr>
          <tr><td colspan="2"><b>PANNO:<?php echo getSetting('pancard_no'); ?></b></td></tr>

        </table> -->
        <label><b>Name:&nbsp;&nbsp;</b></label><input type="text" class="cname" name="cname" placeholder="Enter Client Name"><br>
        <label><b>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label><input type="text" name="ccity" placeholder="Enter City"><br><br>
        <b>GSTINNO:<?php echo getSetting('gst_no'); ?></b><br>
        <b>PANNO:<?php echo getSetting('pancard_no'); ?></b>



      </td>

      <td colspan="2"><b>INVOICE NO:T/<?php echo getInvoiceno(); ?></b><br>
        DATE:<span class="date" value="<?php echo date('d-m-Y');?>"><?php echo date('d-m-Y');?></span><br>VEHICLE NO:</b><input type="text" name="vehicleno">
      </td>
    </tr>


    <tr>
      <th>SR.</th>
      <th>PRODUCT NAME</th>
      <th>HSN/ACS</th>
      <th>NOS</th>
      <th>QTY</th>
      <th>UNIT</th>
      <th>RATE</th>
      <th>AMOUNT</th>
      <td class="extrabutton"><input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" size="2" /></td>
    </tr>

    <tr>
     <td><input class="sr" type="text" name="srno" size="2" value="1"></td>
     <td><input type="text" name="productname"></td>
     <td><input type="text" name="hsn" size="5"></td>
     <td><input type="text" name="nos" size="2"></td>
     <td><input type="text" name="qty" class="qty" size="3" id="qty"></td>
     <td><input type="text" name="unit" size="3"></td>
     <td><input type="text" name="rate" class="rate" size="3" id="rate"></td>
     <td><input type="text" name="amount" class="amount" id="amount"></td>
     <a class="deleteRow extrabutton"></a> 
   </tr>

   <tr class="totalsection">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="2" align="center">SUB TOTAL</td>
    <td></td>
    <td><span id="subtotal" class="subtotal"></span></td>
  </tr>

  <tr>
   <td rowspan="3" colspan="2">GSTNO:<?php echo getSetting('gst_no'); ?></td>
   <td></td>
   <td></td>
   <td colspan="2" align="center">CGST</td>
   <td>9</td>
   <td><span class="cgst"></span></td>
 </tr>

 <tr>
   <td></td>
   <td></td>
   <td colspan="2" align="center">SGST</td>
   <td>9</td>
   <td><span class="sgst"></span></td>
 </tr>

 <tr>
   <td></td>
   <td></td>
   <td colspan="2" align="center">IGST</td>
   <td>0</td>
   <td><span class="igst"></span></td>
 </tr>

 <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td colspan="2" align="center">ROUND OFF</td>
  <td></td>
  <td><span class="roundoff"></span></td>
</tr>

<tr>
  <td colspan="4"></td>
  <td colspan="2" align="center">GRAND TOTAL</td>
  <td></td>
  <td><span class="grandtotal"></span></td>
</tr>

<tr>
  <td colspan="4">TERMS & CONDITION:<br>
    1.Subject to PALANPUR Jurisdiction.E.&.O.E.<br>
    2.Goods once sold will not be Accepted<br>
  3.Warranty and Guarantee As Per Company Policy.</td>

  <td align="right" colspan="4">
   <h4> For,<?php echo getSetting('shop_name'); ?></h4><br>
   (Authorised Signatory)
 </td>

</tr>

</table>
</div>

<input class="btn btn-danger submit print-btn" id="submit" type="button" name="submit" value="Print">

</form>
</div>

</body>
</html>
<script type="text/javascript">
 $(".submit").click(function(){
    
    var invoiceno, cname, date,grandtotal;
     invoiceno='<?php echo getInvoiceno()?>';
    date='<?php echo date("d-m-Y")?>';
    cname= $('.cname').val();
    grandtotal=$('.grandtotal').html();

    $.ajax({
            type: 'post',
            url: 'post.php',
            
            data: {action:'invoice_generate','invoiceno':invoiceno,'date':date,'cname':cname,'grandtotal':grandtotal},
            success: function (data) {
               // $(".extrabutton").click(function(){
                $(".extrabutton").css('border','none');
                $(".extrabutton").hide();
                $('.print-btn').hide();
                $('.header-container').hide();

                  
                $('input[type="text"]').css('border','0px');
                  
                  
                  window.print();


              window.location.reload();
            }
          });
});
</script>
