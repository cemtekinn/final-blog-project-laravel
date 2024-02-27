@extends('admin.index')
@section("title")
    Blog | Yaz
@endsection
@section("page-title")
    Blog Yaz
@endsection

@section("content")
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Blog Başlığı</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kısa açıklama</label>
                <input type="text" class="form-control" name="description" required>
            </div>

            <div class="form-group">
                <label for="categorySelect">Kategori Seçiniz</label>
                <select class="form-control" id="categorySelect" name="categories[]" multiple required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            @if($tags->isNotEmpty())
                <div class="form-group">
                    <label>Etiket Seçiniz</label>
                    <select class="form-control" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="form-group">
                <label>İçerik</label>
                <textarea name="content" type="text" class="form-control" style="height: 300px;" required></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Kapak Resmi</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Paylaş</button>
        </div>


    </form>
@endsection
