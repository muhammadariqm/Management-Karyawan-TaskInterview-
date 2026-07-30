function showApiError() {
    Swal.fire({
        icon: "error",
        title: "Data Wilayah Tidak Tersedia",
        text: "Public API wilayah sedang tidak dapat diakses. Silakan periksa koneksi internet atau coba lagi beberapa saat.",
        confirmButtonText: "OK",
    });
}

document.addEventListener("DOMContentLoaded", function () {
    loadProvinces();

    function loadProvinces() {
        fetch("/api/provinces")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Gagal mengambil data provinsi");
                }
                return response.json();
            })
            .then((data) => {
                let html = '<option value="">-- Pilih Provinsi --</option>';

                data.forEach(function (item) {
                    html += `<option value="${item.id}">${item.name}</option>`;
                });

                document.getElementById("provinsi").innerHTML = html;
            })
            .catch((err) => {
                console.error(err);
                showApiError();
            });
    }
});

/* ================= Provinsi ================= */
document.getElementById("provinsi").addEventListener("change", function () {
    document.getElementById("provinsi_nama").value =
        this.options[this.selectedIndex].text;

    fetch("/api/regencies/" + this.value)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Gagal mengambil data kabupaten");
            }

            return response.json();
        })
        .then((data) => {
            let html = '<option value="">-- Pilih Kabupaten --</option>';

            data.forEach((item) => {
                html += `<option value="${item.id}">${item.name}</option>`;
            });

            document.getElementById("kabupaten").innerHTML = html;

            document.getElementById("kecamatan").innerHTML =
                '<option value="">-- Pilih Kecamatan --</option>';

            document.getElementById("desa").innerHTML =
                '<option value="">-- Pilih Desa --</option>';
        })
        .catch((err) => {
            console.error(err);
            showApiError();
        });
});

/* ================= Kabupaten ================= */
document.getElementById("kabupaten").addEventListener("change", function () {
    document.getElementById("kabupaten_nama").value =
        this.options[this.selectedIndex].text;

    fetch("/api/districts/" + this.value)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Gagal mengambil data kecamatan");
            }

            return response.json();
        })
        .then((data) => {
            let html = '<option value="">-- Pilih Kecamatan --</option>';

            data.forEach((item) => {
                html += `<option value="${item.id}">${item.name}</option>`;
            });

            document.getElementById("kecamatan").innerHTML = html;

            document.getElementById("desa").innerHTML =
                '<option value="">-- Pilih Desa --</option>';
        })
        .catch((err) => {
            console.error(err);
            showApiError();
        });
});

/* ================= Kecamatan ================= */
document.getElementById("kecamatan").addEventListener("change", function () {
    document.getElementById("kecamatan_nama").value =
        this.options[this.selectedIndex].text;

    fetch("/api/villages/" + this.value)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Gagal mengambil data desa");
            }

            return response.json();
        })
        .then((data) => {
            let html = '<option value="">-- Pilih Desa --</option>';

            data.forEach((item) => {
                html += `<option value="${item.id}">${item.name}</option>`;
            });

            document.getElementById("desa").innerHTML = html;
        })
        .catch((err) => {
            console.error(err);
            showApiError();
        });
});

/* ================= Desa ================= */
document.getElementById("desa").addEventListener("change", function () {
    document.getElementById("desa_nama").value =
        this.options[this.selectedIndex].text;
});
