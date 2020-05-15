@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="http://127.0.0.1:5000/kirim" method="POST" enctype="multipart/form-data">


                        <div class="preview"></div>
                         <div class="progress" style="display:none">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0"
                          aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            0%
                          </div>
                        </div>
        
        
                        <input type="file" name="file" class="form-control" />
                        <button class="btn btn-primary upload-image">Upload</button>
        
                        
                    </form>
                </div>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama File</th>
                            <th>Link</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil as $item)
                            <tr>
                                <td>{{$item->file}}</td>
                                <td><a href="/hasil/{{$item->file}}" class="btn btn-primary">Download</a></td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                                <th>Nama File</th>
                                <th>Link</th>
                                <th>Tanggal</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
