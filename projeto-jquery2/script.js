$(function(){

    $(".objeto").on("mousedown", function(){
        $(".objeto").on("mousemove", function(e){
            var x = e.originalEvent.pageX;
            var y = e.originalEvent.pageY;
            console.log(e)
            
            var width = $(this).width();
            var height = $(this).height();
            
            $(this).css('left', (x - (width/2))+'px');
            $(this).css('top',(y - (height/2))+'px');
        });
    });

    $(".objeto").on("mouseup", function(){
        $(".objeto").off("mousemove");
    });

});