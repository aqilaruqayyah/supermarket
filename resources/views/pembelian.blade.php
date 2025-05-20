@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

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
