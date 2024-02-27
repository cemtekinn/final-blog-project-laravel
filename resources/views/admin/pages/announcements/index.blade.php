@extends('admin.index')
@section('title')
    Blog | Geçmiş Duyurular
@endsection
@section('page-title')
    Geçmiş Duyurular
@endsection

@section('content')
    <div class="card-body">
        @if($announcements->isNotEmpty())
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Duyuru Başlık</th>
                    <th>İçerik</th>
                    <th>Yayınlanma zamanı</th>
                </tr>
                </thead>

                <tbody>
                @foreach($announcements as $announcement)
                    <tr>
                        <td>{{$announcement->name}}</td>
                        <td>{{$announcement->content}}</td>
                        <td>{{$announcement->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button onclick="closeModal()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
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
                <h6 class="text-center red-text">Henüz duyuru göndermediniz <h6>
            </div>

        @endif
    </div>
@endsection
