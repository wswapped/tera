

     $("#l101").click( function(e){
      e.preventDefault();
      $("#l100").focus();
     })

  function myFunction(event) {
    var x = event.which || event.keyCode;
    if (x == 17) {
        $("#l200").focus();
    }
}

function myFunction(event1) {
    var x = event.which || event.keyCode;
    if (x == 18) {
        $("#l300").focus();
    }
}

function myFunction(event2) {
    var x = event.which || event.keyCode;
    if (x == 65) {
        window.open("/hssec/xdhgfshjksghlskdfgjfhgfjhfkgh","_blank")
    }
}