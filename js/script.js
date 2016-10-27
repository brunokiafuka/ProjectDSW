window.onload =(function () {	
	   
   //ADD TO CART
   cartCount();
   totalAmountTop();
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

  });




 function showDvd() {//toggle dvd
    $(".nav-content").toggle('slow');
 }

 function showBlu() { //toggle blu
    $(".nav-content2").toggle('slow');
 	
 }

 