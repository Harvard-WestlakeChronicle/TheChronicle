	$("#archive-showcase").awShowcase(
	{
		content_width:			1020,
		content_height:			515,
		fit_to_parent:			false,
		auto:					true,
		interval:				3000,
		continuous:				false,
		loading:				true,
		tooltip_width:			200,
		tooltip_icon_width:		32,
		tooltip_icon_height:	32,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					false,
		buttons:				false,
		btn_numbers:			false,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			true,
		transition:				'vslide', /* hslide/vslide/fade */
		transition_delay:		00,
		transition_speed:		400,
		show_caption:			'show', /* onload/onhover/show */
		thumbnails:				true,
		thumbnails_position:	'outside-last', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	'vertical', /* vertical/horizontal */
		thumbnails_slidex:		0, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
		dynamic_height:			false, /* For dynamic height to work in webkit you need to set the width and height of images in the source. Usually works to only set the dimension of the first slide in the showcase. */
		speed_change:			false, /* Set to true to prevent users from swithing more then one slide at once. */
		viewline:				false /* If set to true content_width, thumbnails, transition and dynamic_height will be disabled. As for dynamic height you need to set the width and height of images in the source. */
	});
	
$('.featsminibox h4').each(function(){
	$(this).hover(function(){
		$(this).siblings('.annoyingbar').stop().animate({
			height : '20px',
			marginBottom : '-10px'
		}, 200, 'easeOutExpo');
		
		$(this).siblings('.annoyingbar').find('a').css('display', 'block').stop().animate({opacity : '1'});
	}, function(){
		$(this).siblings('.annoyingbar').stop().animate({
			height : '10px',
			marginBottom : '0px'
		}, 200, 'easeOutExpo');
		
		$(this).siblings('.annoyingbar').find('a').css('display', 'none').stop().animate({opacity : '0'}, 200);
	});
});
$('.featsminibox .annoyingbar.moveable').each(function(){
	$(this).hover(function(){
		$(this).stop().animate({
			height : '20px',
			marginBottom : '-10px'
		}, 200, 'easeOutExpo');
		
		$(this).find('a').css('display', 'block').stop().animate({opacity : '1'});
	}, function(){
		$(this).stop().animate({
			height : '10px',
			marginBottom : '0px'
		}, 200, 'easeOutExpo');
		
		$(this).find('a').css('display', 'none').stop().animate({opacity : '0'}, 200);
	});
});