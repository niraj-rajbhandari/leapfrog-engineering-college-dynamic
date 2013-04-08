<?php

class Default_Model_Post extends Zend_Db_Table_Abstract {

    public $_name = 'tbl_posts';

    public function getHome() {
        $homeInfo = $this->fetchRow("post_type='home' and active=1")->toArray();
        return $homeInfo;
    }

    public function getFacilities() {

        $facilitiesInfo = $this->fetchAll("post_type='facilities' and active=1")->toArray();
        return $facilitiesInfo;
    }

    public function getAbout() {
        $aboutUs = $this->fetchRow("post_type='about-us' and active=1")->toArray();
        return $aboutUs;
    }

    public function getNews() {
        $news = $this->fetchAll("post_type='news' and active=1")->toArray();
        return $news;
    }
    
    public function getPostById($postId){
        $post=$this->fetchRow('id='.$postId)->toArray();
        return $post;
    }

    public function getSideBar($postType) {
        $select = $this->select()
                ->where("post_type='$postType' and active=1")
                ->limit(6);
       
        $sql = $select->query();
                
        $sideBar=$sql->fetchAll();
        return $sideBar;
    }

    function word_limiter($str, $limit = 10,$stripTag=TRUE) {
        if($stripTag)
        {
            $string = strip_tags($str);
        }
        else if(!$stripTag)
        {
            $string=$str;
        }
        else{
            echo "the value for strip tag can only be true or false";
        }

        if (stripos($string, " ")) {
            $ex_str = explode(" ", $string);
            $str_s = "";
            if (count($ex_str) > $limit) {
                for ($i = 0; $i < $limit; $i++) {
                    $str_s.=$ex_str[$i] . " ";
                }
                return $str_s;
            } else {
                return $str;
            }
        } else {
            return $str;
        }
    }

}

