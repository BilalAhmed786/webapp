function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("mainn").style.marginLeft = "250px";
  }
  
  /* Mobile dropdown menu */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mainn").style.marginLeft = "0";
  }


/* Mobile navmenu toggle on click*/

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      this.classList.toggle("dropdown-btn");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }

  $(document).ready(function(){
    $(".closebtn").click(function(){
      $('.active').removeClass('active').addClass('dropdown-btn');
      $(".dropdown-container").hide();
});
  });


  
    //preloader

	$(function() 
	{
		$('#preloader').fadeOut(5000, function() 
		{
			$(this).remove();
		});
	})
  
  // header style
  $(window).scroll(function(){
    scroll = $(window).scrollTop();
    if (scroll >= 700){
      $('.header').addClass('fixed-top');
}else{
  $('.header').removeClass('fixed-top');

}
    }); 
   


//scroll to top button
  $(function () {
    var $window = $(window);
    var $buttonTop = $('.button-top');
    var scrollTimer;
    
    $buttonTop.on('click', function () {
      $('html, body').animate({
      scrollTop: 0,
      });
    });
    
    $window.on('scroll', function () {
      clearTimeout(scrollTimer);
      scrollTimer = setTimeout(function() {
       if ($window.scrollTop() > 500) {
        $buttonTop.addClass('button-top-visible');
      } else {
        $buttonTop.removeClass('button-top-visible');
      }         
      });
    });  
    })



// cart quantity selector

var grandtotal=document.getElementById('gtotal');
var qtyname=document.getElementsByClassName('qtyname');
var itemprice=document.getElementsByClassName('itemprice');
var total=document.getElementsByClassName('total');
function subtotal(){
grandtotal=0;
for(i=0;i<qtyname.length;i++){
total[i].innerText=parseFloat(itemprice[i].value)*qtyname[i].value+'Rs';
grandtotal=grandtotal+parseFloat(itemprice[i].value)*qtyname[i].value;

                 }
                
                 gtotal.innerHTML='Rs ' +grandtotal;
                
    }
subtotal();


// shop notifications
$("#addtocart").click(function(){
  $(".addcart").show();
  setTimeout(function() { $(".addcart").hide(); }, 1000); 
});

