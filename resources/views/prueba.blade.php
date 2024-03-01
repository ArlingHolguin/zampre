<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            border: none;
            outline: none;
        }
        html{
            background: rgb(216, 216, 216);
        }

        body {
            background: #ffffff;
            
            width: 612px;
            height: 792px;
            margin: auto;
        }
        #logo{
            width: 20%;
            background: #000;
        }

        #fecha{

        }


        

    </style>
    <title>Pdf</title>
</head>

<body>
    <header>
        <div>
            <div id="logo">Logo</div>
            <div id="fecha">fecha</div>
            <div class="visible-print text-center">
                {!! QrCode::size(200)->generate(Request::url()); !!}
                <p>Scan me to return to the original page.</p>
            </div>
        </div>
    </header>
    <div style="display: flex">
        <div style="flex: none, width: 3.5rem; heigth: 3.5rem;">
          01
        </div>
        <div style="flex: none">
          02
        </div>
        <div style="flex: 1 1 0%">
          03adad
        </div>
      </div>

      <div class="flex flex-row-reverse space-x-4 space-x-reverse ...">
        <div>01</div>
        <div>02</div>
        <div>03</div>
      </div>
</body>

</html>
