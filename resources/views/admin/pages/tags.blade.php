@extends('admin.index')
@section('title')
    Blog | Etiketler
@endsection
@section('page-title')
    Etiketler
@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-warning" style="float:right" data-toggle="modal"
                        onclick="openModal()">
                    Etiket Ekle
                </button>
            </div>

            <div class="card-body p-0">
                @if($tags->isNotEmpty())
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Başlık</th>
                            <th style="float:right">İşlemler</th>
                        </tr>

                        </thead>
                        <tbody>

                        @foreach($tags as $index => $tag)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tag->title }}</td>
                                <td style="float:right">
                                    <button class="btn btn-primary edit-btn"
                                            onclick="editTag('{{ $tag->id }}', '{{ $tag->title }}')">
                                        Düzenle
                                    </button>

                                    <button id="deleteButton" type="button" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Sil
                                    </button>

                                    <form id="deleteForm" action="{{ route('tags.destroy', $tag) }}"
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
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Etiket Güncelle</h5>
                                </div>
                                <div class="modal-body">
                                    <form id="updateTagForm" action="{{route("tags.update",$tag)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="updateInputText" class="form-label">Etiket Adı</label>
                                            <input type="text" class="form-control" id="updateInputText"
                                                   name="title">
                                        </div>
                                        <button style="float:right" type="submit" class="btn btn-primary">Güncelle
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <p class="text-center">Herhangi bir etiket bulunmamaktadır.</p>
                    </div>
                @endif
            </div>

        </div>


        {{--     Etiket ekleme modalı  --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Etiket Ekle</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tags.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="inputText" class="form-label">Etiket Adı</label>
                                <input type="text" class="form-control" id="inputText" name="title">
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

            function editTag(tagId, tagTitle) {
                $('#updateInputText').val(tagTitle);
                $('#updateTagForm').attr('action', '{{ route('tags.update', '') }}/' + tagId);
                $('#updateModal').modal('show');
            }

            function closeModal() {
                $('#addModal').modal('hide');
            }
        </script>

    </div>

@endsection
