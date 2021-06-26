<!DOCTYPE html> <!-- resources\views\overzicht.php -->
<html lang='nl'>
<head> <!-- VIEW -->
    <meta charset='UTF-8'>
    <title>Lampenwinkel</title>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover, .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <form action="" method="get" id="lampen" name="lampen">
        @csrf <!-- bescherming tegen CSRF -->
        <label for="lamp">Product type: </label>
        <select id="lamp" name="lamp" onchange="" required>
            <option value="1">Head Lamp</option>
            <option value="2">Rear Lamp</option>
            <option value="3">Winker</option>
        </select>
        <br>
        <label for="watt">Wattage: </label>
        <input name="watt" id="watt" />
        <br>
        <button onclick="submit()">Show list</button>
    </form>

    <h1>{{ $lamptype[$lamp] }}</h1>

    
    <table>
        @if ($lampen != "[]")
        <tr><th></th><th>Partnr</th><th>Specs</th><th>Price</th></tr>
            @foreach ($lampen as $r)
            <tr>
                    <td> <img src="{{asset('images').'/'.$r->partnr.'.png'}}" alt="{{$r->partnr.'.png'}}"> </td>
                    <td> {{ $r->partnr }} </td>
                    <td> {{ $r->specs }} </td>
                    <td> {{ $r->price }} </td>
                </tr>
            @endforeach
        @else
            <br><?php echo "Helaas, er zijn geen $lamptype[$lamp]'s van $watt W, kies opnieuw."; ?>
        @endif
    </table>
</body>
</html>