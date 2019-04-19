<table border="1">
    <thead>
        <tr>
            <td>id</td>
            <td>Nome</td>
            <td>Details</td>
            <td>Description</td>
            <td>qtd last</td>
            <td>weight</td>
            <td>width</td>
            <td>height</td>
            <td>category_id</td>
            <td>pagamento</td>
            <td>criado</td>
            <td>atualizado</td>
            <td align="center">opções</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->details }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->qtd_last }}</td>
                <td>{{ $product->weight }}</td>
                <td>{{ $product->width }}</td>
                <td>{{ $product->height }}</td>
                <td>{{ $product->category_id }}</td>
                <td>{{ $product->payment_method_id }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td><a href="">Editar</a> &nbsp; <a href="">Apagar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>