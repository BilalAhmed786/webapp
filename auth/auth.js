/*hide show password*/
/*password*/

function passwrd() {
    var x= document.getElementById("showhidepass");
    var y=document.getElementsByClassName("fa fa-eye");
    if (x.type === "password") {
      x.type = "text";
      x.style.color="red";
      y[0].style.color="red";
      
    } else {
      x.type = "password";
      x.style.color="black";
      y[0].style.color="black";
     
    }
  }
/*retypepassword*/

  function retypepass() {
    var x = document.getElementById("retypepass");
    var y=document.getElementsByClassName("fa fa-eye");
    if (x.type === "password") {
      x.type = "text";
      x.style.color="red";
      y[1].style.color="red";
    } else {
      x.type = "password";
      x.style.color="black";
      y[1].style.color="black";
    }
  }

  /*prevent default*/






