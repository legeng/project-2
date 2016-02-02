<?php
    
defined('IN_IA') or exit('Access Denied');

load()->html('account');

if('more'==trim($_GPC['do'])){
    //取出一级标签
    $condition = 'AND `uniacid` = :uniacid';
    $condition .= ' AND `parentid` = :parentid';
    $pars = array(':uniacid'=>1,':parentid'=>0);
    $sql = "SELECT id,name,parentid FROM " . tablename('site_category') . " WHERE 1 = 1 {$condition}";
    $p_list = pdo_fetchall($sql,$pars);

    
    //取出二级标签
    $condition = 'AND `uniacid` = :uniacid';
    $condition .= ' AND `parentid` <> :parentid';
    $pars = array(':uniacid'=>1,':parentid'=>0);
    $sql = "SELECT id,name,parentid FROM " . tablename('site_category') . " WHERE 1 = 1 {$condition}";
    $c_list = pdo_fetchall($sql,$pars);

    template('public/love');
    exit;
}
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
    template('public/article-descript');

}else{
    $pindex = max(1, intval($_GPC['page']));
    $psize = 15;
    $start = ($pindex - 1) * $psize;
    $condition = '';
    $pars = array();

    if (!empty($_GPC['parentid'])) {
        $pid = intval($_GPC['parentid']);
        $condition .= " AND `pcate` = :pcate";
        $pars[':pcate'] = $pid;
    }
    if (!empty($_GPC['childid'])) {
        $cid = intval($_GPC['childid']);
        $condition .= " AND ccate = :ccate";
        $pars[':ccate'] = $cid;
    }

    $tsql = "SELECT COUNT(*) FROM " . tablename('site_article') . " WHERE 1 = 1{$condition}";
    $total = pdo_fetchcolumn($tsql, $pars);
    $sql = "SELECT id,title,thumb,description,createtime FROM " . tablename('site_article') . " WHERE 1 = 1{$condition} ORDER BY `id` DESC LIMIT {$start}, {$psize}";
    $pager = pagination($total, $pindex, $psize);
    $list = pdo_fetchall($sql, $pars);

    if(!empty($list)) {
        foreach($list as &$article) {
            $article['p_cate'] = trim($_GPC['key']);
            $article['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
        }
        template('public/list-article');
    }else{
        $keyword = trim($_GPC['key']);
        template('public/not-exist'); 
    }
}

