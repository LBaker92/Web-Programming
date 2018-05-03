function autoComplete() {
    $.ajax({
        type: 'POST',
        url: 'messaging/dictionaryBuilder.php',
        dataType: "JSON",
        success: function (data) {
            $("#sendie").autocomplete({
                source: data
            });
            //console.log("dictionary: SUCCESS");
        },
        error: function () {
            //console.log("dictionary: FAIL");
        }
    });
}

setInterval(autoComplete, 0)