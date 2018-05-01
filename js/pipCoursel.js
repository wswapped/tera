//$(".pipCoursel")[1].style.display = "none";
//alert();
$(".pipCoursel").hide();
$($(".pipCoursel")[0]).show();
var initial = 1;
var prev = 0;
function pipSlides(){
   if(initial>=$(".pipCoursel").length) {initial = 0;}
   if(prev<0) { prev = $(".pipCoursel").length}
   	$($(".pipCoursel")[prev]).slideUp(500);
   	$($(".pipCoursel")[initial]).slideDown(500); 
   	initial++;
   	prev = initial - 1 ;
   	
}
var xcxc = setInterval( function(){ pipSlides();},3000)