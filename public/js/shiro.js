$(".saveCart").click(function(){
    $(".itemRow").each(function(){
        var custId = $request->session()->get('name');
        var itemName = $(this).find(".item-name").text();
        var itemPrice = $(this).find(".item-price").text();
        var itemQty = $(this).find(".item-quantity").text();
        var itemTotal = $(this).find(".item-total").text();

        $.ajax({
            // Enter below the full path to your "cart" php file
            url: "cart",
            type: "POST",
            data: {custId: custId, itemName: itemName, itemPrice: itemPrice, itemQty: itemQty, itemTotal: itemTotal},
            cache: false,
            success: function (html) {
              // If form submission is successful
              if ( html == 1 ) {
              }
              // Double check if maths question is correct
              else {
              }
            }
        });            

    });
});


