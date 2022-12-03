$(function () {
  startRefresh();
});

function startRefresh() {
  setTimeout(startRefresh, 1000);
  $.get("scooter1.php", function (data) {
    $("#tabel").html(data);
  });
}
