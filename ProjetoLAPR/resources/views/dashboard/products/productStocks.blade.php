<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Allegro | Stocks</title>
    <style>
        #pro {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pro td, #pro th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #pro tr:nth-child(even) {
            background-color: lightgray;
        }

        #pro th {
            padding-bottom: 12px;
            padding-top: 12px;
            text-align: left;
            background-color: gray;
        }
    </style>
</head>
<body>
<div>
    <main>
        <table id="pro">
            <tr>
            <th>Product id</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Type</th>
            <th>Brand</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['stock']}}</td>
                    <td>{{$product['price']}}</td>
                    <td>{{$product['type']}}</td>
                    <td>{{$product['brand']}}</td>
                </tr>
            @endforeach
        </table>
    </main>
</div>
</body>
</html>


