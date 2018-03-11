$(document).ready(function(){
    $.post("/web/user/check-offers",null,function(result){
        var msg = result;
        if(msg.ready == false){
            var interval =  setInterval(function(){ 
                $.post("/web/user/check-offers",null,function(result){
                  var msg = result;
                  if(msg.ready == true){
                      location.reload();
                      clearInterval(interval);
                  }
                },'json');

            },5000);
        }
    },'json');
    
 
});