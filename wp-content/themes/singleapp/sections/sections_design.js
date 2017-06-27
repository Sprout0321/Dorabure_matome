document.getElementById("topimage").style.display = "none";
document.getElementById("myvideo").onended = function() {myFunction()};
function myFunction() {
	document.getElementById("myvideo").style.display = "none";
    document.getElementById("banner-id").style.display = "block";
    document.getElementById("topimage").style.display = "block";
}
console.log("test log");

jQuery(function() {
	jQuery(window).scroll(function() {
		console.log(jQuery(this).scrollTop());
	    if(jQuery(this).scrollTop() < 700) {
			jQuery( ".logoimageclass" ).removeClass("unfixed-pos");
			jQuery( ".logoimageclass" ).addClass("fixed-pos");
	    } else {
			jQuery( ".logoimageclass" ).removeClass("fixed-pos");
			jQuery( ".logoimageclass" ).addClass("unfixed-pos");
	    }
	});
});