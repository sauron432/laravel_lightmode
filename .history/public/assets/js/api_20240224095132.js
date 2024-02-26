

const options = {
    url: "/",
    success: function(){
        console.log("success");
    },
    error: function(){
        console.log("error");
        
    },
    complete: function(){

    }
}

$.ajax(options)