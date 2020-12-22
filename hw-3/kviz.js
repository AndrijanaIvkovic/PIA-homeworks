function onLoad(){
    document.getElementById("name").value = "";
  }

$(document).ready(function(){
    $("#next").click(function(){
        var name = $("#name").val().toString();
        if (name != ""){
            $(".valid").hide();
            $("#next").hide();
            $("#znak").hide();
            document.getElementById("pocetak").innerHTML = "Upoznajte se sa pravilima, pre nego što započnete kviz.<br>"
            $("#pocetak").fadeIn();
            $("#start").fadeIn();
            $(".pravila").fadeIn();
        }
    });
});

