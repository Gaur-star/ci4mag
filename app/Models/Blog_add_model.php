<?php
namespace App\Models;

use CodeIgniter\Model;

use function PHPSTORM_META\type;

class Blog_add_model extends Model
{
    protected $table = "posts";
    public $session;
    public $db;
    public function __construct()
    {
        parent::__construct();
        $this->session = session();
        $this->db = db_connect();
    }
    public function insert_data($postData)
    {
        if (isset($postData['follow'])) {
            $follow = 'd';
        } else {
            $follow = 'n';
        }
        // print_r($_POST); die;
        $active = 'y';
        if ($postData['visibility'] == 'Only me') {
            $active = 'o';
        }
        $fname = $postData['upload_data']['file_name'];
        $path = base_url() . 'assets/blog-image/' . $fname;
        $sql =
            "INSERT INTO `posts` ( `categorie`,`title`, `content`, `author`, `visibility`, `date_`, `time_`, `keyword`, `seo_url`,`image`,`meta_tag`, `meta_desc`,`active`,`follow`) VALUES ( '" .
            $postData['all_categorie'] .
            "','" .
            $postData['title'] .
            "', '" .
            $postData['content'] .
            "', '" .
            $postData['author'] .
            "', '" .
            $postData['visibility'] .
            "', '" .
            $postData['date_'] .
            "', '" .
            $postData['time_'] .
            "', '" .
            $postData['all_keyword'] .
            "', '" .
            $postData['sugest_title'] .
            "','" .
            $path .
            "', '" .
            $postData['meta_tag'] .
            "', '" .
            $postData['meta_desc'] .
            "','" .
            $active .
            "','" .
            $follow .
            "')";
        $db = db_connect();    
        $db->query($sql);
        return $db->insertId();
    }

    public function insert_data_without_image($postData)
    {
        if (isset($postData['follow'])) {
            $follow = 'd';
        } else {
            $follow = 'n';
        }

        $active = 'y';
        if ($postData['visibility'] == 'Only me') {
            $active = 'o';
        }
        if (strlen($postData['preview_id']) > 0) {
            //$sql = "UPDATE `posts` SET `title` = '".$postData['title']."'  WHERE `id` =".$postData['preview_id']."";

            $sql =
                "UPDATE `posts` SET `categorie` = '" .
                $postData['all_categorie'] .
                "',`keyword` = '" .
                $postData['all_keyword'] .
                "',`title` = '" .
                $postData['title'] .
                "',`seo_url` = '" .
                $postData['sugest_title'] .
                "',`content` = '" .
                $postData['content'] .
                "',`author` = '" .
                $postData['author'] .
                "',`visibility` = '" .
                $postData['visibility'] .
                "',`date_` = '" .
                $postData['date_'] .
                "',`time_` = '" .
                $postData['time_'] .
                "',meta_tag='" .
                $postData['meta_tag'] .
                "',meta_desc='" .
                $postData['meta_desc'] .
                "',active='" .
                $active .
                "', follow='" .
                $follow .
                "'  WHERE `id` =" .
                $postData['preview_id'] .
                '';
            $this->db->query($sql);
            return $postData['preview_id'];
        } else {
            $sql =
                "INSERT INTO `posts` ( categorie,`title`, `content`, author, visibility, `date_`, `time_`, keyword, seo_url,meta_tag, meta_desc,active,follow) VALUES ( '" .
                $postData['all_categorie'] .
                "','" .
                $postData['title'] .
                "', '" .
                $postData['content'] .
                "', '" .
                $postData['author'] .
                "', '" .
                $postData['visibility'] .
                "', '" .
                $postData['date_'] .
                "', '" .
                $postData['time_'] .
                "', '" .
                $postData['all_keyword'] .
                "', '" .
                $postData['sugest_title'] .
                "', '" .
                $postData['meta_tag'] .
                "', '" .
                $postData['meta_desc'] .
                "','" .
                $active .
                "','" .
                $follow .
                "')";
            $db = db_connect();    
            $db->query($sql);
            return $db->insertId();
        }

        ///////////////////////////////////////
        //}
    }
    public function add_categorie($postData)
    {
        echo $str = $postData['all_categorie'];
        echo $str1 = $postData['all_categorie_id'];
        $a = explode(',', $str);
        $a1 = explode(',', $str1);
        if (strlen($postData['preview_id']) > 0) {
            $sql =
                'DELETE FROM `post_categories` WHERE `post_id` = ' .
                $postData['preview_id'] .
                '';
            $this->db->query($sql);
            for ($i = 0; $i < count($a) - 1; $i++) {
                echo $sql =
                    "INSERT INTO `post_categories` ( post_id,categories,categorie_id) VALUE ( '" .
                    $postData['preview_id'] .
                    "','" .
                    $a[$i] .
                    "','" .
                    $a1[$i] .
                    "')";
                $this->db->query($sql);
            }
        } else {
            for ($i = 0; $i < count($a) - 1; $i++) {
                echo $sql =
                    "INSERT INTO `post_categories` ( post_id,categories,categorie_id) VALUE ( '" .
                    $postData['id'] .
                    "','" .
                    $a[$i] .
                    "','" .
                    $a1[$i] .
                    "')";
                $this->db->query($sql);
            }
        }
    }
    public function add_keyword($postData)
    {
        $str = $postData['all_keyword'];
        $a = explode(',', $str);
        if (strlen($postData['preview_id']) > 0) {
            $sql =
                'DELETE FROM `post_keywords` WHERE `post_id` = ' .
                $postData['preview_id'] .
                '';
            $this->db->query($sql);
            for ($i = 0; $i < count($a) - 1; $i++) {
                $sql =
                    "INSERT INTO `post_keywords` ( post_id,keyword) VALUE ( '" .
                    $postData['preview_id'] .
                    "','" .
                    $a[$i] .
                    "')";
                $this->db->query($sql);
            }
        } else {
            for ($i = 0; $i < count($a) - 1; $i++) {
                $sql =
                    "INSERT INTO `post_keywords` ( post_id,keyword) VALUE ( '" .
                    $postData['id'] .
                    "','" .
                    $a[$i] .
                    "')";
                $this->db->query($sql);
            }
        }
    }

    public function get_settings()
    {
        $builder = $this->db->table('setting');
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function get_categorie()
    {
        $builder = $this->db->table('categories');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_post_max_id()
    {
        $db = db_connect();
        $sql = 'SELECT MAX( id )+1 as max_id FROM `posts`';
        $query = $db->query($sql);
        return $query->getResultArray();
    }

    function countImgPage($perPage)
    {
        $builder = $this->db->table('media');
        $builder->select('id');
        $builder->where('active', 1);
        $res = $builder->get();
        $total = $builder->countAll();
        $total_page = ceil($total / $perPage);
        return $total_page;
    }
    function getPost($post_id)
    {
        $builder = $this->db->table('posts');
        $builder->select("posts.*,media.url,media.alt_text,media.provider,media.region,media.bucket,media.aws_path,media.attachment_metadata");
        $builder->where('posts.id', $post_id);
        $builder->join('media', 'media.id=posts.image', 'LEFT');
        $res = $builder->get()->getRowArray();
        $res['content'] = urldecode(html_entity_decode($res['content'])); 

        //   $query = $this->db->getLastQuery();
        //   return (string)$query;die;

        return $res;
    }
    function addNewPost($data, $tags, $cat)
    {
        // echo "<pre>";
        // print_r($data);
        $db = db_connect();
        $builder = $this->db->table('posts');

            $data['visibility'] = 'p';
            $builder->where('seo_url', 'untitled');
            $builder->update($data);
            // echo "<pre>";
            // print_r($data);die;
            $sql = "SELECT `id` FROM `posts` ORDER BY `id` DESC";
            $r = $this->db->query($sql)->getResultArray();
        // if ($db->insertId() > 0) {
            if ($r[0]) {
            $insert_id = $r[0];
            if (!empty($tags)) {
                $tags = explode(',', $tags);
            }
            $builder = $this->db->table('post_keywords');
            if ($tags) {
                foreach ($tags as $tag) {
                    $builder->insert([
                        'post_id' => $insert_id,
                        'keyword' => $tag,
                    ]);
                }
            }
            $builder = $this->db->table('post_categories');
            if ($cat) {
                foreach ($cat as $c) {
                    $builder->insert([
                        'categorie_id' => $c,
                        'post_id' => $insert_id,
                    ]);
                }
            }
            //return $data;
            return $insert_id;
        } else {
            return false;
        }
        
    }
    function add_category($cat, $post_id)
    {
        $builder = $this->db->table('post_categories');
        foreach ($cat as $c) {
            $builder->insert([
                'categorie_id' => $c,
                'post_id' => $post_id,
            ]);
        }
    }
    function get_post_featureImage($post_id)
    {
        $builder = $this->db->table('posts');
        $builder->select("image");
        $builder->where('id',$post_id);
        $res = $builder->get();
        $res = $res->getRowArray();

        
        $image_id = $res["image"];
        $image_id = (int) $image_id;
        $builder = $this->db->table("media");
        $builder->select("url");
        $builder->where('id',$image_id);
        $image = $builder->get();
        $image = $image->getRowArray();
        $arr = explode("/",$image['url']);
        $image = $arr[6];
        // print_r($image);die;
        return $image;
    }
    function get_post_featureId($post_id)
    {
        $builder = $this->db->table("posts");
        $builder->select("image");
        $builder->where('id',$post_id);
        $res = $builder->get();
        $res = $res->getRowArray();
        return $res;
    }
    function getCatagoryList($post_id)
    {
        $builder = $this->db->table('post_categories');
        $builder->select('categorie_id');
        $builder->where('post_id', $post_id);
        $res = $builder->get()->getResultArray();
        $result = [];
        foreach ($res as $r) {
            $result[] = $r['categorie_id'];
        }
        return $result;
    }
    function getTagList($post_id)
    {
        $builder = $this->db->table('post_keywords');
        $builder->where('post_id', $post_id);
        $res = $builder->get()->getResultArray();
        return $res;
    }
    function update_post($post_id, $data, $removetag, $tag, $cat, $deleteCat,$img_result)
    {
        // echo "<pre>";
        // print_r($tag);die;
        $builder = $this->db->table('post_keywords');
        if ($removetag) {
            $removetag = explode(',', $removetag);
            foreach ($removetag as $tagid) {
                if ($tagid) {
                    $builder->where('id', $tagid);
                    $builder->delete();
                }
            }
        }
        $builder = $this->db->table('post_keywords');
        if ($tag) {
            $tag = explode(',', $tag);
            foreach ($tag as $t) {
                // echo "<pre>";
                // print_r($t);die;
                $builder->insert([
                    'post_id' => $post_id,
                    'keyword' => $t,
                ]);
            }
        }
        $db = db_connect();
        $builder = $this->db->table('post_categories');
        if ($cat) {
            foreach ($cat as $c) {
                $sql = "SELECT * FROM post_categories ";
                $sql.="WHERE post_id=".$post_id." ";
                $sql.="AND categorie_id=".$c." ";
                $query = $db->query($sql);
                $builder->where('post_id', $post_id);
                $builder->where('categorie_id', $c);
                $res = $builder->get();
                if ($db->affectedRows() == 0) {
                    $builder = $this->db->table("post_categories");
                    $builder->insert([
                        'post_id' => $post_id,
                        'categorie_id' => $c,
                    ]);
                }
            }
        }

        $i = $this->db->table('media');
        if(!empty($img_result))
        {
            foreach($img_result as $img)
            {
                if(!empty($img['alt']))
                {
                    // $sqli = "SELECT `alt_text` FROM `media` WHERE `url`='{$img['src']}'";
                    // $rest = $this->db->query($sqli)->getResultArray();
                    // if(empty($rest[0]['alt_text']))
                    // {
                        $i->set('alt_text', $img['alt']);
                        $i->where('url',$img['src']);
                        $i->update();  
                   // }  
                }


            }
        }


        if ($deleteCat) {
            $deleteCat = explode(',', $deleteCat);
            $builder = $this->db->table('post_categories');
            foreach ($deleteCat as $deleteCatId) {
                if ($deleteCatId) {
                    $builder->where('post_id', $post_id);
                    $builder->where('categorie_id', $deleteCatId);
                    $builder->delete();
                }
            }
        }
      
        // $sql="SELECT `seo_url` FROM `posts`";
        // $query=$this->db->query($sql);
        // $result=$query->getResultArray();
        // for($i=0;$i<count($result);$i++)
        // {
        // if($result[$i]['seo_url']==$data['seo_url']){
        //     $data['seo_url']=$data['seo_url']."-".$i;
        // }
        // else{
        //     $r=$data['seo_url'];
        //     print_r($r);die;
        // }
        // }

  ////////we will do RND from here


        $builder = $this->db->table('posts');
        $builder->where('id', $post_id);
    //    print_r($data['seo_url']);die;
        $builder->update($data);
        if ($builder->countAll() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /////////////////////////////////////we will do RND from here
    function update_the_post($data,$post_id)
    {
        $builder = $this->db->table('posts');
        $builder->where('id', $post_id);
    //    print_r($data['seo_url']);die;
        $builder->update($data);
    }
    function update_things($data,$post_id)
    {
        $builder = $this->db->table('posts');
        $builder->where('id', $post_id);
    //    print_r($data['seo_url']);die;
        $builder->update($data);
        //print_r($res);die;
        if ($builder->countAll() > 0) {
            return "ok";
        } else {
            return "not_ok";
        }
    }
    function getTrash($page)
    {
        
        $db = db_connect();
      //  $sql = "CREATE OR REPLACE VIEW trash_views AS ";
        $sql ="SELECT * FROM posts ";
        $sql .="WHERE active = 0";
        $query = $db->query($sql);
        $perPage = 10;
        $start = ($page - 1) * $perPage;
        $builder = $this->db->table('posts');
        $builder->where('active', 0);
        $builder->limit($perPage, $start);
        $res['posts'] = $builder->get();
        $res['posts'] = $res['posts']->getResultArray();
        $builder = $this->db->table('posts');

        $res['total'] = $builder
            ->where('active', 0)
            ->get();
        $res['total'] = $res['total']->getresultArray();    
        return $res;
    }
    function trash_clear($delete_id)
    {
        $builder = $this->db->table('posts');
        if (count($delete_id) > 0) {
            foreach ($delete_id as $del_id) {
                if ($del_id) {
                    $builder->where('id', $del_id);
                    $builder->delete();
                    $builder = $this->db->table("post_categories");
                    $builder->where('post_id', $del_id);
                    $builder->delete();
                    $builder = $this->db->table('post_keywords');
                    $builder->where('post_id', $del_id);
                    $builder->delete();
                }
            }
        }
    }
    function pageCreated($data)
    {
        $builder  = $this->db->table('pages');
        $builder->insert($data);
    }
    function getRole()
    {
        $builder = $this->db->table('role');
        $builder->where('status', 'active');
        $res = $builder->get();
        return $res->getResultArray();
    }
    function keepOldUrl($olddata)
    {
        $builder = $this->db->table("pastUrl");
        $builder->insert($olddata);
        $builder = $this->db->table("pastUrl");
        $builder->where('post_id', $olddata['post_id']);
        $builder->update(['new_url' => $olddata['new_url']]);
        $builder = $this->db->table("pastUrl");
        $builder->where('url', $olddata['new_url']);
        $builder->delete();
    }
    function bulkpostaction($postIds)
    {
        $builder  = $this->db->table('posts');
        $postIds = explode(',', $postIds);
        foreach ($postIds as $postId) {
            $builder->where('id', $postId);
            $builder->update(['active' => 0,'visibility' =>'h']);
        }
    }
    function restore($restoreIds)
    {
        
        $builder = $this->db->table('posts');
        $restoreIds = json_decode($restoreIds);
        foreach ($restoreIds as $restoreId) {
            $builder->where('id', $restoreId);
            $builder->update(['active' => 1,'visibility' =>'p']);
        }
    }
    function getRecent()
    {
        $builder = $this->db->table('posts');
        $builder->select('posts.id,posts.title,posts.seo_url,posts.date_');
        $builder->where('posts.visibility', 'p');
        $builder->where('posts.active', 1);
        $builder->limit(10);
        $builder->orderBy('posts.date_', 'DESC');
        $res = $builder->get();
        $data = [];
        $i = 0;
        foreach ($res->getResultArray() as $r) {
            $data[$i]['id'] = $r['id'];
            $data[$i]['title'] = $r['title'];
            $data[$i]['seo_url'] = $r['seo_url'];
            $data[$i]['date'] = $r['date_'];
            $i++;
        }
        return $data;
    }
    function getTopPost()
    {
        $builder = $this->db->table('posts');
        $builder->select('posts.id,posts.title,posts.seo_url,posts.date_,visitor.visit');
        $builder->where('posts.visibility', 'p');
        $builder->where('posts.active', 1);
        $builder->limit(10);
        $builder->orderBy('visitor.visit', 'DESC');
        $builder->join('visitor', 'visitor.post_id=posts.id');
        $res = $builder->get();
        $data = [];
        $i = 0;
        foreach ($res->getResultArray() as $r) {
            $data[$i]['id'] = $r['id'];
            $data[$i]['title'] = $r['title'];
            $data[$i]['visit'] = $r['visit'];
            $data[$i]['seo_url'] = $r['seo_url'];
            $data[$i]['date'] = $r['date_'];
            $i++;
        }
        return $data;
    }
    function getDailyVisit()
    {
        $builder = $this->db->table('visitor');
        $builder->select('SUM(visit) as sum,date');

        $builder->orderBy('date', 'DESC');
        $builder->limit(10);
        $builder->groupBy('date');

        $res = $builder->get();

        $data = [];
        $i = 0;
        //   echo "<pre>";
        //   print_r($res->result_array());die;
        foreach ($res->getResultArray() as $visit) {
            $data['x'][$i][] = $i;
            $data['x'][$i][] = date('d M y', strtotime($visit['date']));
            $data['y'][$i][] = $i;
            $data['y'][$i][] = $visit['sum'];
            $i++;
        }
        return $data;
    }
    function totalvisit()
    {
        $builder = $this->db->table('visitor');
        $builder->select('SUM(visit) as total');
        $res = $builder->get();
        return $res->getRowArray()['total'];
    }
    function todayview()
    {
        $builder = $this->db->table('visitor');
        $builder->select('SUM(visit) as total');
        $builder->where('date', date('Y-m-d'));
        $res = $builder->get();
        return $res->getRowArray()['total'];
    }
    function bestoverall()
    {
        $builder = $this->db->table('visitor');
        $builder->select('SUM(visit) as total,date');
        $builder->groupBy('date');
        $builder->orderBy('total', 'DESC');
        $res = $builder->get();
        //   echo $this->db->last_query();die;
        return $res->getRowArray();
    }
    function ipblockList()
    {
        $builder = $this->db->table('ipblocklist');
        $res = $builder->get();
        return $res->getResultArray();
    }
    function addIp($ip)
    {
        
        $htaccess = '.htaccess';
        $contents = file_get_contents($htaccess, true);
        if ($contents) {
            $exists = !stripos($contents, 'deny from ' . $ip . "\n");
            if ($exists) {
                $date = date('Y-m-d H:i:s');
                $uri = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES);
                $ban = "\nDeny from {$ip}";
                $builder = $this->db->table('ipblocklist');
                $con = file_put_contents($htaccess, $ban, FILE_APPEND);
                if ($con) {
                    $builder->insert(['ip' => $ip]);
                } else {
                    $this->session->setFlashdata(
                        'msg',
                        'Unable to block your ip'
                    );
                }
            } else {
                $this->session->setFlashdata(
                    'msg',
                    'Already banned, nothing to do here.'
                );
            }
        } else {
            $this->session->setFlashdata('msg', 'Unable to block');
        }
    }
    function removeblockIp($id)
    {
        $builder = $this->db->table('ipblocklist');
        $builder->where('id', $id);
        $res = $builder->get();
        $rdata = $res->getRowArray();

        $htaccess = '.htaccess';
        ($contents = file_get_contents($htaccess, true)) or
            exit('Unable to open .htaccess');
        $ex = stripos($contents, 'deny from ' . $rdata['ip'] . "\n");
        //   echo $ex;die;
        //   echo 'Deny from ' . $rdata["ip"] . "\n";
        //   echo 'Deny from {$rdata["ip"]}';
        $t = str_replace('Deny from ' . $rdata['ip'], '', $contents);
        // print_r($t);die;
        file_put_contents($htaccess, $t);
        $builder = $this->db->table('ipblocklist');
        $builder->where('id', $id);
        $builder->delete();
    }
    function blockedips()
    {
        $builder = $this->db->table('ipblocklist');
        $builder->limit(5);
        $res = $builder->get();
        return $res->getResultArray();
    }
    function insert_uploadImage($data)
    {
        $db = db_connect();
        $builder = $db->table('media');
        $builder->insert($data);
        return $db->insertID();
    }
    function get_image_id(){
        $db = db_connect();
        $builder = $db->table('media');
        $builder->insert($data);
        return $db->insertID();
    }
    function uploadImage($img)
    {
        // echo '<pre>';
        // print_r($img);
        // print_r($data);
        // die;
        // $db = db_connect();
        // $builder = $db->table('media');
        // $builder->insert($data);
        // return $db->insertID();
        // $img = implode("",$img);

        $db = db_connect();
        // print_r($img);die;
        // $n_url = $img['url'];
        $sql = "SELECT `id` FROM `media` WHERE `url`='{$img}' ORDER BY `id` DESC LIMIT 1";
        $r = $this->db->query($sql)->getResultArray();
        return $r;
    }
    function uploadImage_get($id)
    {
        // echo '<pre>';
        // print_r($data);die;
        $db = db_connect();
        $builder = $db->table('media');
        $builder->where("id", $id);
        $res = $builder->get();
        return $res->getResultArray();
    }

    function fetch_all_media_img($page,$per_page)
    {
        $start = ($page - 1) * $per_page;
        $db = db_connect();
        $builder = $db->table('media');
        $builder->limit($per_page, $start);
        $builder->orderBy("create_date", "DESC");
        $res = $builder->get();
        return $res->getResultArray();
    }

    function getMenu()
    {
        $builder = $this->db->table('menu');
        $builder->where("status", "active");
        $res = $builder->get();
        return $res->getResultArray();
    }
    function pageList()
    {
        $builder = $this->db->table("pages");
        $builder->where("active", 1);
        $res = $builder->get();
        return $res->getResultArray();
    }
    function updateMenu($menu, $page = array(), $custom_url = "", $custom_label = "",$category=array())
    {
        $builder = $this->db->table('menu_list');
        if ($page) {
            foreach ($page as $pg) {
                $data["menu_id"] = $menu;
                $page_array = explode("|", $pg);
                $data["page"] = $page_array[0];
                $data["label"] = $page_array[1];
                $res = $builder->insert($data);
            }
        }
        $builder = $this->db->table('menu_list');
        if ($category) {
            foreach ($category as $cat) {
                $data["menu_id"] = $menu;
                $page_array = explode("|", $cat);
                $data["category_id"] = $page_array[0];
                $data["label"] = $page_array[1];
                $res = $builder->insert($data);
            }
        }
        $builder = $this->db->table('menu_list');
        if ($custom_label) {
            $data["menu_id"] = $menu;

            $data["custom_link"] = $custom_url;
            $data["label"] = $custom_label;
            $res = $builder->insert($data);
        }
    }
    function menu_datalist($id = 1)
    {
        $builder = $this->db->table('menu_list as ml');
        $builder->where("m.menu_id", $id);

        $builder->join("menu as m", "m.menu_id=ml.menu_id");
        $res = $builder->get();
        return $res->getResultArray();
    }
    function deleteMenu($link_id)
    {
        $builder = $this->db->table('menu_list');
        $builder->where("menu_list", $link_id);
        $res = $builder->delete("menu_list");
    }
    function addMainMenu($menu,$ord)
    {
        $builder = $this->db->table("menu");
        $res = $builder->insert(array("menu_name" => $menu,"menu_order"=>$ord ,"status" => 'active'));
    }
    function categoryList(){
        $builder = $this->db->table("categories");
        $builder->select("id,categorie");
        $builder->where("active","y");
        $res = $builder->get();
        return $res->getResultArray();
    }
    ////  fchecking the incoming url from update page , that this exists in database or not
    function check_update_url($oldUrl)
    {
       // echo $oldUrl;die;
        $builder=$this->db->table('posts');
        $builder->where("seo_url_text",$oldUrl);
        $builder->orderBy('seo_url_no', 'DESC');
        $res=$builder->get();
        return $res->getResultArray();
       //return $res->getRowArray();
       

    }
    public function checkUrl2($url, $id){
        
        
            $sql = "SELECT `id`,`seo_url` FROM `posts`WHERE `id`= ".$id." AND `seo_url` = ".$url."";          
            $query = $this->db->query($sql);
            $result = $query->getRow();
            if($result){
                return "old";
            }else{
                return "new";
            }
         
       
       
    }

    public function checkUrl_new($data, $oldUrl, $post_id){
        $db = db_connect();

        $seoUrl = $data["seo_url"];
        $title = $data["title"];        

        if(!empty($seoUrl)){
            
            if(!empty($title)){
                $sql = "SELECT `title`,`seo_url` FROM `posts` WHERE `id` = '$post_id'";
                $result = $this->db->query($sql)->getRowArray();
                if($result['seo_url'] == $seoUrl && $result['title'] == $title){
                    return "new";
                }elseif($seoUrl == $oldUrl){
                    return "new";
                }else{
                    $sql = "SELECT `seo_url` FROM `posts` WHERE seo_url LIKE '%$seoUrl%' ";
                    $result = $this->db->query($sql)->getRowArray();
                    if(empty($result)){
                    return "new";
                    }elseif((str_replace( array( '-' ), ' ', $seoUrl)) == (strtolower(str_replace( array( '-',',' ), ' ', $title)))){
                        return "new";
                    }else{
                        return "old";
                    }
                }
            }else{
                $sql = "SELECT `seo_url` FROM `posts` WHERE `seo_url` LIKE '{$seoUrl}'" ;
                $result = $this->db->query($sql)->getRow();
                    if(!empty($result)){
                        return "old";
                    }else{
                        return "new";
                    }
            }
            }                       
        
    }
    
    public function checkUrl($url, $id)
    {
        // if($id){
        //     $sql = "SELECT `id`,`seo_url` FROM `posts` WHERE `id` <> ".$id." AND `seo_url` = '".$url."'";
        //     $query = $this->db->query($sql);
        // }else{            
        //}
        // echo $url;
        // die;
    //     $sql = "SELECT `seo_url` FROM `posts` WHERE `seo_url` = '".$url."'";
    //     $query = $this->db->query($sql);
    //     $result = $query->getRow();
    //     if($result){
    //         return "old";
    //     }else{
    //     $sql1 = "SELECT `url` FROM `pastUrl` WHERE `url` = '".$url."'";
    //     $query1 = $this->db->query($sql1);
    //     $result1 = $query1->getRow();
    //     if($result1){
    //         return "old";
    //     }else{
    //         return "new";
    //     }
    //    }
    if($id){
        $sql = "SELECT `id`,`seo_url` FROM `posts` WHERE `id` <> ".$id." AND `seo_url` = '".$url."'";
        $query = $this->db->query($sql);
    }else{
        $sql = "SELECT `id`,`seo_url` FROM `posts` WHERE `seo_url` = '".$url."'";
        $query = $this->db->query($sql);
    }
    $results = $query->getRow();
    if($results){
        return "old";
    }else{
        $sql1 = "SELECT `url` FROM `pastUrl` WHERE `url` = '".$url."'";
        $query1 = $this->db->query($sql1);
        $results1 = $query1->getRow();
        if($results1){
            return "old";
        }else{
            return "new";
        }
    }
    }

    function check_same_update_url($oldUrl)
    {
       // echo $oldUrl;die;
        $builder=$this->db->table('posts');
        $builder->where("seo_url",$oldUrl);
        $builder->orderBy('seo_url_no', 'DESC');
        $res=$builder->get();
        return $res->getResultArray();
  
    }
    function fetch_by_url_text($a)
    {
        $builder=$this->db->table('posts');
        $builder->where("seo_url_text",$a);
        $builder->orderBy('seo_url_no', 'DESC');
        $res=$builder->get();
        return $res->getResultArray(); 
    }
    function preview($id,$data)
    {
        $db = db_connect();
        $sql2 = "DELETE FROM `postPreview` WHERE `post_id` = '{$id}'";
        $this->db->query($sql2);
        

        // $sql1="SELECT `date_` FROM `posts` WHERE `id` = '{$id}'";
        // $d = $this->db->query($sql1)->getResultArray();


        //  print_r($d[0]['date_']);die;
        $builder = $db->table("permalink_list");
        $builder->where("status", "active");
        $res = $builder->get();
        $perma = $res->getRowArray();
        // print_r($data['cat_id']);die;        
        //   $d = $row['date_'];
        $d_create = date_create($data['date']);
        $date = date_format($d_create,$perma['linkformat']);

        //  echo "<pre>";
        //  print_r($data);die;
        $dat = array(
            'post_id' => $id, 
            'title' => $data['title'], 
            'content' => $data['content'], 
            'seo_url' => $data['seo_url'],
            'date_' => $date, 
            'post_categories' => $data['cat_id'],
            'author' => $data['author'],
        );
        // echo "<pre>";
        // print_r($dat);die;
        // $db = db_connect();
        $builder = $db->table('postPreview');
        $builder->insert($dat);
        // return $db->insertID();
        // print_r($data);
        // die;
        // echo $sql="INSERT INTO `postPreview` (`post_id`, `title`, `content`, `seo_url`,`date_`, `post_categories`) 
        //     VALUES ('{$data['post_id']}','{$data['title']}','{$data['content']}','{$data['seo_url']}','{$data['date']}', '{$data['cat_id']}')";
        // $this->db->query($sql);
        // echo $this->db->last_query();

        // print_r($date);
        // die;
        echo $id;

    }

    // function fetch_the_preview($id)
    // {
    //     $db = db_connect();

    //     $sql1="SELECT * FROM `postPreview` WHERE `post_id`='{$id}' ORDER BY `id` DESC";
    //     $res = $this->db->query($sql1)->getResultArray();
    //     if(!empty($res))
    //     {
    //         return $res[0];
    //     }
    // }

    function delete_the_preview($id)
    {
        $sql1="SELECT * FROM `postPreview` WHERE `post_id`='{$id}' ORDER BY `id` DESC";
        $res = $this->db->query($sql1)->getResultArray();
        if(!empty($res))
        {
            $sql="DELETE FROM `postPreview` WHERE `post_id`='{$id}'";
            $this->db->query($sql);
        }
    }
    function trash_post_delete($data)
    {
        foreach($data as $k=>$v)
        {
            $builder=$this->db->table('posts');
            $builder->where('id',$v);
            $builder->delete();
        }
    }

    function get_last_post_id()
    {
        // $db = db_connect();  
        // $sql = "SELECT `id` FROM `posts` ORDER BY `id` DESC LIMIT 1";
        // return $this->db->query($sql);
        $builder = $this->db->table('posts');
        $builder->select("id");
        $builder->orderBy('id', 'DESC');
        $builder->limit(1);
        $res = $builder->get();
        return $res->getResultArray();
    }
    // function fetch_all_post()
    // {
    //     $db = db_connect();
    //     $sql = "UPDATE `posts` SET `visibility`='{$data['visibility']}',`title`='{$data['title']}',`seo_url`='{$data['seo_url']}',`content` = '{$data['content']}',`date_` = '{$data['date']}' WHERE `seo_url` = 'untitled'";    
    //     $this->db->query($sql);

    // }
    function post_preview_insert($data)
    {        
        $last_dreaft_id = $data['last_dreaft_id'];
        $db = db_connect();
        $sql = "SELECT `id` FROM `posts` ORDER BY `id` DESC LIMIT 1";
        $res = $this->db->query($sql)->getResultArray();
        $n_id = $res[0]['id'];

        $sql2 = "DELETE FROM `post_categories` WHERE `post_id` = $n_id";
        $this->db->query($sql2);
        
        $sql3 = "DELETE FROM `post_keywords` WHERE `post_id` = $n_id";
        $this->db->query($sql3);

        if($last_dreaft_id==0)
        {
        unset($data['last_dreaft_id']);      
        unset($data['cat']);
        unset($data['keyword_list']);
        $builder=$this->db->table('posts');
        $builder->insert($data);
        return $last_dreaft_id = $db->insertID();
        }else{
        unset($data['last_dreaft_id']);       
        
        $builder = $this->db->table('post_categories');
        if (!empty($data['cat'])) { 
            $cat = $data['cat'];     
            foreach ($cat as $c) {                  
                if($c <> ""){
                    $builder->insert([
                        'categorie_id' => $c,
                        'post_id' => $res[0]['id'],
                    ]);
                }
            }
        }            
       
        $b = $this->db->table('post_keywords');
        if (!empty($data['keyword_list'])) {
            $tag1 = $data['keyword_list'];
            $tag = explode(",",$tag1);
            foreach ($tag as $t) {
                $b->insert([
                    'post_id' => $res[0]['id'],
                    'keyword' => $t,
                    'slug' => $t,                    
                ]);
            }
        }
        
        
        unset($data['cat']);
        unset($data['keyword_list']);
        $builder=$this->db->table('posts');
        $builder->where('id',$last_dreaft_id);
        $builder->update($data);
        return $last_dreaft_id;
     }
    

    }

    function post_add_preview($id, $data)
    {
    //    print_r($data);die;
        $db = db_connect();
        // $sqli = "SELECT `id` FROM `posts` ORDER BY `id` DESC";
        // $res = $this->db->query($sqli)->getResultArray();


        //  $sql = "UPDATE `posts` SET `visibility`='{$data['visibility']}',`title`='{$data['title']}',`seo_url`='{$data['seo_url']}',`content` = '{$data['content']}',`date_` = '{$data['date']}' WHERE `id` = '{$res[0]['id']}'";  
        $sql = "UPDATE `posts` SET `visibility`='{$data['visibility']}', `title`='{$data['title']}', `seo_url`='{$data['seo_url']}', `content` = '{$data['content']}', `date_` = '{$data['date']}', `image` = '{$data['image']}', `author` = '{$data['author']}' WHERE `id` = '{$id}'";   
        $this->db->query($sql);
    }
    function post_add_check_title($title,$seo_url)
    {
        $title = $title;
        $db = db_connect();
        $sql = "SELECT COUNT(*) FROM `posts` WHERE `title` LIKE '{$title}%'";
        $res = $this->db->query($sql)->getResultArray();
         if($res[0]['COUNT(*)']>1)
         {
             $seo_url = $seo_url."-".$res[0]['COUNT(*)'];             
         }
         else
         {
             $seo_url = $seo_url;
         }
         return $seo_url;
    }


    function post_add_the_publish($id, $data ,$img_result)
    {
      $db = db_connect();
       
      $cat = $data['cat'];
      $tags = $data['tag'];

        $sql = "DELETE FROM `post_categories` WHERE `post_id` = '$id'";
        $this->db->query($sql);
        $builder = $this->db->table('post_categories');
        if (!empty($cat)) {
        foreach ($cat as $c) {
            $builder->insert([
                'categorie_id' => $c,
                'post_id' => $id,
            ]);           
            }
            }

        $sql1 = "DELETE FROM `post_keywords` WHERE `post_id` = '$id'";
        $this->db->query($sql1);
        $b = $this->db->table('post_keywords');
        if ($tags) {
            foreach ($tags as $t) {
                $b->insert([
                    'post_id' => $id,
                    'keyword' => $t,
                    'slug' => $t,                    
                ]);
            }
        }

        $i = $this->db->table('media');
        if(!empty($img_result))
        {
            foreach($img_result as $img)
            {
                if(!empty($img['alt']))
                {
                    $sqli = "SELECT `alt_text` FROM `media` WHERE `url`='{$img['src']}'";
                    $rest = $this->db->query($sqli)->getResultArray();
                    if(empty($rest[0]['alt_text']))
                    {
                        $i->set('alt_text', $img['alt']);
                        $i->where('url',$img['src']);
                        $i->update();  
                    }  
                }
            }
        }
        $data['visibility'] = 'p';
        unset($data['cat']);
        unset($data['tag']);
        $builder = $this->db->table('posts');
        $builder->where('id',$id);
        $builder->update($data);   
    }

    function remove_media($id)
    {
        $sql = "UPDATE `posts` SET `image`= 0 WHERE `id`='{$id}'";
        return $this->db->query($sql);
    }
    public function get_all_user_data(){
        $builder = $this->db->table('comments');
        $builder->select("*");
        $res = $builder->get();
        return $res->getResultArray();
    }
    public function get_permalink()
    {
      $builder  =$this->db->table('permalink_list');
      $res = $builder->get();
      return $res->getResultArray();
    }
   




}
