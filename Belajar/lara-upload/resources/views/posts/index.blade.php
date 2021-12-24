@extends('posts.layout')
@section('content')
<div id="main">
    <div class="page-heading">
        <section class="section">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <div class="col-4">
                                    <h4>Daftar Postingan</h4>
                                </div>
                                <div class="col-8">
                                    <a href="{{ route('posts.create') }}" class="btn btn-success float-end">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table p-1">
                               
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ \Str::limit($value->content, 100) }}</td>
                                        <td>
                                            <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                                                <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>    
                                                <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                                                @csrf
                                                @method('DELETE')      
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table> 
                                {!! $data->links() !!}       
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

</div>

@endsection