@extends('layout.template')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<main>
  <div class="popular-items section-padding halaman-keranjang">
    <div class="container">

      <!-- Section Title -->
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <div class="section-tittle text-center mt-100">
            <h1 class="judul-produk"><span>Keranjang Saya</span></h1>
            @if($pesananData)
                <div class="alert alert-info">
                    Kamu memiliki pesanan yang belum dibayar. Silakan selesaikan terlebih dahulu sebelum checkout produk baru.
                </div>
            @endif
          </div>
        </div>
      </div>

      @if($grouped->isEmpty())
      <div class="text-center py-5">
        <img src="{{ asset('assets/img/empty-cart.png') }}" alt="Keranjang Kosong" style="width: 150px; opacity: 0.7;">
        <h4 class="mt-3" style="color: #777;">Keranjang kamu masih kosong</h4>
      </div>
      @endif

      @foreach($grouped as $namaToko => $items)
      <div class="cart-toko" style="background: #f9fafd; padding: 20px; border-radius: 10px; margin-bottom: 30px;">
        <h5 style="font-weight: 600; color: #333;">Toko: {{ $namaToko }}</h5>
        
          @php $totalPerToko = 0; @endphp

          @foreach($items as $item)
            @php
              $keranjang_id = $item->id;
              $produk = $item->produk;
              $subtotal = $produk->harga * $item->amount;
              $totalPerToko += $subtotal;
            @endphp

            <div class="produk-item d-flex align-items-center bg-white rounded shadow-sm p-3 mb-3">
              <input type="checkbox" class="form-check-input me-3 checkbox-produk" data-harga="{{ $subtotal }}" data-keranjang="{{ $keranjang_id }}" style="width: 20px; height: 20px;" {{ !$item->is_in_pesanan && $adaPesananTertunda ? 'disabled' : '' }} {{ $item->is_in_pesanan === true ? 'checked' : '' }}>
              <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Produk" style="width: 120px; height: 100px; object-fit: cover; border-radius: 8px;">
              <div class="ms-3 flex-grow-1">
                <h6 style="font-weight: 600; margin-bottom: 5px; font-size: 24px;">{{ $produk->nama_produk }}</h6>
                <p style="font-weight: 700; color: #548c9a;">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
              </div>
              <div style="width: 80px; text-align: center;">
                <input type="number" value="{{ $item->amount }}" min="1" style="width: 60px; text-align: center;" readonly>
              </div>
              <div style="width: 120px; text-align: right; font-weight: 700; color: #333;">
                Rp. {{ number_format($subtotal, 0, ',', '.') }}
              </div>
              <div style="width: 50px; text-align: center;">
                @if(!$item->is_in_pesanan)
                  <form action="{{ route('hapus.keranjang', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
                  </form>
                @endif
              </div>
            </div>
          @endforeach
        <!-- <div class="d-flex justify-content-end align-items-center" style="font-weight: 700; font-size: 16px; color: #0f8c56;">
          Total : Rp. {{ number_format($totalPerToko, 0, ',', '.') }}
        </div> -->
      </div>
      @endforeach

      @if(!$grouped->isEmpty())
      <hr class="my-4">

      <div class="d-flex justify-content-end align-items-center mb-3" style="font-weight: 700; font-size: 18px; color: #0f8c56;">
        Total Harga : <span id="totalHarga" class="ms-2">Rp. 0</span>
      </div>

      <div class="d-flex justify-content-center gap-4 mt-2">
        <a href="{{ route('pembeli.home') }}" class="btn btn-secondary px-4 py-2" style="border-radius: 6px;">Kembali Berbelanja</a>
        <a href="#" id="btnCheckout" class="btn btn-keranjang px-4 py-2 disabled" style="border-radius: 6px; pointer-events: none;">Selesaikan Pesanan</a>
      </div>
      @else
      <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('pembeli.home') }}" class="btn btn-keranjang px-4 py-2" style="border-radius: 6px;">Belanja Sekarang</a>
      </div>
      @endif

    </div>
  </div>
</main>

<!-- Script perhitungan total harga -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.checkbox-produk');
    const totalHargaEl = document.getElementById('totalHarga');
    const btnCheckout = document.getElementById('btnCheckout');

    let initialChecked = [];
    let initialTotal = 0;

    function getCurrentState() {
      const checkedIds = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.getAttribute('data-keranjang'));

      const total = checkedIds.reduce((sum, id) => {
        const cb = Array.from(checkboxes).find(cb => cb.getAttribute('data-keranjang') === id);
        return sum + parseInt(cb.dataset.harga || 0);
      }, 0);

      return { checkedIds, total };
    }

    function updateTotal() {
      const { total } = getCurrentState();
      const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;

      totalHargaEl.textContent = "Rp. " + total.toLocaleString('id-ID');

      if (checkedCount > 0) {
        btnCheckout.classList.remove('disabled');
        btnCheckout.style.pointerEvents = 'auto';
      } else {
        btnCheckout.classList.add('disabled');
        btnCheckout.style.pointerEvents = 'none';
      }
    }

    const { checkedIds: initIds, total: initTotal } = getCurrentState();
    initialChecked = initIds;
    initialTotal = initTotal;

    checkboxes.forEach(cb => {
      cb.addEventListener('change', updateTotal);
    });

    btnCheckout.addEventListener('click', function (e) {
      e.preventDefault();

      const { checkedIds: selectedIds, total: currentTotal } = getCurrentState();

      const sameLength = selectedIds.length === initialChecked.length;
      const sameItems = sameLength && selectedIds.every(id => initialChecked.includes(id));
      const sameTotal = currentTotal === initialTotal;

      if (sameItems && sameTotal) {
        // console.log("Tidak ada perubahan, hanya redirect.");
        window.location.href = '/checkout';
        return;
      }

      Swal.fire({
        title: 'Konfirmasi Pemesanan',
        text: 'Anda harus menyelesaikan pembayaran terlebih dahulu sebelum pesanan diproses oleh sistem. Lanjutkan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, lanjutkan',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (!result.isConfirmed) return;

        const now = new Date();
        const kodeTransaksi = `TRF-${String(now.getDate()).padStart(2, '0')}${String(now.getMonth() + 1).padStart(2, '0')}${now.getFullYear()}${Math.floor(100 + Math.random() * 900)}`;

        const formData = new FormData();
        formData.append("total_harga", currentTotal);
        formData.append("kode_transaksi", kodeTransaksi);

        selectedIds.forEach((id, index) => {
          formData.append(`keranjang_id[${index}]`, id);
        });

        Swal.fire({
          title: 'Memproses...',
          text: 'Silakan tunggu sebentar.',
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });

        fetch('/checkout/store', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: formData,
          })
          .then(response => {
            if (!response.ok) throw new Error('Gagal Mengirim Data');
            return response.json();
          })
          .then(data => {
            window.location.href = '/checkout';
          })
          .catch(error => {
            console.error('Error:', error);
            Swal.fire('Gagal', 'Terjadi kesalahan saat memproses checkout.', 'error');
          });
      });
    });
    
    updateTotal(); // Jalankan di akhir agar tombol aktif sesuai state
  });
</script>

@endsection
