<?php
    
    namespace App\Http\Controllers;
    
    use App\Http\Services\API;
    use App\Http\Services\Helper;
    
    class SiteController extends Controller
    {
        
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            return view('home' );
        }
        
        public function new_tags()
        {
            $tags = [];
            
            return view('new_tags', [
                'tags' => $tags
            ]);
        }
        
        public function updated_tags()
        {
            $tags = [];
            
            return view('updated_tags', [
                'tags' => $tags
            ]);
        }
        
        public function new_articles()
        {
            $api = new API();
            $articles = $api->apiGetAllNewArticles();
            
            return view('new_articles', [
                'articles' => $articles
            ]);
        }
        
        public function store()
        {
            $api = new API();
            
            $post = $_POST;
            
            if ($post['isnew'] == 1) {
                
                $redirect_url = 'new_articles';
                
                $post['tag'] = Helper::convertToTag($post['title']);
                $post['type'] = "article";
                $post['modified'] = date('Y-m-d H:i:s');
                $post['user_id'] = $_SERVER['REMOTE_ADDR'];
                $post['indb'] = 1;
                $post['isnew'] = 0;
                
                $save = $api->apiPostUpdatedArticleByArticleId($post);
                $save = $api->apiPostArticle($post);
                
            } else {
                
                $redirect_url = 'updated_articles';
                
                $post['tag'] = Helper::convertToTag($post['title']);
                $post['type'] = "article";
                $post['modified'] = date('Y-m-d H:i:s');
                $post['user_id'] = $_SERVER['REMOTE_ADDR'];
                $post['indb'] = 1;
                $post['isnew'] = 0;
                
                $save = $api->apiPostUpdatedArticleByArticleId($post);
                $save = $api->apiPostArticleByArticleId($post);
            }
            
            // $articles = $api->apiGetAllUpdatedArticles();
            
            return redirect($redirect_url);
            
            /*return view($redirect_url, [
                'articles' => $articles
            ]);*/
        }
        
        public function delete_article($objectId)
        {
            $api = new API(); //
            //$post = $_POST;
            //$objectId = $post['_id'];
            $article_delete = $api->apiGetDeleteArticleByArticleId($objectId);
            
            //$articles = $api->apiGetAllUpdatedArticles();
            
            $redirect = 'updated_articles';
            return redirect($redirect);
            
            /*return view('updated_articles', [
                'articles' => $articles
            ]);*/
        }
        
        public function updated_articles()
        {
            $api = new API();
            $articles = $api->apiGetAllUpdatedArticles();
            
            return view('updated_articles', [
                'articles' => $articles
            ]);
        }
        
        public function editarticle($id)
        {
            $api = new API();
            $article = $api->apiSearchArticleByTagInModified($id);
            
            return view('edit', [
                'article' => $article
            ]);
        }
        
        
    }
