$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        var totalrows=$('.sr').length+1;
        cols += '<td><input type="text" class="sr" value="'+totalrows+'" size="2" name="srno' + counter + '"/></td>';
        cols += '<td><input type="text"  name="productname' + counter + '"/></td>';
        cols += '<td><input type="text"  size="5" name="hsn' + counter + '"/></td>';
        cols += '<td><input type="text"  size="2" name="nos' + counter + '"/></td>';
        cols += '<td><input type="text" class="qty"  size="3"  name="qty' + counter + '"/></td>';
        cols += '<td><input type="text"  size="3" name="unit' + counter + '"/></td>';
        cols += '<td><input type="text" class="rate" size="3"  name="rate' + counter + '"/></td>';
        cols += '<td><input type="text" class="amount"  name="amount' + counter + '"/></td>';

        cols += '<td class="extrabutton"><input type="button" class="ibtnDel btn btn-md btn-danger"  value="Delete"></td>';
        newRow.append(cols);
        $(newRow).insertBefore($('.totalsection'));
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
        setsr();
        doCalc();
    });

    function setsr() 
    {
        var counter=1;
        $( ".sr").each(function() {
            $(this).val(counter);
            counter++;
        });
    }



});

$(document).ready(function() {


    $('body').on('change','.qty, .rate',function(){
      var a = $(this).parent().parent().find('.qty').val();
      var b = $(this).parent().parent().find('.rate').val();
      var total = a * b;
      $(this).parent().parent().find('.amount').val(total);
      doCalc();
    });

    $('.roundoff').on('change',function(){
      doCalc();
    })
    
  });

 function doCalc() {
        var total = 0;
        
        $('.amount').each(function() {

         total += parseFloat($(this).val());
         $('.subtotal').html(total);
       });


        var subtotal=parseFloat($('.subtotal').html());
        var sgst=parseFloat((subtotal*9)/100);
        var cgst=parseFloat((subtotal*9)/100);
        var igst=parseFloat((subtotal*0)/100);
        $('.sgst').html(sgst);
        $('.cgst').html(cgst);
        $('.igst').html(igst);
        
        var grandtotal=parseFloat(subtotal+sgst+cgst+igst);
        var roundfigure=Math.floor(grandtotal);
        var difference=grandtotal-roundfigure;
        
        $('.roundoff').html(difference);
        grandtotal=grandtotal-parseFloat($('.roundoff').html());
        $('.grandtotal').html(grandtotal);


  }




  
   