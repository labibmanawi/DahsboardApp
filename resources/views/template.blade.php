<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade Template</title>
    <style>
        
        .container {
            display: grid;
            grid-template-columns: 20% 80%;
            grid-gap: 5px;
            background-color: white;
            padding:10px;
        }

        .grid_item {
            background-color: #a209a1;
            padding: 20px;
            text-align: center;
            color:white;
            font-family: sans-serif;
        }

            .grid_item:nth-child(2) {
                text-align: left;
            }

            .grid_item:nth-child(3) {
                background-color: white;
                color: #a209a1;
            }


        .header {
            grid-column: 1 / span 2;
            grid-row: 1;
        }

        .menu_kiri {
            grid-column: 1;
            grid-row: 2;
        }

            .menu_kiri ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }

            .menu_kiri ul li {
                display: flex;
                align-items: center;
                height: 50px; 
                padding-left: 10px; 
                cursor: pointer; 
            }

            .menu_kiri ul li:hover {
                background-color: #c842c7;
            }

            .menu_kiri ul li a {
                text-decoration: none;
                color: white;
                width: 100%;
            }

        .content {
            grid-column: 2;
            grid-row: 2;
        }

        .detail_content {
            animation: zoom 1s;
        }
        
        @keyframes zoom {
			0% {transform: scale(0.0);}
			100% {transform: scale(1.0);}
		}

        .footer {
            grid-column: 1 / span 2;
            grid-row: 3;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="grid_item header">HEADER</div>
        <div class="grid_item menu_kiri">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/product">Product</a></li>
                <li><a href="/detail-product">Detail Product</a></li>
                <li><a href="/checkout">Checkout</a></li>
                <li><a href="/checkout-success">Checkout Success</a></li>
                <li><a href="/cart">Cart</a></li>
            </ul>
        </div>
        <div class="grid_item content">
            <div class="detail_content">
                @yield('content')
            </div>
        </div>
        <div class="grid_item footer">FOOTER - @copywrite by LABIB MANAWI</div>
    </div>
    
</body>
</html>