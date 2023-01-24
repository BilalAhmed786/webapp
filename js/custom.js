




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
    
    

//single page review button


$(".btn-success").click(function(){
  $("#viewcart").css('display','block')
});

// single page review ajax call


    $(document).ready(function(){

      var rating_data = 0;
    
        $('#add_review').click(function(){
    
            $('#review_modal').modal('show');
    
        });
    
        $(document).on('mouseenter', '.submit_star', function(){
    
            var rating = $(this).data('rating');
    
            reset_background();
    
            for(var count = 1; count <= rating; count++)
            {
    
                $('#submit_star_'+count).addClass('text-warning');
    
            }
    
        });
    
        function reset_background()
        {
            for(var count = 1; count <= 5; count++)
            {
    
                $('#submit_star_'+count).addClass('star-light');
    
                $('#submit_star_'+count).removeClass('text-warning');
    
            }
        }
    
        $(document).on('mouseleave', '.submit_star', function(){
    
            reset_background();
    
            for(var count = 1; count <= rating_data; count++)
            {
    
                $('#submit_star_'+count).removeClass('star-light');
    
                $('#submit_star_'+count).addClass('text-warning');
            }
    
        });
    
        $(document).on('click', '.submit_star', function(){
    
            rating_data = $(this).data('rating');
            
            sessionStorage.setItem('userrating',rating_data);
            
    });
    
        $('#save_review').click(function(){
    
            var user_name = $('#user_name').val();
            sessionStorage.setItem('username',user_name);
            var user_review = $('#user_review').val();
            sessionStorage.setItem('userreview',user_review);
            var product_id = $('#product_id').val();
            sessionStorage.setItem('productid',product_id);
            var product_name = $('#product_name').val();
            console.log(product_name);
            
            if(user_name == '' || user_review == '')
            {
                alert("Please Fill Both Field");
                return false;
            }
            else
            {
                $.ajax({
                    url:"submit_rating.php",
                    method:"POST",
                    data:{rating_data:rating_data, product_id:product_id,product_name:product_name, user_name:user_name, user_review:user_review},
                    success:function(data)
                    {
                        $('#review_modal').modal('hide');
    
                        load_rating_data();
    
                        
                    }
                })
            }
    
        });
    // single page review ajax call
        
    
    load_rating_data();
    
        function load_rating_data()
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                dataType:"JSON",
                success:function(data)
                {
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);
    
                    var count_star = 0;
    
                    $('.main_star').each(function(){
                        count_star++;
                        if(Math.ceil(data.average_rating) >= count_star)
                        {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });
    
                    $('#total_five_star_review').text(data.five_star_review);
    
                    $('#total_four_star_review').text(data.four_star_review);
    
                    $('#total_three_star_review').text(data.three_star_review);
    
                    $('#total_two_star_review').text(data.two_star_review);
    
                    $('#total_one_star_review').text(data.one_star_review);
    
                    $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');
    
                    $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');
    
                    $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');
    
                    $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');
    
                    $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');
    
                    if(data.review_data.length > 0)
    
                    {
                        var html = '';
                        if(data.review_data[i].product_id==sessionStorage.getItem('productid'))
                        {
                            html += '<div class="col-sm-1"><div class="rounded-circle bg-secondary text-white pt-2 pb-2"><h3 style=display:block;margin-top:2px;>'+sessionStorage.getItem('username').charAt(0)+'</h3></div></div>';
                            
                            html += '<div class="card">';
                           
                            html +='<div>'
                            html += '<div class="card-header"><i style=color:red>'+sessionStorage.getItem('username')+'</i></div>';
                            html += '<div class="card-body">';
                            html += '<div><P style=color:red;font-style:italic;>your review is pending for approvel..</P></div>';
                            
                            for(var star = 1; star <= 5; star++)
                             {
                                var class_name = '';
    
                                if(sessionStorage.getItem('userrating')>= star)
                                {
                                    class_name = 'text-warning';
                                }
                                else
                                {
                                    class_name = 'star-light';
                                }
                                html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                                
                            }
                            
                            html += '<p>'+sessionStorage.getItem('userreview')+'</p>';
                            html += '</div>'; //stable star-rating in horizantal view   
                            html += '</div>';//card body close
                            html += '</div>';//card div close
                            
                            html += '<br/>';
                           
                            
                           
                    
                        }
                   
                    
                           
                                
                            for(var count = 0; count < data.review_data.length; count++)
                        {
                            html += '<div class="row mb-3">';
                            
    
                            html += '<div class="col-sm-1"><div style=display:block;margin-left:10px class="rounded-circle bg-danger text-white pt-1 pb-1"><h3 style=display:block;margin-top:2px>'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';
    
                            html += '<div class="col-sm-11">';
    
                            html += '<div class="card">';
    
                            html += '<div class="card-header"><i style=color:red>'+data.review_data[count].user_name+'</i></div>';
                            
                            html += '<div class="card-body">';
    
                            for(var star = 1; star <= 5; star++)
                            {
                                var class_name = '';
    
                                if(data.review_data[count].rating >= star)
                                {
                                    class_name = 'text-warning';
                                }
                                else
                                {
                                    class_name = 'star-light';
                                }
    
                                html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                            }
    
                            html += '<br />';
    
                            html += data.review_data[count].user_review;
    
                            html += '</div>';
    
                            html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';
    
                            html += '</div>';
    
                            html += '</div>';
    
                            html += '</div>';
                        }
                    
                       
                       $('#review_content').html(html);
                        
                    }
                }
            })
           
        }
    
    });


    $(".freeshipadmin").click(function(){
        $(".freeship").css('display','block');
    });


// cart quantity selector
shipment=0;
var qtyname=document.getElementsByClassName('qtyname');
var itemprice=document.getElementsByClassName('itemprice');
var total=document.getElementsByClassName('total');
var shipment=document.getElementById('shipmentcharge');
function subtotal(){
grandtotal=0;
for(i=0;i<qtyname.length;i++){
total[i].innerText=parseFloat(itemprice[i].value)*qtyname[i].value+'Rs';
grandtotal=grandtotal+parseFloat(itemprice[i].value)*qtyname[i].value;
}
carttotal=grandtotal+~~parseFloat(shipment.value);
document.getElementById("storagetotal").innerHTML='Rs.'+carttotal;
document.getElementById("gtotal").innerHTML='Rs ' +grandtotal;
document.getElementById("cartship").innerHTML='Rs '+grandtotal;
document.getElementById("nettotal").innerHTML = 'Rs '+carttotal;              
}
subtotal();





    
// shop notifications

