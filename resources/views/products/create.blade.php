<h1>Tambah Produk</h1>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Nama Produk"><br>
    <textarea name="description" placeholder="Deskripsi"></textarea><br>
    <input type="number" name="price" placeholder="Harga"><br>
    <input type="number" name="stock" placeholder="Stok"><br>
    <input type="file" name="image"><br>
        <!-- <div class="mb-3">
            <label for="image" class="form-label"> Gambar Produk</label>
            <input type="file" name="image" id="image" class="form-control">
        </div> -->
    <button type="submit">Simpan</button>
</form>
