// notif produk
$('.ubahBerhasil').show(function() {
    toastr.success('Data yang dipilih berhasil di update.')
  });
$('.ubahGagal').show(function() {
    toastr.error('Data yang dipilih gagal di update')
  });
$('.tambahBerhasil').show(function() {
    toastr.success('Data berhasil di tambahkan.')
  });
$('.tambahGagal').show(function() {
    toastr.error('Data gagal di tambahkan')
  });
$('.hapusBerhasil').show(function() {
    toastr.success('Data yang dipilih berhasil di hapus.')
  });
$('.hapusGagal').show(function() {
    toastr.error('Data yang dipilih gagal di hapus')
  });