
$(document).ready(function () {
    $(".hamburger-icon").click(function () {
        $("#sidebar").addClass("side-collapse");
        $(".exit-sidebar").clas
    });
    $(".exit-sidebar").click(function () {
        $("#sidebar").removeClass("side-collapse");

    });
});