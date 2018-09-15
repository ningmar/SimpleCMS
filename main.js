function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
// function saveChange(){
//   alert('lets work man');
// // var old = $("#cpassword").val();
// // var  newpass= $("#newpassword").val();
// // var pass = $("#conpassword").val();
// // // Returns successful data submission message when the entered information is stored in database.
// // var dataString = 'cpassword='+ old + '&newpassword='+ newpass + '&conpassword='+ pass;
// // if(old==''||newpass==''||pass=='')
// // {
// // $('#hidden').html('ALL fields sould be filled');
// // }
// // else
// // {//check correction
// //   if (newpass != pass) {
// //         newpass = '';
// //         pass = '';
// //         $('#hidden').html('Password Mismatched. Try one more time');
// //       }
// //       else{
// //           // AJAX Code To Submit Form.
// //           $.ajax({
// //           type: "POST",
// //           url: "process/changepasswordprocess.php",
// //           data: dataString,
// //           cache: false,
// //           success: function(){
// //           alert('success');
// //           }
// //           });
// //           }
// //           }
// //           return false;
//           }
// // function changepass(){
//   //   var old = $('cpassword');
//   //   var newpass = $('newpassword');
//   //   var conpass = $('conpassword');
//   //   if (old == '' || newpass == '' || conpass == '') {
//   //     $('#hidden').html('All the fields should be filled.')
//   //   }
//   //   else{
//   //     if (newpass != conpass) {
//   //       newpass = '';
//   //       conpass = '';
//   //       $('#hidden').html('Password Mismatched.');

//   //     }else{
//   //       $.ajax({
//   //       type: "POST",
//   //       url: "process/changepasswordprocess.php",
//   //       data: jQuery("#pass_form").serialize(),
//   //       cache: false,
//   //       success:  function(data){
//   //           alert('well lets see');
//   //          // header('location:../')
//   //       }
//   //     });
//   //     }
//   //   }

