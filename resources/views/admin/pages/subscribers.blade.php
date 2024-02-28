@extends('admin.index')
@section('title')
    Blog | Bülten
@endsection
@section('page-title')
    Bültene Kayıtlı Kullanıcılar
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" onclick="openModal()">
                Bültene Ekle
            </button>
        </div>
        <div class="card-body">
            @if($subscribers->isNotEmpty())
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Eposta</th>
                        <th>Bültene Kayıt Olma Zamanı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <td>{{$subscriber->email}}</td>
                            <td>{{$subscriber->created_at}}</td>
                            <td>
                                <button id="deleteButton" type="button"
                                        class="btn btn-danger d-flex align-items-center  border-3 border-white">
                                    <i class="fas fa-trash-alt"></i> Sil
                                </button>
                                <form id="deleteForm" action="{{ route('subscribers.destroy', $subscriber) }}"
                                      method="post" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <button onclick="closeModal()" type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">
                                    Kapat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function openModal(title, body) {
                        $('#viewModal .modal-title').text(title);
                        $('#viewModal .modal-body p').text(body);
                        $('#viewModal').modal('show');
                    }

                    function closeModal() {
                        $('#viewModal').modal('hide');
                    }
                </script>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            @else
                <style>
                    .message-box {
                        border: 2px solid #dc3545;
                        border-radius: 8px;
                        padding: 20px;
                        background-color: #fff;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    }

                    .text-center {
                        text-align: center;
                    }

                    .red-text {
                        color: red;
                    }
                </style>

                <div class="message-box">
                    <h6 class="text-center red-text">Bültene kimse kayıtlı değil<h6>
                </div>

            @endif
        </div>

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bültene Ekle</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('subscribers.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="inputText" class="form-label">Eposta </label>
                                <input type="text" class="form-control" id="inputText" name="email">
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

            function closeModal() {
                $('#addModal').modal('hide');
            }
        </script>
    </div>
@endsection
