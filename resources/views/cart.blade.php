@extends('layouts.front')

@section('content')
    <div class="col-12">
        <h2>Carrinho de compras</h2>
        <hr>
    </div>

    <div class="col-12">
        @if ($cart)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $total = 0;
                    $line = 0;
                @endphp

                @foreach ($cart as $c)
                    <tr>
                        <td>{{$c['name']}}</td>
                        <td>R$ {{number_format(($c['price'] * $c['amount']), 2, ',', '.')}}</td>
                        <td>{{$c['amount']}}</td>
                        @php
                            $subtotal = $c['price'] * $c['amount'];
                            $total += $subtotal;
                        @endphp
                        <td>R$ {{number_format(($subtotal), 2, ',', '.')}}</td>
                        <td>
                            <a href="{{route('cart.remove',  $line)}}" class="btn btn-sm btn-danger">REMOVER</a>
                        </td>
                    </tr>
                    
                    @php
                        $line++;
                    @endphp

                @endforeach

                <tr>
                    <td colspan="3">Total</td>
                    <td colspan="2">R$ {{number_format($total, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
        @else
            <div class="alert alert-warning">Carrinho vazio</div>
        @endif
    </div>
@endsection