@extends('layouts.app')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">updated_arcticles</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Updated articles</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        Published articles, updated
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Tag</th>
                                    <th>Created</th>
                                </tr>
                                </thead>
                                
                                @if($articles)
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Tag</th>
                                        <th>Created</th>
                                    </tr>
                                    </tfoot>
                                    
                                    <tbody>
                                    
                                    @foreach($articles as $article)
                                        
                                        <tr>
                                            <td>
                                                <a href="/editarticle/{{ $article['_id'] }}">
                                                    {{ $article['title'] }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/editarticle/{{ $article['_id'] }}">
                                                    {{ $article['tag'] }}
                                                </a>
                                            </td>
                                            <td>{{ $article['created'] }}</td>
                                        </tr>
                                    
                                    @endforeach
                                    
                                    </tbody>
                                
                                @endif
                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
