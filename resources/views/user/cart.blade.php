@extends('layouts.default')

@section('title', 'Carrinho')

@section('content')
    {{ debug(Cart::content())  }}
@endsection

@section('scripts')
    <script>
        function delete(){
            rowId = document.getElementById('rowId').value;
            
            $rowId = "<script language=javascript>document.write(rowId);</script>";

            return <?php Cart::remove($rowId); ?>
        }

        function changeQty(){
            qty = document.getElementById('qty').value;
            rowId = document.getElementById('rowId').value;

            $rowId = "<script language=javascript>document.write(rowId);</script>";
            $qty = "<script language=javascript>document.write(qty);</script>";

            return <?php Cart::update($rowId, $qty); ?>
        }
    </script>
@endsection