$(document).ready(function(){
    //menu button 1
    var mainMenu = $('#navbar');
    var expandButton = $('#expandButton');
    expandButton.attr('tabindex', 1);

    $(document).keydown(function(e){
        var focusedItem = $(document.activeElement);
        switch(e.which){
            case 39: //right arrow
            case 40: //down arrow
            e.preventDefault();
                $('#navbar > li').find("a").each(function(index) {
                   var temp = $(this);
                   
                   if(focusedItem[0].innerText == temp[0].innerText && (index + 2) <= mainMenu.children().length ){
                    mainMenu.find('li:nth-child(' + (index + 2) +') a').focus();
                    return false;
                   }else if((index + 2) > mainMenu.children().length){
                    mainMenu.find('li:first a').focus();
                   }                   
                })
                
            break;
            
            case 37: // left arrow
            case 38: // up arrow
            e.preventDefault();
            $('#navbar > li').find("a").each(function(index) {
                var temp = $(this);
                
                if(focusedItem[0].innerText == temp[0].innerText && index == 0){
                    mainMenu.find('li:last a').focus();
                }else if(focusedItem[0].innerText == temp[0].innerText && index <= mainMenu.children().length){
                    mainMenu.find('li:nth-child(' + index +') a').focus();
                    return false;
                }                 
             })
            break;
        };
    });

});