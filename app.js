$(document).ready(() => {
  $("#number").hide();
  let id = '.$id.';
  $.ajax({
       url: "notification.php",
       type: "POST",
       data: { id },
       success: function (n) {
         if (n != 0) {
           $("#number").html(n);
           $("#number").show();
         }
       }
  });
});
