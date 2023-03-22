<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Reporte de Pedido N° {{$pedido->id}}</title>
</head>
<body>
    <div class="w3-container">
        <div class="w3-row w3-center w3-panel">
            <div class="w3-monospace w3-text-orange w3-xlarge"><b>Tienda Don Pepe</b></div>
        </div>
        <div class="w3-row w3-margin-top" style="margin-top: 5px">
            <div class="title"><b>Pedido N°: {{$pedido->id}}</b></div>
        </div>
        <div class="w3-row" style="margin-top: 8px">
            <div class="w3-col s3">
                <div class="txt-info"><b>Nombre: </b></div>
            </div>
            <div class="w3-col s3">
                <div class="txt-info">{{$pedido->user->name}}</div>
            </div>
            <div class="w3-col s3">
                <div class="txt-info"><b>Dirección: </b></div>
            </div>
            <div class="w3-col s3">
                <div class="txt-info">{{$user->calle}}, #{{$user->numero}}, {{$user->distrito}},{{$user->regione->name}}</div>
            </div>
        </div>
        <div class="w3-row" style="margin-top: 8px">
            <div class="w3-col s3">
                <div class="txt-info"><b>Fecha de envio: </b></div>
            </div>
            <div class="w3-col s3">
                <div class="txt">{{$pedido->fechaEnvio}} (Aprox.)</div>                
            </div>
            <div class="w3-col s3">
                <div class="txt-info"><b>Fecha de Entrega: </b></div>
            </div>
            <div class="w3-col s3">
                <div class="txt">{{$pedido->fechaEntrega}} (Aprox.)</div>                
            </div>
        </div>
        <div class="w3-row" style="margin-top: 8px">
            <div class="w3-col s3">
                <div class="txt-info"><b>Estado del Pedido: </b></div>
            </div>
            <div class="w3-col s3">
                <div class="txt">{{$pedido->estadopedido->estado}} </div>
            </div>
        </div>
        @php
            $total = 0;
        @endphp
        <table class="w3-table w3-striped w3-border w3-center" style="margin-top: 15px">
            <thead>
                <tr class="w3-orange">
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{$producto->producto_id}}</td>
                        <td>{{$producto->name}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>S/. {{$producto->precio * $producto->cantidad}}</td>
                        @php
                            $total = $total + ($producto->precio*$producto->cantidad);
                        @endphp
                    </tr>                
                @endforeach
                    <tr>
                        <td colspan="3">Total</td>
                        <td>S/. {{$total}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>