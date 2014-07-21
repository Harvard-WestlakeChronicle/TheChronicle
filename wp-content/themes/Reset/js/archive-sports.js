$('#football h4, #fieldhockey h4, #XC h4, #girlvball h4, #ggolf h4, #bwp h4, #gtennis h4, #boys_soccer h4, #girlsoccer h4, #boys_basketball h4, #girls_basketball h4, #gwp h4, #boys_wrestling h4, #swimming h4, #baseball h4, #lacrosse h4, #trackfield h4, #softball h4, #bgolf h4, #bvb h4, #btennis h4').each(function(){
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

$('#football .annoyingbar.moveable, #fieldhockey .annoyingbar.moveable, #XC .annoyingbar.moveable, #girlvball .annoyingbar.moveable, #ggolf .annoyingbar.moveable, #bwp .annoyingbar.moveable, #gtennis .annoyingbar.moveable, #boys_soccer .annoyingbar.moveable, #girlsoccer .annoyingbar.moveable, #boys_basketball .annoyingbar.moveable, #girls_basketball .annoyingbar.moveable, #gwp .annoyingbar.moveable, #boys_wrestling .annoyingbar.moveable, #swimming .annoyingbar.moveable, #baseball .annoyingbar.moveable, #lacrosse .annoyingbar.moveable, #trackfield .annoyingbar.moveable, #softball .annoyingbar.moveable, #bgolf .annoyingbar.moveable, #bvb .annoyingbar.moveable, #btennis .annoyingbar.moveable').each(function(){
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