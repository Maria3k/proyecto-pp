function notificacion(id) {
    $("#number").hide();
    $.ajax({
      url: "notification.php",
      type: "POST",
      data: {
        id
      },
      success: (n) => {
        console.log(n);
        cant = JSON.parse(n).length;
        if (cant != 0) $("#number").html(cant).show();
      }
    });
  }