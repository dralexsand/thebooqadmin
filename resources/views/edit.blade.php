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
                        
                        @if(isset($article))
                            
                            <form action="/store" method="post">
                                @csrf
                                
                                <input name="_id" type="hidden" value="{{ $article['_id'] }}">
                                <input name="article_id" type="hidden" value="{{ $article['article_id'] }}">
                                <input name="isnew" type="hidden" value="{{ $article['isnew'] }}">
                                <input name="created" type="hidden" value="{{ $article['created'] }}">
                                
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" class="form-control" id="title" value="{{ $article['title'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Example textarea</label>
                                    <textarea name="content" class="form-control" id="content" rows="3">
                                        {{ $article['content'] }}
                                    </textarea>
                                </div>
                                
                                <button style="width: 150px;" class="btn btn-primary" type="submit">Post</button>
                            
                            </form>
                            
                            <a href="/delete_article/{{ $article['_id'] }}" style="width: 150px;" class="btn btn-danger"
                               type="submit">Delete
                            </a>
                            
                            
                            {{--{
                            "article_id": 2,
                            "tag": "black_sabbath",
                            "title": "Black Sabbath",
                            "content": "                            <p>                            Black Sabbath were an English rock band formed in Birmingham in 1968 by guitarist Tony Iommi, drummer Bill Ward, bassist Geezer Butler and vocalist Ozzy Osbourne. They are often cited as pioneers of heavy metal music.[1] The band helped define the genre with releases such as Black Sabbath (1970), Paranoid (1970), and Master of Reality (1971). The                      </p>\r\n                        ",
                            "type": "article",
                            "created": {
                            "$date": "2020-07-24T19:03:18.000Z"
                            },
                            "user_id": 7,
                            "indb": 0,
                            "isnew": 0,
                            "__v": 0
                            }   --}}
                        
                        @endif
                    
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; ThBooq.Admin
                        2020 @php if(date('Y')!='2020') echo "-". date('Y')  @endphp</div>
                    <div>
                        <a href="/">ThBooq.Admin</a>
                        &middot;
                        <a href=/">Terms</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
