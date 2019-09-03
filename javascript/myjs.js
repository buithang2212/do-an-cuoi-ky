      function validate() {
        var a = document.getElementByID("name").value;
        var b = document.getElementByID("mail").value;
        var c = document.getElementByID("phone").value;
        var d = document.getElementByID("address").value;
        var e = document.getElementByID("content").value;
        var errorStr = " ";

        if ( a == "") {
          errorStr += "Vui lòng nhập đầy đủ họ tên\n";
        }
        if ( b == "") {
          errorStr += "Vui lòng nhập địa chỉ Email\n";
        }
        if ( c == "") {
          errorStr += "Vui lòng nhập số điện thoại\n";
        }
        if ( d == "") {
          errorStr += "Vui lòng nhập địa chỉ\n";
        }
        if ( e == "") {
          errorStr += "Vui lòng nhập nội dung\n";
        }
        //
        if (errorStr != "") {
          alert(errorStr);
          return false;
        } else {
          alert("Thông tin liên hệ: " + "\nHọ Tên: " + a + "\nEmail: " + b + "\n Số điện thoại: " + c + "\nĐịa chỉ: " + d + "\nNội Dung: " + e)
          return true;
        }
      }