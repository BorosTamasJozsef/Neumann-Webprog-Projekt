$(document).ready(function() {

    kateg();
    term();
    function kateg() {
        $.ajax ({
            url: "config.inc.php",
            method: "POST",
            data: {kategoria: 1},
            success: function(data){
                $("kategoria_leker").html(data);
            }
        })
    }
    function term() {
        $.ajax({
            url: "config.inc.php",
            method: "POST",
            data: {termek: 1},
            success: function(data){
                $("#termek_leker").html(data);
            }
        })
    }
})