  function borrarMensaje(id) {
      console.log(id);
      let form_data = new FormData();
      form_data.append('id', id);
      $.ajax({
          url: '../server/delete_event.php',
          dataType: "json",
          cache: false,
          processData: false,
          contentType: false,
          data: form_data,
          type: 'POST',
          success: function(php_response) {
              alert(php_response.msg);
          },
          error: function() {
              alert("error en la comunicación con el servidor");
          }
      })
  }
  var isElemOverDiv = function(draggedItem, dropArea) {
      var p = dropArea;
      var position = p.position();
      console.log("EL DROP AREA left: " + position.left + ", top: " + position.top);
      console.log('draggedItem.pageY ', draggedItem.clientX, draggedItem.pageY);
      if (draggedItem.clientX >= position.left && draggedItem.pageY >= position.top) {
          return true;
      }
      return false;
  }