<h1>Tambah Produk</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama Produk"><br>
    <textarea name="description" placeholder="Deskripsi"></textarea><br>
    <input type="number" name="price" placeholder="Harga"><br>
    <input type="number" name="stock" placeholder="Stok"><br>
    <button type="submit">Simpan</button>
</form>
