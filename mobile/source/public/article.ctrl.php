<?php
    
defined('IN_IA') or exit('Access Denied');

$id = intval($_GPC['id']);
if($id){
    //查询数据库得到该条文章的信息
    $sql = "SELECT * FROM " . tablename('site_article') . " WHERE id = :id";
    $pars = array(':id'=>$id);
    $article = pdo_fetch($sql, $pars);
    if(!empty($article)) {
        $sql = "SELECT name FROM " . tablename('site_category') . "WHERE id = :id";
        $pars = array(':id'=>$article['pcate']);
        $article['p_cate'] = pdo_fetch($sql,$pars);
        if($article['ccate']){
            $pars = array(':id'=>$article['ccate']);
            $article['c_cate'] = pdo_fetch($sql,$pars);
        }
    }
    pdo_update('site_article',array('scan_count'=>$article['scan_count']+1),array('id'=>$id));
    template('public/article-descript');
}else{
    $condition = ' AND uniacid = :uniacid';
    $pars = array(':uniacid'=>1);
    $sql = "SELECT id,title,thumb,source,description,scan_count,createtime FROM " . tablename('site_article') . " WHERE 1 = 1{$condition} ORDER BY `id` DESC LIMIT 20";
    $article = pdo_fetchall($sql, $pars);
    template('public/article');
}
