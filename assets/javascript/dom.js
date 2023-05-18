$(document).ready(function () {
  $("#data-table").DataTable();
});

$(document).ready(function () {
  $("#sidebar-btn").click(function () {
    if ($("#sidebar").hasClass("block")) {
      // $("#sidebar").hide(500);
      $("#sidebar").removeClass("block");
      $("#sidebar").addClass("hidden");
      $("#sidebar").width("0%");
      $("#main-container").width("100%");
      $("#sidebar-btn").removeClass("on");
      $("#sidebar-btn").addClass("off");
    } else {
      // $("#sidebar").show(500);
      $("#sidebar").removeClass("hidden");
      $("#sidebar").addClass("block");
      $("#sidebar").width("20%");
      $("#main-container").width("80%");
      $("#sidebar-btn").removeClass("off");
      $("#sidebar-btn").addClass("on");
    }
  });
});
