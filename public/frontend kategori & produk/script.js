const baseUrl = 'http://localhost:8000/api'; 

// ----------------- KATEGORI -------------------
function tampilkanKategori() {
  fetch(`${baseUrl}/kategoris`)
    .then(res => res.json())
    .then(data => {
      const list = document.getElementById("listKategori");
      list.innerHTML = "";
      data.forEach(k => {
        const li = document.createElement("li");
        li.innerHTML = `ID: ${k.id}, Nama: ${k.nama}
          <button onclick="editKategori('${k.id}', '${k.nama}')">Edit</button>
          <button onclick="hapusKategori('${k.id}')">Hapus</button>`;
        list.appendChild(li);
      });
      loadKategoriKeDropdown();
    });
}

function simpanKategori() {
  const id = document.getElementById("kategoriId").value;
  const nama = document.getElementById("kategoriNama").value;
  const isUpdate = document.getElementById("kategoriId").disabled;
  const url = isUpdate ? `${baseUrl}/kategoris/${id}` : `${baseUrl}/kategoris`;
  const method = isUpdate ? 'PUT' : 'POST';

  fetch(url, {
    method: method,
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ nama })
  }).then(() => {
    resetKategori();
    tampilkanKategori();
  });
}

function editKategori(id, nama) {
  document.getElementById("kategoriId").value = id;
  document.getElementById("kategoriNama").value = nama;
  document.getElementById("kategoriId").disabled = true;
}

function resetKategori() {
  document.getElementById("kategoriId").value = "";
  document.getElementById("kategoriNama").value = "";
  document.getElementById("kategoriId").disabled = false;
}

function hapusKategori(id) {
  fetch(`${baseUrl}/kategoris/${id}`, { method: 'DELETE' }).then(tampilkanKategori);
}

function loadKategoriKeDropdown() {
  fetch(`${baseUrl}/kategoris`)
    .then(res => res.json())
    .then(data => {
      const select = document.getElementById("produkKategori");
      select.innerHTML = `<option value="">-- Pilih Kategori --</option>`;
      data.forEach(k => {
        const opt = document.createElement("option");
        opt.value = k.id;
        opt.textContent = k.nama;
        select.appendChild(opt);
      });
    });
}

// ----------------- PRODUK -------------------
function tampilkanProduk() {
  fetch(`${baseUrl}/produks`)
    .then(res => res.json())
    .then(data => {
      const list = document.getElementById("listProduk");
      list.innerHTML = "";
      data.forEach(p => {
        const li = document.createElement("li");
        li.innerHTML = `ID: ${p.id}, Nama: ${p.nama}, Harga: ${p.harga}, Stok: ${p.stok}, Kategori: ${p.kategori_id}
          <button onclick="editProduk('${p.id}')">Edit</button>
          <button onclick="hapusProduk('${p.id}')">Hapus</button>`;
        list.appendChild(li);
      });
      loadProdukKeDropdown();
    });
}

function simpanProduk() {
  const id = document.getElementById("produkId").value;
  const nama = document.getElementById("produkNama").value;
  const harga = document.getElementById("produkHarga").value;
  const stok = document.getElementById("produkStok").value;
  const kategori_id = document.getElementById("produkKategori").value;
  const isUpdate = document.getElementById("produkId").disabled;
  const url = isUpdate ? `${baseUrl}/produks/${id}` : `${baseUrl}/produks`;
  const method = isUpdate ? 'PUT' : 'POST';

  fetch(url, {
    method: method,
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ nama, harga, stok, kategori_id })
  }).then(() => {
    resetProduk();
    tampilkanProduk();
  });
}

function editProduk(id) {
  fetch(`${baseUrl}/produks/${id}`)
    .then(res => res.json())
    .then(p => {
      document.getElementById("produkId").value = p.id;
      document.getElementById("produkNama").value = p.nama;
      document.getElementById("produkHarga").value = p.harga;
      document.getElementById("produkStok").value = p.stok;
      document.getElementById("produkKategori").value = p.kategori_id;
      document.getElementById("produkId").disabled = true;
    });
}

function resetProduk() {
  document.getElementById("produkId").value = "";
  document.getElementById("produkNama").value = "";
  document.getElementById("produkHarga").value = "";
  document.getElementById("produkStok").value = "";
  document.getElementById("produkKategori").value = "";
  document.getElementById("produkId").disabled = false;
}

function hapusProduk(id) {
  fetch(`${baseUrl}/produks/${id}`, { method: 'DELETE' }).then(tampilkanProduk);
}

function loadProdukKeDropdown() {
  fetch(`${baseUrl}/produks`)
    .then(res => res.json())
    .then(data => {
      const selector = document.getElementById("produkSelector");
      selector.innerHTML = '<option value="">-- Pilih Produk --</option>';
      data.forEach(p => {
        const opt = document.createElement("option");
        opt.value = p.id;
        opt.textContent = `${p.nama} - Rp${p.harga}`;
        selector.appendChild(opt);
      });
    });
}

function pilihProdukIni() {
  const id = document.getElementById("produkSelector").value;
  if (id) editProduk(id);
}

document.addEventListener("DOMContentLoaded", () => {
  tampilkanKategori();
  tampilkanProduk();
});