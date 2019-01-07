$(document).ready(function(){
    $("#menu").click(function(){
    	$("#menu-movil").toggle(function() {
    		$("#menu-movil").css("height","100px");
    	},function() {
    		$("#menu-movil").css("height","350px");
    	});
        $("#menu-list").toggle(function(){
            $(this).css("display","none");
            
        },function(){
            $(this).css("display","block");
            
        });
        
    });
});
