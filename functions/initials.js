$(document).ready(function(){
	$("#functionsDiv").load("functions/userBack.php");
	$("#topLinkDisp").load("htmls/home.html");
	var Pipcontainer = $("#topLinkDisp");

	// ###########################################################################
	//top links click functions


	$(".pipTop").click( function(e){
		$(".pipTop").removeClass("w3-teal");
		$(this).addClass("w3-teal");
	}) 
	$("#HomeDisp").click( function(e){
		e.preventDefault();
		clearInterval(sliding);
		Pipcontainer.html(loadIng);
		Pipcontainer.load("htmls/home.html");
	});



	$("#aboutDisp").click( function(e){
		e.preventDefault();
		Pipcontainer.html(loadIng);
		Pipcontainer.load("htmls/about.html");
	});

	$("#contactDisp").click( function(e){
		e.preventDefault();
		Pipcontainer.html(loadIng);
		Pipcontainer.load("htmls/contact.html");
	});

	$("#helpDisp").click( function(e){
		e.preventDefault();
		Pipcontainer.html(loadIng);
		Pipcontainer.load("htmls/help.html");
	});

	
     //end of top  
    // ###########################################################################
	
});
