// JavaScript Document
//window.onload(function() {
//	"use strict";
//	$(".main-nav").css("display", "none");
//});
$(".toggle-nav").click(function() {
	"use strict";
	$(this).next().slideToggle();
});