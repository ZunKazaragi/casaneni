@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h4> Transaksi </h4>
                        </div>
                        <div class="col-12 col-md-5">
                            <a href="{{ route('transaction.create') }}" class=" btn btn-sm btn-primary">Buat Baru</a>
                        </div>
                    </div>

                </div>

                <div class="card-body" style="overflow-x: scroll">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode</th>
                            <th>Harga Asli</th>
                            <th>Harga Jual</th>
                            <th>Selisih</th>
                            <th>Modal</th>
                            <th>Profit</th>
                        </tr>
                        @foreach ($transaction as $t)
                        <tr>
                            <td>{{$t->created_at->format("d/m/Y")}}</td>
                            <td>{{$t->code}}</td>
                            <td>Rp. {{ number_format($t->vendor_price, 0, ',', '.')}}</td>
                            <td>Rp. {{ number_format($t->sell_price), 0, '.', '.'}}</td>
                            <td>Rp. {{ number_format($t->difference), 0, ',', '.'}}</td>
                            <td>Rp. {{ number_format($t->balance), 0, ',', '.'}}</td>
                            <td>Rp. {{ number_format($t->profit), 0, ',', '.'}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
