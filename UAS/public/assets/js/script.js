//siswa
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id-siswa").val($(this).data("id"));
  $(".modal-body #nisn").val($(this).data("nisn"));
  $(".modal-body #nama").val($(this).data("nama"));
  $(".modal-body #kelas").val($(this).data("kelas"));
  $(".modal-body #alamat").val($(this).data("alamat"));
  $(".modal-body #telepon").val($(this).data("telepon"));
});

$(document).on("click", "#btn-detail", function () {
  $(".modal-body #id-siswa").val($(this).data("id"));
  $(".modal-body #nisn").text($(this).data("nisn"));
  $(".modal-body #nama").text($(this).data("nama"));
  $(".modal-body #kelas").text($(this).data("kelas"));
  $(".modal-body #alamat").text($(this).data("alamat"));
  $(".modal-body #telepon").text($(this).data("telepon"));
});

//jadwal
$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id-jadwal").val($(this).data("id"));
  $(".modal-body #hari").val($(this).data("hari"));
  $(".modal-body #mapel").val($(this).data("mapel"));
  $(".modal-body #guru_id").val($(this).data("guru"));
  $(".modal-body #kelas").val($(this).data("kelas"));
  $(".modal-body #jam").val($(this).data("jam"));
});

//guru
$(document).on("click", "#btn-edit", function () {
  var id = $(this).data("id");
  var gambar = $(this).data("gambar");
  var nip = $(this).data("nip");
  var nama = $(this).data("nama");

  $(".modal-body #id-guru").val(id);
  $(".modal-body #nip").val(nip);
  $(".modal-body #nama").val(nama);

  // Mengupdate data-default-file dan inisialisasi ulang Dropify
  var dropifyInput = $(".modal-body #gambar");
  dropifyInput.attr("data-default-file", "/assets/img/guru/" + gambar);

  // Hancurkan instance sebelumnya dan buat ulang
  dropifyInput.dropify().destroy();
  dropifyInput.dropify({
    defaultFile: "/assets/img/guru/" + gambar,
  });
});

//dropify --img preview
$(document).on("click", "#btn-tambah", function () {
  // Inisialisasi Dropify
  $(".dropify").dropify();
  dropifyInput.dropify().destroy();
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

//hapus
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