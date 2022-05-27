$(document).ready(()=>{
    $ = jQuery;
    console.log("here we are");
   
    
    $(".add").click((event)=>{
        let input = $(".form-control");
        
        console.log(event);
        let i = 0
        for(i = 0 ; i < 6 ; i++) {
            console.log(input[i]);
            
            console.log(typeof input[i]);
            

            if(input[i].value == ""){
                event.preventDefault();
                
                input[i].placeholder = "Enter an entry"
                window.location.hash = input[i].id
                break;
            }
         }
         if (i == 6){
             console.log("do this");
             
         }
        
    })



})