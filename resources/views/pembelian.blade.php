@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<h2>Form Pembelian</h2>
<form action="{{ route('pembelian.store') }}" method="POST">
    @csrf

    <label>Pembeli:</label>
    <select name="pembeli_id" required>
        <option value="">-- Pilih Pembeli --</option>
        @foreach($pembelis as $pembeli)
            <option value="{{ $pembeli->id }}">{{ $pembeli->nama }}</option>
        @endforeach
    </select><br>

    <label>Produk:</label>
    <select name="produk_id" required>
        <option value="">-- Pilih Produk --</option>
        @foreach($produks as $produk)
            <option value="{{ $produk->id }}">{{ $produk->nama }} - Rp{{ number_format($produk->harga) }}</option>
        @endforeach
    </select><br>

    <label>Penjual:</label>
    <select name="penjual_id" required>
        <option value="">-- Pilih Penjual --</option>
        @foreach($penjuals as $penjual)
            <option value="{{ $penjual->id }}">{{ $penjual->nama }}</option>
        @endforeach
    </select><br>

    <label>Jumlah:</label>
    <input type="number" name="jumlah" min="1" required><br>

    <button type="submit">Simpan Pembelian</button>
</form>

<hr>

<h2>Daftar Pembelian</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pembeli</th>
            <th>Produk</th>
            <th>Penjual</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pembelians as $pembelian)
            <tr>
                <td>{{ $pembelian->id }}</td>
                <td>{{ $pembelian->pembeli->nama ?? '-' }}</td>
                <td>{{ $pembelian->produk->nama ?? '-' }}</td>
                <td>{{ $pembelian->penjual->nama ?? '-' }}</td>
                <td>{{ $pembelian->jumlah }}</td>
                <td>Rp{{ number_format($pembelian->total_harga) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;">Belum ada data pembelian</td>
            </tr>
        @endforelse
    </tbody>
</table>
