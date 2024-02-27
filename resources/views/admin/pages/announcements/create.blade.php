@extends('admin.index')
@section('title')
    Blog | Duyurular
@endsection
@section('page-title')
    Yeni Duyuru
@endsection

@section('content')
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Duyuru Başlığı</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Duyuru İçeriği</label>
                <textarea class="form-control" name="content" required></textarea>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Gönder</button>
        </div>

    </form>

@endsection
