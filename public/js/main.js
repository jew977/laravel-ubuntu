$(document).ready(function(){
$('.thumbnail').hover(function(){
	$(this).find('span').css("font-size","98px");
},function(){
$(this).find('span').css("font-size","89px");
})

$('.list-menu li:has(ul)').click(function (event) {
        if(this == event.target) { 
            console.log($(this).children());
            $(this).find('ul').toggle();
        }
    })
});

if($('.sk-message').fadeOut()){
$('.sk-message').fadeIn(1000);
	setTimeout(function(){
	 $('.sk-message').fadeOut();
	},8000)
 }