var dictionary = [];
$.ajax({
    type: 'POST',
    url: 'messaging/dictionaryBuilder.php',
    dataType: "JSON",
    async: false,
    success: function (data) {
        dictionary = data;
        console.log("dictionary: SUCCESS");
    },
    error: function () {
        console.log("dictionary: FAIL");
    }
});