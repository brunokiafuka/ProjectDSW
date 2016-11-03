window.onload =(function () {	
	   
   //ADD TO CART
   cartCount();
   totalAmountTop();
	cart_checkout();
	totalAmount();

   $('.button').click(function (event) {
   		event.preventDefault();

   		var mov_id = $(this).attr('data-id');
   		$.ajax({
   			url: "action.php",
   			method: "POST",
   			data: {addToCart:1, movieId:mov_id},
   			success: function(data){
   				alert(data);
   				cartCount();
   				totalAmountTop();
   			} 
   		});
    });


   //count cart
  	function cartCount() {
  		// body...
  		$.ajax({
   			url: "action.php",
   			method: "POST",
   			data: {countCart:1},
   			success: function(data){   				
   				$(".numItens").html(data);
   			} 
   		});
  	}

  	//count totalPrice to show in Menu
  	function totalAmountTop() {
  		// body...
  		$.ajax({
   			url: "action.php",
   			method: "POST",
   			data: {totalAmountTop:1},
   			success: function(data){
   				$(".totalCart").html(data);
   			} 
   		});
  	}

  	//total down
  	function totalAmount() {
  		// body...
  		$.ajax({
   			url: "action.php",
   			method: "POST",
   			data: {totalAmountTop:1},
   			success: function(data){
   				$(".total-cart").html(data);
   			} 
   		});
  	}

  	//cart_checkout
  	function cart_checkout() {
  		// body...
  		$.ajax({
   			url: "action.php",
   			method: "POST",
   			data: {cart_checkout:1},
   			success: function(data){  

   				$(".cart-show").html(data);
   			} 
   		});
  	}

  	///
  	$("body").delegate(".qty","keyup",function(){
  		var movieId = $(this).attr("prodID");
  		var getPrice = "price-"+movieId;
  		
  		var qty = $("#qty-"+movieId).val();
  		var price = $("#price-"+movieId).val();
  		var total = price * qty;
  		total = total.toFixed(2);
  		$("#total-"+movieId).html(total);
  		//var movieId = $(this).attr("prodID");
  	});

  	//Remove Product
  	$("body").delegate(".remove","click",function(event){
  		event.preventDefault();
  		var movieId = $(this).attr("remove-id");
  		$.ajax({
   			url: "action.php",
   			method: "POST",
   			data: {removeFromCart:1, removeId:movieId},
   			success: function(data){  

   				alert("Item Removed form Cart " + data);
				cart_checkout();
				cartCount();
   				totalAmountTop();
   				totalAmount();

   			}
   		}); 

  	});

  	//update Product
  	$("body").delegate(".update","click",function(event){
  		event.preventDefault();
  		var movieId = $(this).attr("update-id");
  		var qty = $("#qty-"+movieId).val();
  		var price = $("#price-"+movieId).val();
  		var total = price * qty;
  		total = total.toFixed(2);

  		$.ajax({
   			url: "action.php",
   			method: "POST",
   			data: {updateProduct:1,updateId:movieId,qtyUpdate:qty,totalUpdate:total},
   			success: function(data){  
   				
   				alert(data);
   				totalAmountTop();
   				totalAmount();

   			}
   		});

  	});

    // Confirm
    $("body").delegate("#confirmOrder","click",function(event) {
      // body...
      event.preventDefault();
      var userId = $(this).attr("userinfo");
      
      $.ajax({
        url: "action.php",
        method: "POST",
        data: {confirmOrder:1, userid: userId},
        success: function(data){
            alert("Code "+data);
        }

      });

    });


  });




 function showDvd() {//toggle dvd
    $(".nav-content").toggle('slow');
 }

 function showBlu() { //toggle blu
    $(".nav-content2").toggle('slow');
 	
 }

 