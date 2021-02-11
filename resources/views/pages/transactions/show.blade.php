<!-- Button trigger modal -->
<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $items->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td style="text-transform: lowercase">{{ $items->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $items->phone }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $items->address }}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>{{ $items->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{ $items->transaction_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach ($items->transaction_details as $detail)
                <tr>
                    <td>{{ $detail->product_ordered->name }}</td>
                    <td>{{ $detail->product_ordered->type }}</td>
                    <td>{{ $detail->product_ordered->price }}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
