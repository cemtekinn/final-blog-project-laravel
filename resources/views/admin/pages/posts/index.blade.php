@extends("admin.index")

@section("title") Panel | Bloglar @endsection
@section("page-title") Yazılar @endsection

@section("content")
    <div class="card-body">
        @if($posts->isNotEmpty())
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Tahmini okuma süresi</th>
                    <th>Yayınlanma zamanı</th>
                    <th>Son güncelleme</th>
                    <th>İşlemler</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>
                            @foreach($post->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </td>

                        <td>
                            @php
                                $wordCount = str_word_count(strip_tags($post->content));
                                $readTimeMinutes = ceil($wordCount / 200);
                                $readTimeFormatted = $readTimeMinutes > 1 ? 'Yaklaşık ' . $readTimeMinutes . ' dakika' : '1 dakikadan az';
                                echo $readTimeFormatted;
                            @endphp
                        </td>
                        <td>{{ date('H:i d.m.Y ', strtotime($post->created_at)) }}</td>
                        <td>{{ date('H:i d.m.Y ', strtotime($post->updated_at)) }}</td>

                        <td>
                            <div class="btn-group" role="group" >
                                <a type="button" onclick="openModal('{{ $post->title }}', '{{ $post->content }}')" class="btn btn-success">
                                    <i class="nav-icon fas fa-book"></i> OKU
                                </a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a href="{{ route('posts.edit',$post)}}" class="dropdown-item">
                                            <i class="nav-icon fas fa-edit"></i> Düzenle
                                        </a>

                                        <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy',$post)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <a href="#" class="dropdown-item btn btn-danger btn-sm" onclick="event.preventDefault(); deletePost({{ $post->id}});">
                                            <i class="nav-icon fas fa-trash"></i> Sil
                                        </a>

                                        <script>
                                            function deletePost(postId) {
                                                if (confirm('Gönderiyi silmek istediğinize emin misiniz?')) {
                                                    document.getElementById('delete-form-' + postId).submit();
                                                }
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div>
                        </td>

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
                <h6 class="text-center red-text">Henüz yazı yayınlamadınız</h6>
            </div>

        @endif
    </div>

@endsection
