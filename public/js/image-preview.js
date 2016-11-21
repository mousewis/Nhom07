$(document).ready(function () {
    $("input[name='dt_hinh']").change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#dt_hinh_preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
});