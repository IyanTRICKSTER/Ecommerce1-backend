@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Barang</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>transaction total</th>
                                    <th>transaction status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td style="text-transform: none">{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->transaction_total }}</td>
                                    <td>
                                        <small>
                                            @if($item->transaction_status == 'PENDING')
                                            <span class="text-white p-2 rounded bagde badge-pending">PENDING</span>

                                            @elseif($item->transaction_status == 'SUCCESS')
                                            <span class="text-white p-2 rounded bagde badge-complete">SUCCESS</span>

                                            @elseif($item->transaction_status == 'FAILED')
                                            <span class="text-white p-2 rounded bagde badge-danger">FAILED</span>
                                            @else
                                            <span></span>
                                            @endif
                                        </small>
                                    </td>
                                    <td>
                                        @if ($item->transaction_status == 'PENDING')
                                        {{-- Kalau status transaksi adalah pending maka bisa di set suksek atau failed  --}}
                                        <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS"
                                            class="btn btn-success btn-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="{{ route('transaction.status', $item->id ) }}?status=FAILED"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        @endif
                                        {{-- MODAL BOOTSTRAP TRANSACTION --}}
                                        <button name="forModal" data-remote="{{ route('transaction.show', $item->id )}}"
                                            data-toggle="modal" data-target="#transactionModal"
                                            data-title="Detail Transaksi {{ $item->uuid }} " type="button"
                                            class="open-modal btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        {{-- EDIT TRANSACTION --}}
                                        <a href="{{ route('transaction.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <li class="fa fa-pencil"></li>
                                        </a>

                                        {{-- DELETE TRANSACTION --}}
                                        <form action="{{ route('transaction.destroy', $item->id) }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">
                                        Data Tidak Tersedia!!
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby=transactionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <div class="d-flex align-items-center">
                    <strong>Loading...</strong>
                    <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                  </div> --}}
            </div>
            <div class="modal-footer d-flex justify-content-center">
                @if (!empty($item))
                {{-- If items exists then render this blok --}}
                <div class="row">
                    <div class="col-md">
                        <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS"
                            class="btn btn-success btn-block">
                            <i class="fa fa-check"></i> Set Sukses
                        </a>
                    </div>
                    <div class="col-md">
                        <a href="{{ route('transaction.status', $item->id) }}?status=FAILED"
                            class="btn btn-danger btn-block">
                            <i class="fa fa-times"></i> Set Gagal
                        </a>
                    </div>
                    <div class="col-md">
                        <a href="{{ route('transaction.status', $item->id) }}?status=PENDING"
                            class="btn btn-warning btn-block">
                            <i class="fa fa-spinner"></i> Set Pending
                        </a>
                    </div>
                    <div class="col-md">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div @endif {{-- <button type="button" class="btn btn-primary">Save changes</button> --}} </div>
            </div>
        </div>
    </div>
    {{-- <button type="button" class="debug-btn btn btn-danger">Debug Button</button> --}}
    @endsection
