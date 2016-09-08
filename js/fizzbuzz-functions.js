/**
 * This file facilitates all of the interaction between the user and doucment, 
 * as well as gathering data from the server and placing it on the page
 * @requires jquery
 */
(function($){

/**
 * source functions and global variables
 */	
 var timeouts = [];
 function animateIn(element, animation, delay=0){
 	setTimeout(function() {
	    element.show().addClass('animated ' + animation);}, delay
	);
 }
 function getData(){
 	/**
	 * call function getNumbers in order to generate numbers
	 */	
 	var json = {
 		function: "getNumbers"
 	}
 	$.ajax({
 		type: 'post',
 		url: "api.php",
 		data: json
 	}).done(function(data){
 		data = JSON.parse(data);
 		/**
		 * if there are any errors, display them in an alert box
		 */	
 		if (data.errors != null) {
 			var errorMessage = "";
		    for (var i in data.errors){
		    	var errorMessage = errorMessage + data.errors[i] + ". ";
		    }
		    alert(errorMessage);
		}
		/**
		 * otherwise, pass the numbers along and print them
		 */	
		else{
			console.log(data);
			for(var i in data){
				(function(number){
					timeouts.push(setTimeout(function(){
					    appendNumber(number);
					}, i * 50));
				})(data[i]);
			}
			//showNumbers();
		}
 	}).fail(function(){
 		alert("There was an error. Please try again.");
 	});
 }
 function appendNumber(number){
 	var appendClass = "";
 	switch(number){
 		case "Fizz":
 			appendClass = "fizz";
 			break;
 		case "Buzz":
 			appendClass = "buzz";
 			break;
 		case "FizzBuzz":
 			appendClass = "fizzbuzz";
 			break;
 		case "Fin":
 			$("button#end").prop("disabled",true);
 			appendClass = "caption";
 			break;
 	}
 	if(appendClass == ""){
 		appendClass = "normal";
 	}
 	$("ul.numbers").append("<li class='" + appendClass + " animated fadeInUp'>" + number + "</li>");
 }
 function startSequence(){
 	animateIn($("p#start-container"), "fadeOutDown");
 	animateIn($("p#controls-container"), "fadeInUp");
 	$("button#end").prop("disabled",false);
 	getData();
 }
 function stopSequence(){
 	for (var i = 0; i < timeouts.length; i++) {
	    clearTimeout(timeouts[i]);
	}
	timeouts = [];
 }
/**
 * all animate-in procedures on initial load
 */	
 animateIn($("div#logo"), "fadeInUp");
 animateIn($("h1"), "fadeInUp", 1000);
 animateIn($("p#mission-text"), "fadeInUp", 2000);
 animateIn($("p#start-container"), "fadeInUp", 3000);

/**
 * when start button is clicked
 */	
 $("button#start").on("click", function(){
 	$("p#start-container").css("height", "0");
 	startSequence();
 });
 /**
 * when end button is clicked
 */	
 $("button#end").on("click", function(){
 	$(this).prop("disabled",true);
 	stopSequence();
 });
 /**
 * when restart button is clicked
 */	
 $("button#restart").on("click", function(){
 	stopSequence();
 	$("ul.numbers").html("");
 	startSequence();
 });
 /**
 * when menu-modal button is pushed
 */
 $("div#menu-icon").on("click", function(){
 	$(this).toggleClass("modal-mode");
 	if($(this).hasClass("modal-mode")){
 		$("div#menu-modal").fadeIn(250);
 		$("body").addClass("modal-open");
 	}
 	else{
 		$("div#menu-modal").fadeOut(250);
 		$("body").removeClass("modal-open");
 	}
 });

})(jQuery);