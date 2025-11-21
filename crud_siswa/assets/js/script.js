function validateForm() {
    const nama = document.getElementById('nama').value;
    const nis = document.getElementById('nis').value;
    const email = document.getElementById('email').value;
    if (!nama || !nis || !email) {
        alert('Nama, NIS, dan Email wajib diisi!');
        return false;
    }
    // Validasi sederhana: nis harus angka (opsional, sesuaikan)
    if (isNaN(nis)) {
        alert('NIS harus berupa angka!');
        return false;
    }
    return true;
}
