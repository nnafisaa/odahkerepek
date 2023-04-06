<!DOCTYPE html>
<html lang="en">


<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="admin/jquery-ui.css">
        <!-- <link rel="stylesheet" href="bootstrap.min.css" /> -->
		<script src="admin/jquery.min.js"></script>  
		<script src="admin/jquery-ui.js"></script>


<title>Links website</title>
<style>
  

      header.masthead {
      background: url(assets/img/1600654680_photo-1504674900247-0877df9cc836.jpg);
      background-repeat: no-repeat;
      background-size: cover;
    }
    
   

body {
    background-image: url(https://www.w3schools.com/howto/img_link_tree_template1_bg.jpg); /* The image used for background*/
    background-repeat: no-repeat; /* Do not repeat the image */
    background-position: center; /* Center the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}

.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.image-container {
  text-align: center;
  width: 100%;
}

.links-container {
  display: flex;
  flex-direction: column;
  jusify-content: center;
  align-items: center;
}

.link {
  min-width: 50% !important;
}

@media (min-width: 1200px) .container {
  max-width: 1140px;
}
@media (min-width: 992px) .container {
  max-width: 960px;
}
@media (min-width: 768px) {
.container {
    max-width: 720px;
  }

.link {
    width: 100%;
  }
}
@media (min-width: 576px) {
.container {
    max-width: 540px;
  }
}

.w3-purple, .w3-hover-purple:hover {
color: #fff!important;
background-color: rgba(156, 39, 176, 0.6) !important;
}

.w3-blue, .w3-hover-blue:hover {
color: #fff!important;
background-color: rgbargb(0,0,255) !important;
}
</style>
  </head>


  <section class="page-section">

        <div class="container">
            
            
        </div>
        </section>


  <body class="w3-white">
    <!-- Content container -->
    <div class="container">

 


      <!-- Image and name container. Change to your picture here. -->
    <div class="image-container">
    <img src="https://adyen.getbynder.com/m/216005c3e565592c/webimage-pmx-logo-fpx.jpg" class="w3-margin" alt="Photo by Art Hauntington" max-width="100%" height="150px" style="border-radius: 50%; alt=">
     <div class="w3-text-white">
     <p class="w3-text-white w3-large">Welcome to <span class="w3-tag w3-large w3-round w3-black w3-text-white"><strong>Payment Online Banking</strong></span> Page!</p>
     <p class="w3-large"><strong><span style="background-color: red">KINDLY UNDO AFTER THE PAYMENT SUCCESSFULL!!!</span></strong></p>
      </div>

    <!-- Links section 1. Replace the # inside of the "" with your links. -->
    <div class="links-container">
      <a href="https://www.maybank2u.com.my/home/m2u/common/login.do" class="w3-button w3-hover-pink w3-large w3-round w3-purple w3-border link" target="_blank"><i class="fab fa-facebook"> </i>MAYBANK</a>
      <br>
      <a href="https://www.bankislam.biz/" class="w3-button w3-hover-pink w3-large w3-round w3-purple w3-border link" target="_blank"><i class="fab fa-instagram"> </i>BANK ISLAM</a>
      <br>
      <a href="https://www.cimbclicks.com.my/clicks/#/" class="w3-button w3-hover-pink w3-large w3-round w3-purple w3-border link" target="_blank"><i class="fab fa-twitter"> </i>CIMB BANK</a>
      <br>
      <a href="https://onlinebanking.rhbgroup.com/my/login" class="w3-button w3-hover-pink w3-large w3-round w3-purple w3-border link" target="_blank"><i class="fa fa-code"> </i>RHB BANK</a>
    </div>
  </div>
</div>

  <!-- Contact section -->
  <div class="w3-container w3-center w3-text-white w3-padding-32 w3-padding-large" id="contact">
    <div class="w3-content" style="max-width:500px">

       <?php echo '<script>console.log("order id", '. json_encode($_GET['order_id']) .')</script>'; ?>
      <form action=" " id="upload-receipt">
      <div class="form-group">
								<label for="" class="control-label">Receipt</label>
								<input type="file" class="form-control" name="receipt">
                <input type="hidden" id="id" name="id" value="<?php echo $_GET['order_id']; ?>">
							</div>
             <button class="w3-button w3-hover-pink w3-large w3-round w3-blue w3-border link"> Save</button>
      </form> 
    </div>
  </div>
<script>
$('#upload-receipt').submit(function(e){
		e.preventDefault()
    console.log('button is click')
		/* start_load() */
		$.ajax({
			url:'admin/ajax.php?action=upload_receipt',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
        console.log('masuk sini', resp)

				if(resp==1){
					//alert_toast("Data successfully added",'success')
					setTimeout(function(){
            window.location="./index.php";
						/* location.reload() */
        
					},1500)

				}
				else if(resp==2){
					//alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						/* location.reload() */
					},1500)

				}
			}
		})
	})
</script>
  </body>  
</html>