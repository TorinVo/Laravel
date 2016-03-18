$(function() {
  $(".navbar-expand-toggle").click(function() {
    $(".app-container").toggleClass("expanded");
    return $(".navbar-expand-toggle").toggleClass("fa-rotate-90");
  });
  return $(".navbar-right-expand-toggle").click(function() {
    $(".navbar-right").toggleClass("expanded");
    return $(".navbar-right-expand-toggle").toggleClass("fa-rotate-90");
  });
});

$(function() {
  return $('.clt2').select2();
});

$(function() {
  return $('.toggle-checkbox').bootstrapSwitch({
    size: "small"
  });
});

$(function() {
  return $('.match-height').matchHeight();
});

$(function() {
  return $('.datatable').DataTable({
    "dom": '<"top"fl<"clear">>rt<"bottom"ip<"clear">>',
    "bLengthChange": false,
    "pageLength": 25,
    "columnDefs": [{
      "targets": 'no-sort',
      "orderable": false,
      "order": []
    }],
    language: {
      search: "Tìm Kiếm",
      searchPlaceholder: "Nhập Thứ Bạn Muốn Tìm"
    }
  });
});

$(function() {
  return $(".side-menu .nav .dropdown").on('show.bs.collapse', function() {
    return $(".side-menu .nav .dropdown .collapse").collapse('hide');
  });
});

$('div.cls-error').delay(3000).slideUp();




