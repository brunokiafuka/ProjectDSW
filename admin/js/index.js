
  window.onload =(function(){
      $("body").delegate("#pdf-allMovies","click",function(event){
        event.preventDefault();
        alert(0);

        $.ajax({
        url: "admin-func.php",
        method: "POST",
        data: {pdfallMovies:1},
        success: function(data){
          data;
        }
        }); 
      });

  });