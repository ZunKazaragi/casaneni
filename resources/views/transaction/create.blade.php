@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transaksi</div>

                <div class="card-body row justify-content-center">
                    <form action="{{ route('transaction.store') }}" method="post" class="col-12 col-md-">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="code">Kode Pulsa</label>
                            <input type="text" class="form-control" name="code" id="code">
                        </div>
                        <div class="form-group mb-2">
                            <label for="vendor_price">Harga Vendor</label>
                            <input type="number" min="0" class="form-control" name="vendor_price" id="vendor_price">
                        </div>
                        <div class="form-group mb-2">
                            <label for="sell_price">Harga Jual</label>
                            <input type="number" min="0" class="form-control" name="sell_price" id="sell_price">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
