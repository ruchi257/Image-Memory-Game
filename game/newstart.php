<html>
<head>
<title>NEW START</title>
<script src="jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<style>


#box{
	width: 450px;
	margin: 0px auto;
	top: -10px;
	left: 350px;
	position: fixed;
}
#boxcard{
	margin-top: 10px;
	
}
#boxcard div{
	
	float: left;
	width: 80px;
	height: 80px;
	margin: 5px;
	padding: 5px;
	border: 1px solid black;
	
	border-radius: 2px;
	
	background: #B1B1B1;
	
}
#boxcard div img {
	width: inherit;
	height: inherit;
	
	z-index: 1;
}
.button{
	padding: 5px;
	background: orange;
	margin-left: 10px;
	border-radius: 5px;
	
}
.button1{
	padding: 5px;
	background: orange;
	margin-left:250px;
	border-radius: 5px;
}
.popup-overlay {
	visibility:hidden;

}

.popup-content {
	visibility:hidden;
}
.popup-overlay.active{
	visibility:visible;
	z-index: 3;
	
}

.popup-content.active {
	padding: 20px;
	position: absolute;
	margin-top: 100px;
	left: 60px;
	visibility:visible;
	width: 500px;
	border: 5px solid orange;
	border-radius: 5px;
	margin-left: 250px;
	background: white;
	z-index: 3;
	font-family: cursive;
}
.close{
	float: right;
	margin: 10px;
	border: none;
	background-color: white;
	color: red;
	padding: 5px;
	border-radius: 5px;
}
.reset{
	position: fixed;
	top: 500px;
	left: 500px;
	padding: 5px;
	background: #00b894;
	border-radius: 5px;
}
.reset a{
	text-decoration: none;
	color: white;
	font-family: cursive;
}
</style>
</head>
<body>
<!--Creates the popup body-->
<div class="popup-overlay">
<!--Creates the popup content-->
 <div class="popup-content">
 <button class="close"><i class="fas fa-times"></i></button> <br>  
    <center><h2>IMAGE MEMORY GAME RULES</h2></center>
    <ul style="line-height: 30px;">
		<li>Click on box to view image </li>
		<li>If the two images matched, you got 5 points</li>
		<li>On every right match, points increase</li>
		<li>Remember what was on each box and where it was</li>
		<li>The game is over when all the cards have been matched</li>
	</ul>
   <!--popup's close button-->
     
</div>
</div>

<div id="box">
	<center><h2>IMAGE MEMORY GAME</h2></center>
	<span class="button">
	<span id="counter">0</span> Clicks</span>
	</span>
	<span class="button1">
	<span id="points">0</span> Points</span>
	</span>
	<div id="boxcard"></div>
	
</div>	

<div class="reset">
<a  href="newstart.php">PLAY AGAIN  <i class="fas fa-play"></i></a>
</div>
</body>
<script>
var Counter = 0;
var points = 0; 
image_bucket=[];
var id_bucket=[];
var image =["single-animal-indoors-akita-stock-photo__u10183132.jpg","focused_204369922-Young-lion-snarling-while-walking.jpg",
	"mare-animal-nature-ride-45164.jpeg",
	"albino-animals-3.jpg",
	"aplive-african-watering-hole-cam.jpg","download.jpg","offset_658359.jpg","images.jpg",
	"single-animal-indoors-akita-stock-photo__u10183132.jpg","focused_204369922-Young-lion-snarling-while-walking.jpg",
	"mare-animal-nature-ride-45164.jpeg",
	"albino-animals-3.jpg",
	"aplive-african-watering-hole-cam.jpg","download.jpg","offset_658359.jpg","images.jpg"];


// function randomImage(s){
		 // return Math.floor(Math.random()*s);
		 
	// }
	
	
$(function(){
	

	
	for(var i=0;i<16;i++)
	{	
		var randomPosition = Math.floor(Math.random() * image.length);
		var selected = image.splice(randomPosition,1);
		$("#boxcard").append("<div class=box_image id=img_"+i+"><img src="+selected+" /></div>");
			
	}
	$(".popup, .popup-content").addClass("active");
	
	$(".close, .popup").on("click", function(){
			$(".popup, .popup-content").removeClass("active");
			$('img').show(0).delay(1000).hide(0);
	});
	
		
		
	$('.box_image').click(function()
	{
		
	
		$(this).children().show(0);
		Counter++;
		$("#counter").html("" + Counter);
		
		var buc =$(this).find("img").attr("src");
		var ids = $(this).attr("id");
		//alert(buc);
		// id_bucket.push(ids);
		// image_bucket.push(buc);
		// alert("first"+image_bucket);
		// alert(image_bucket[1]);
				
				if(image_bucket.length == 0){
					id_bucket.push(ids);
					//alert("of 0 "+id_bucket);
					image_bucket.push(buc);
				}
				else if(image_bucket.length == 1){
					id_bucket.push(ids);
					//alert("if 1 "+id_bucket);
					image_bucket.push(buc);
				}
					
				//console.log(image_bucket);
				if(image_bucket.length == 2){
						if(image_bucket[0]==image_bucket[1])
						{	var zero = id_bucket[0];
					
							var one = id_bucket[1];
							// alert(id_bucket);
							// alert(zero);
							// alert(one);
							
							$("div#"+zero).show();
							$("div#"+one).show();
							
							points+=5;
							$("#points").html("" + points);
							// $(".box_image").css("border-color","red")
							// alert(zero.parent().attr("id"));
							image_bucket=[];
							//alert("if "+image_bucket);
							id_bucket = [];		
							// console.log(image_bucket);
							// console.log(id_bucket);
							//alert("if "+id_bucket);
						}
						else if((image_bucket[0]!=image_bucket[1]))  
						{	
							// alert(image_bucket[0]);
							// alert(image_bucket[1]);
					
							var zero = id_bucket[0];
							var one = id_bucket[1];
							
							$("div#"+zero).children().hide(1000);
							$("div#"+one).children().hide(1000);
								// id_bucket = [];		
								// image_bucket=[];
								// alert("else "+image_bucket);
								// alert("else "+id_bucket);
							image_bucket=[];
							
							id_bucket = [];	
							// console.log(image_bucket);
							// console.log(id_bucket);
						}
							// console.log(image_bucket);
							// console.log(id_bucket);
				}
				
				
		if(Counter == 15){
			alert("game over. You Score is: "+points);
			$('img').hide();
			$('.box_image').off('click');
		}	
		setTimeout(	function(){	
				if(points == 40){
					
						if (confirm("YOU WON!!! \n DO YOU WANTS TO PLAY AGAIN")) 
						{
							window.location.href = "newstart.php";
						} else {
							
						}
				}
		},5000);
		
		
	});
	
	//alert(size);
	
	//alert("ImgAll");
	// var random = randomImage(0,size);
	
		// for (var a = [0, 1, 2, 3, 4], i = a.length; i--; ) {
    // var random = a.splice(Math.floor(Math.random() * (i + 1)), 1)[0];
    // console.log(random);
// }
	
	//alert(random);
	//$('#boxcard').attr('src',image[random]);
	//$('#boxcard').attr('src',image[random]);
	
	
	//alert(size);
	
	//suffleImg(random);
});
</script>
</html>