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

//single product page


let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}