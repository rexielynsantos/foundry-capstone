// FUNCTIONS FOR VALIDATIONS
$(document).ready(function(){
  $(".img").change(function (event){
    var val = $(this).val();

  switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
      case 'jpeg': case 'jpg': case 'png':
          break;
      default:
          $(this).val('');
          // error message here
          alert("Please select an image");
          event.preventDefault();
          break;
  }

  });

  $(".validate").keyup(function(event){
       var inputValue = event.which;
      if(inputValue !== 45  ){
         $(this).val($(this).val().replace(/--+/g, '-'));
       }

       if(inputValue === 32){
         $(this).val($(this).val().replace(/  +/g, ''));
       }

       if(inputValue === 32){
         $(this).val($(this).val().replace(/  +/g, ''));
       }

       if(inputValue !== 39){
         $(this).val($(this).val().replace(/''+/g, "'"));
       }

       if(inputValue !== 47){
         $(this).val($(this).val().replace(/\/\/+/g, "/"));
       }
   });

   $(".letter").keyup(function(event){
           var inputValue = event.which;
           // allow letters and whitespaces only.
           if(!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0 && inputValue !=45 && inputValue !=39 )) {
               event.preventDefault();
           }
   });
//
//    $(".number").keyup(function(event) {
//        if ((event.which != 46 || $(this).val().indexOf('.') != -1) &&
//            ((event.which < 48 || event.which > 57) &&
//            (event.which != 0 && event.which != 8))) {
//            event.preventDefault();
//          }
//        });
//
//    $(".contact").keyup(function(event) {
//        $(this).val($(this).val().replace(/-+/g, ""));
//        $(this).val($(this).val().replace(/!+/g, ""));
//        $(this).val($(this).val().replace(/@+/g, ""));
//        $(this).val($(this).val().replace(/#+/g, ""));
//        $(this).val($(this).val().replace(/\$+/g, ""));
//        $(this).val($(this).val().replace(/%+/g, ""));
//        $(this).val($(this).val().replace(/\^+/g, ""));
//        $(this).val($(this).val().replace(/&+/g, ""));
//        $(this).val($(this).val().replace(/\*+/g, ""));
//        $(this).val($(this).val().replace(/\(+/g, ""));
//        $(this).val($(this).val().replace(/\)+/g, ""));
//        $(this).val($(this).val().replace(/_+/g, ""));
//        $(this).val($(this).val().replace(/\++/g, "+"));
//        $(this).val($(this).val().replace(/=+/g, ""));
//        $(this).val($(this).val().replace(/a+/g, ""));
//        $(this).val($(this).val().replace(/b+/g, ""));
//        $(this).val($(this).val().replace(/c+/g, ""));
//        $(this).val($(this).val().replace(/d+/g, ""));
//        $(this).val($(this).val().replace(/e+/g, ""));
//        $(this).val($(this).val().replace(/f+/g, ""));
//        $(this).val($(this).val().replace(/g+/g, ""));
//        $(this).val($(this).val().replace(/h+/g, ""));
//        $(this).val($(this).val().replace(/i+/g, ""));
//        $(this).val($(this).val().replace(/j+/g, ""));
//        $(this).val($(this).val().replace(/k+/g, ""));
//        $(this).val($(this).val().replace(/l+/g, ""));
//        $(this).val($(this).val().replace(/m+/g, ""));
//        $(this).val($(this).val().replace(/n+/g, ""));
//        $(this).val($(this).val().replace(/o+/g, ""));
//        $(this).val($(this).val().replace(/p+/g, ""));
//        $(this).val($(this).val().replace(/q+/g, ""));
//        $(this).val($(this).val().replace(/r+/g, ""));
//        $(this).val($(this).val().replace(/s+/g, ""));
//        $(this).val($(this).val().replace(/t+/g, ""));
//        $(this).val($(this).val().replace(/u+/g, ""));
//        $(this).val($(this).val().replace(/v+/g, ""));
//        $(this).val($(this).val().replace(/w+/g, ""));
//        $(this).val($(this).val().replace(/x+/g, ""));
//        $(this).val($(this).val().replace(/y+/g, ""));
//        $(this).val($(this).val().replace(/z+/g, ""));
//        $(this).val($(this).val().replace(/\[+/g, ""));
//        $(this).val($(this).val().replace(/]+/g, ""));
//       $(this).val($(this).val().replace(/{+/g, ""));
//       $(this).val($(this).val().replace(/}+/g, ""));
//       $(this).val($(this).val().replace(/;+/g, ""));
//       $(this).val($(this).val().replace(/:+/g, ""));
//       $(this).val($(this).val().replace(/'+/g, ""));
//       $(this).val($(this).val().replace(/"+/g, ""));
//       $(this).val($(this).val().replace(/\\+/g, ""));
//       $(this).val($(this).val().replace(/\|+/g, ""));
//       $(this).val($(this).val().replace(/\,+/g, ""));
//       $(this).val($(this).val().replace(/<+/g, ""));
//       $(this).val($(this).val().replace(/\.+/g, ""));
//       $(this).val($(this).val().replace(/>+/g, ""));
//       $(this).val($(this).val().replace(/\?+/g, ""));
//       $(this).val($(this).val().replace(/\/+/g, ""));
//       $(this).val($(this).val().replace(/`+/g, ""));
//       $(this).val($(this).val().replace(/~+/g, ""));
//       $(this).val($(this).val().replace(/ +/g, ""));
//   });

//INTEGER ONLY
  $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
                 return;
              }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    //
    // $(".img").change(function(){
    //   if (!(/\.(gif|jpg|jpeg|tiff|png)\$/i).test(fileName)) {
    //    alert('You must select an image file only');
    //   }
    // });
})
