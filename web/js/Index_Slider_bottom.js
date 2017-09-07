//current position
var pos2 = 0;
//number of slides
var totalSlidesBottom = $('#slider-bottom-wrap ul li').length;
//get the slide width
var sliderWidthBottom = $('#slider-bottom-wrap').width();

var sliderBottomLiWidth = sliderWidthBottom / totalSlidesBottom;


$(document).ready(function(){


	/*****************
	 BUILD THE SLIDER
	*****************/
	//set width to be 'x' times the number of slides
	$('#slider-bottom-wrap ul li').width(sliderWidthBottom * totalSlidesBottom);

    //next slide
	$('#next-bottom').click(function(){
		slideRightBottom();
	});

	//previous slide
	$('#previous-bottom').click(function(){
		slideLeftBottom();
	});



});//DOCUMENT READY



/***********
 SLIDE LEFT
************/
function slideLeftBottom(){
	pos2--;
	if(pos2==-1){ pos2 = totalSlidesBottom-1; }
	$('#slider-bottom-wrap ul#slider-bottom li').css('left', -(sliderWidthBottom*pos2));
}


/************
 SLIDE RIGHT
*************/
function slideRightBottom(){
	pos2++;
	if(pos2==totalSlidesBottom){ pos2 = 0; }
	$('#slider-bottom-wrap ul#slider-bottom li').css('left', -(sliderWidthBottom*pos2));
}
