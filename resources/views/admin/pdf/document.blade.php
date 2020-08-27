<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Participant </title>
    <link rel="stylesheet" href="{{ asset('/assets/backend/adminlte30/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
<body>
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Participant ddd</h4>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered tablestriped">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NIK</th>
                        <th scope="col">QRCODE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $no => $participant)
                    <tr>
                        <th scope="row" style="text-align: center">{{ ++$no }}</th>
                        <td>{{ $participant->name }} </td>
                        <td>{{ $participant->nik }}</td>
                        {{-- <td>{!! QrCode::generate($participant->nik); !!}</td> --}}
                        <td><img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) }} "></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="card-footer">
            {{-- Footer --}}
        </div>
    </div>
</body>
</html>
