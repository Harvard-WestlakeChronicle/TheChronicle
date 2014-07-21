$('#thequad h4, #upperschool h4, #studentfaculty h4, #middleschool h4, #alumni h4').each(function(){
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
var height = ($('#ArchiveBottom #updates').height() - 50 - $('#ArchiveBottom #updates ul').height())/6;
$('#ArchiveBottom #updates li').each(function(){$(this).css("margin-top",height);});

$('#thequad .annoyingbar.moveable, #upperschool .annoyingbar.moveable, #studentfaculty .annoyingbar.moveable, #middleschool .annoyingbar.moveable, #alumni .annoyingbar.moveable').each(function(){
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