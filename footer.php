
<script type="text/javascript">
//FORM VALIDATION
$("#submit").click(function(){
    var error="";
    var email_address=$("#email");
    email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
if(!email_regex.test(email_address.val()) && email_address.val()!=""){ 
    error+="This is not a valid email.<br>"
 }    
if($("#email").val()==""){
    error+="Email field is empty.<br>"
}
if($("#password").val()==""){
    error+="Password field is empty.<br>"
}
if(error!=""){
    error="<h6>Javascript Validation</h6>There are a few error(s):<br>"+error;
    $("#error").addClass("alert alert-danger").html(error);
    $("#form").submit(function(e){
        return false;
    })
}
else{
    
    
    $('form').unbind('submit').submit(); 
    
}
});
//!FORM VALIDATION


//LOGIN REGISTER TOGGLE
$("#log").click(function(){
    if($("#checker").val()=="login"){
        $("#log").html("Login");
        $("#checker").val("register");
        $("#submit").html("Register");
        $("#rememberme").addClass("hidden");
        console.log("While registering value is "+$("#checker").val());
        
    }
    else{
        $("#log").html("Register");
        $("#checker").val("login");
        $("#submit").html("Login");
        $("#rememberme").removeClass("hidden");
        console.log("While login value is "+$("#checker").val());
    }


})
//!LOGIN REGISTER TOGGLE

//CKEDITOR SEND DATA TO DATABASE(CLASSIC VERSION)

// ClassicEditor.create(document.querySelector('#diarycontent'))
// .then(editor => {
//         editor.model.document.on('change:data', (evt, data) => {
//             $.ajax({
//    method: "POST",
//    url: "updatemessage.php",
//    data: 
//    {
//        content: editor.getData()   
//    }
   
//    })
//    .done(function(){
//        console.log("Submitted");
//  })
        
//     });
// })
// .catch(error => {
//     console.error('Editor initialization error.', error);
// });
//!CKEDITOR SEND DATA TO DATABASE(CLASSIC VERSION)

//USING STANDARD VERSION OF CKEDITOR 
CKEDITOR.replace( 'diarycontent',{
    height:410
} );
CKEDITOR.instances.diarycontent.on('change', function() { 
    var value = CKEDITOR.instances['diarycontent'].getData();
    console.log(value);
    $.ajax({
   method: "POST",
   url: "updatemessage.php",
   data: 
   {
       content: value   
   }
   
   })
   .done(function(){
       console.log("Submitted");
 })
});
//!USING STANDARD VERSION OF CKEDITOR

//TO UPDATE TEXTAREA CONTENT TO DATABASE LIVE
// $('#diarycontent').on('input propertychange', function(){

// $.ajax({
//    method: "POST",
//    url: "updatemessage.php",
//    data: 
//    {
//        content: $("#diarycontent").val(),
          
//    }
   
//    })
//    .done(function(){
//        console.log("Submitted");
//  })
// });
//!TO UPDATE TEXTAREA CONTENT TO DATABASE LIVE
</script>

</body>
</html>
