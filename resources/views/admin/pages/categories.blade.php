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
            </div>
            <div class="card-body p-0">
                @if($categories->isNotEmpty())
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="">#</th>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="w-50">{{ $category->title }}</td>
                                <td class="w-50">{{ $category->description ??"Açıklama yok"}}</td>
                                <td class="d-flex">
                                    <button class="btn btn-primary edit-btn me-2 d-flex align-items-center me-5 border-3 border-white"
                                            onclick="editCategory('{{ $category->id }}', '{{ $category->title }}', '{{ $category->description }}')">
                                        <i class="fas fa-edit"></i>
                                        Düzenle
                                    </button>

                                    <button id="deleteButton" type="button" class="btn btn-danger d-flex align-items-center  border-3 border-white">
                                        <i class="fas fa-trash-alt"></i> Sil
                                    </button>
                                    <form id="deleteForm" action="{{ route('categories.destroy', $category) }}"
                                          method="post" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

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




        <script>
            document.getElementById('deleteButton').addEventListener('click', function () {
                document.getElementById('deleteForm').submit();
            });


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
