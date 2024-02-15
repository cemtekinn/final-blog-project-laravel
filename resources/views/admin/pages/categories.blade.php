@extends('admin.index')
@section('title')
    Blog | Kategoriler
@endsection
@section('page-title')
    Kategoriler
@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal"
                        onclick="openModal()">
                    Kategori Ekle
                </button>

                <h3 class="card-title">

                </h3>
            </div>

            <div class="card-body p-0">
                @if($categories->isNotEmpty())
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>İşlemler</th>
                            <th style="width: 40px"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->description ??"Açıklama yok"}}</td>
                                <td>
                                    <button class="btn btn-primary edit-btn"
                                            onclick="editCategory('{{ $category->id }}', '{{ $category->title }}', '{{ $category->description }}')">
                                        Düzenle
                                    </button>

                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Sil
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @else
                    <div class="alert alert-danger" role="alert">
                        <p class="text-center">Herhangi bir kategori bulunmamaktadır.</p>
                    </div>
                @endif
            </div>

        </div>

        {{--     Kategori ekleme modalı  --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori Ekle</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="inputText" class="form-label">Kategori Adı</label>
                                <input type="text" class="form-control" id="inputText" name="title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori Açıklaması</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <button style="float:right" type="submit" class="btn btn-primary">Ekle</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button onclick="closeModal()" type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">Kapat
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{--        Güncelleme modalı--}}
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori Güncelle</h5>
                    </div>
                    <div class="modal-body">
                        <form id="updateCategoryForm" action="{{route("categories.update",$category)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="updateInputText" class="form-label">Kategori Adı</label>
                                <input type="text" class="form-control" id="updateInputText" name="title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori Açıklaması</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <button style="float:right" type="submit" class="btn btn-primary">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function openModal() {
                $('#addModal').modal('show');
            }

            function editCategory(categoryId, categoryTitle, categoryDescription) {
                $('#updateInputText').val(categoryTitle);
                $('#updateCategoryForm textarea[name="description"]').val(categoryDescription);
                $('#updateCategoryForm').attr('action', '{{ route('categories.update', '') }}/' + categoryId);
                $('#updateModal').modal('show');
            }

            function closeModal() {
                $('#addModal').modal('hide');
            }
        </script>

    </div>
@endsection
