<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Program Studi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Program Studi</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('progdi.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('progdi.update', $progdi->id_progdi) }}" method="POST" enctype="multipart/formdata">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Fakultas:</strong>
                        <input type="text" name="nm_fakultas" value="{{ $progdi->nm_fakultas }}" class="form-control"
                            placeholder="Nama Kelas">
                        @error('nm_fakultas')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Program Studi:</strong>
                        <input type="text" name="nm_progdi" value="{{ $progdi->nm_progdi }}" class="form-control"
                            placeholder="Nama Program Studi">
                        @error('nm_progdi')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
