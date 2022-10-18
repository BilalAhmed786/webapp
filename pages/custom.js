
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("mainn").style.marginLeft = "250px";
  }
  
  /* Mobile dropdown menu */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mainn").style.marginLeft = "0";
  }


/* dropdown toggle on click*/

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
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
      $(".dropdown-container").css('display','none');
    });
  });

  