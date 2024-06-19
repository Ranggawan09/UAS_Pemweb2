$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id-siswa").val($(this).data("id"));
  $(".modal-body #nisn").val($(this).data("nisn"));
  $(".modal-body #nama").val($(this).data("nama"));
});

//dropify --img preview
$(document).ready(function () {
  $(".dropify").dropify();
});

//Sweet Alert 2
const swal = $(".swal").data("swal");
if (swal) {
  Swal.fire({
    title: "Data berhasil",
    text: swal,
    icon: "success",
  });
}

$(document).on("click", ".btn-hapus", function (e) {
  //hentikan aksi default
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data yang dihapus tidak dapat dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});
