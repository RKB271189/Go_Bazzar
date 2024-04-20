<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
        }

        .code {
            display: inline-block;
            padding: 10px;
            background-color: #3498db;
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            border-radius: 4px;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contacted from portfolio</h1>
        <p>Hi,</p>
        <p>My name is {{$content['name']}}</p>
        @if(array_key_exists('email',$content))
            <p>My email address is {{$content['email']}}</p>
        @endif
        @if(array_key_exists('message',$content))
            <p>{{$content['message']}}</p>        
        @endif
        <footer>
            
        </footer>
    </div>
</body>

</html>