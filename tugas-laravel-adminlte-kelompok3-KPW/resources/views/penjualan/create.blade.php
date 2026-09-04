@extends('layouts.main')

@section('page_heading', 'Transaksi Kasir POS')

@section('content')
<div class="row">
    <!-- Form Tambah Item Ke Keranjang -->
    <div class="col-md-5">
        <div class="card card-warning card-outline">
            <div class="card-header">
                <h5 class="card-title mb-0 fw-bold"><i class="fa-solid fa-cart-plus me-1"></i> Pilih Produk Buket</h5>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Produk</label>
                    <select id="select_product" class="form-select">
                        <option value="">-- Pilih Buket --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" 
                                    data-nama="{{ $product->nama_produk }}" 
                                    data-harga="{{ $product->harga_jual }}" 
                                    data-stok="{{ $product->stok }}">
                                {{ $product->nama_produk }} - Rp {{ number_format($product->harga_jual, 0, ',', '.') }} (Stok: {{ $product->stok }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jumlah (Qty)</label>
                    <input type="number" id="input_qty" class="form-control" value="1" min="1">
                </div>

                <button type="button" id="btn_tambah" class="btn btn-warning w-100 fw-bold">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Ke Keranjang
                </button>
            </div>
        </div>
    </div>

    <!-- Tabel Detail Belanja & Pembayaran -->
    <div class="col-md-7">
        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf
            <div class="card card-dark">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold"><i class="fa-solid fa-receipt me-1"></i> Detail Nota: {{ $noNota }}</h5>
                    <input type="hidden" name="no_nota" value="{{ $noNota }}">
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" id="table_cart">
                            <thead class="table-warning">
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th width="15%">Qty</th>
                                    <th>Subtotal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="empty_cart">
                                    <td colspan="5" class="text-center text-muted py-4">Keranjang belanja masih kosong.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="row mb-2">
                        <div class="col-6 fw-bold fs-5">Total Harga:</div>
                        <div class="col-6 text-end fw-bold fs-4 text-success" id="text_total">Rp 0</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nominal Uang Bayar (Rp)</label>
                        <input type="number" name="bayar" id="input_bayar" class="form-control form-control-lg" placeholder="0" required min="0">
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 fw-bold">Kembalian:</div>
                        <div class="col-6 text-end fw-bold text-primary fs-5" id="text_kembalian">Rp 0</div>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100 fw-bold" id="btn_simpan" disabled>
                        <i class="fa-solid fa-floppy-disk me-1"></i> Selesaikan & Simpan Transaksi
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
    let cart = [];
    let grandTotal = 0;

    document.getElementById('btn_tambah').addEventListener('click', function() {
        const select = document.getElementById('select_product');
        const selectedOption = select.options[select.selectedIndex];
        
        if (!select.value) {
            alert('Pilih produk buket terlebih dahulu!');
            return;
        }

        const id = select.value;
        const nama = selectedOption.getAttribute('data-nama');
        const harga = parseFloat(selectedOption.getAttribute('data-harga'));
        const stok = parseInt(selectedOption.getAttribute('data-stok'));
        const qty = parseInt(document.getElementById('input_qty').value);

        if (qty <= 0 || isNaN(qty)) {
            alert('Masukkan jumlah qty yang valid!');
            return;
        }

        if (qty > stok) {
            alert('Jumlah melebihi stok yang tersedia (' + stok + ')!');
            return;
        }

        // Cek jika produk sudah ada di keranjang
        const existingIndex = cart.findIndex(item => item.product_id === id);
        if (existingIndex > -1) {
            if (cart[existingIndex].qty + qty > stok) {
                alert('Total qty di keranjang melebihi stok yang tersedia!');
                return;
            }
            cart[existingIndex].qty += qty;
            cart[existingIndex].subtotal = cart[existingIndex].qty * harga;
        } else {
            cart.push({
                product_id: id,
                nama: nama,
                harga: harga,
                qty: qty,
                subtotal: qty * harga
            });
        }

        renderCart();
    });

    function renderCart() {
        const tbody = document.querySelector('#table_cart tbody');
        tbody.innerHTML = '';
        grandTotal = 0;

        if (cart.length === 0) {
            tbody.innerHTML = `<tr id="empty_cart"><td colspan="5" class="text-center text-muted py-4">Keranjang belanja masih kosong.</td></tr>`;
            document.getElementById('btn_simpan').disabled = true;
        } else {
            cart.forEach((item, index) => {
                grandTotal += item.subtotal;
                tbody.innerHTML += `
                    <tr>
                        <td>
                            ${item.nama}
                            <input type="hidden" name="cart[${index}][product_id]" value="${item.product_id}">
                            <input type="hidden" name="cart[${index}][qty]" value="${item.qty}">
                        </td>
                        <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                        <td>${item.qty}</td>
                        <td>Rp ${item.subtotal.toLocaleString('id-ID')}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-danger" onclick="removeItem(${index})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            document.getElementById('btn_simpan').disabled = false;
        }

        document.getElementById('text_total').innerText = 'Rp ' + grandTotal.toLocaleString('id-ID');
        calculateChange();
    }

    function removeItem(index) {
        cart.splice(index, 1);
        renderCart();
    }

    document.getElementById('input_bayar').addEventListener('input', calculateChange);

    function calculateChange() {
        const bayar = parseFloat(document.getElementById('input_bayar').value) || 0;
        const kembalian = bayar - grandTotal;
        const textKembalian = document.getElementById('text_kembalian');

        if (kembalian >= 0 && grandTotal > 0) {
            textKembalian.innerText = 'Rp ' + kembalian.toLocaleString('id-ID');
            textKembalian.className = 'col-6 text-end fw-bold text-success fs-5';
        } else {
            textKembalian.innerText = 'Rp 0';
            textKembalian.className = 'col-6 text-end fw-bold text-danger fs-5';
        }
    }
</script>
@endpush