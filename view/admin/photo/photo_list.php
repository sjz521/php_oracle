<?php include('../view/admin/layout/head.php'); ?>
<style type="text/css">
.color {
    color: #FFFFFF;
    text-decoration: none;
    font-weight: bold;
}  /*链接设置*/
.color:visited {
    color: #FFFFFF;
    text-decoration: none;
    font-weight: bold;
}  /*访问过的链接设置*/
.color:hover {
    color: #FFFFFF;
    text-decoration: none;
    font-weight: bold;
} /*鼠标放上的链接设置*/
</style>
<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">相册列表
                        </div>
                    </div>
                    <div class="widget-body  am-fr">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <script type="text/javascript">
                                            function delAllMessage(){
                                                    var con = confirm("是否确认全部删除！！！");
                                                    if(con==true){
                                                        location.href = "index.php?r=adminPhoto/deleteAllPhoto";
                                                    }else{
                                                        return false;
                                                    }
                                                    
                                                }

                                            function delMessage(a){
                                                var con = confirm("是否确认删除这条数据???");
                                                if(con==true){
                                                    location.href = "index.php?r=adminPhoto/deletePhoto&p_id="+a;
                                                }else{
                                                    return false;
                                                }
                                            }
                                        </script>
                                        <button type="button" class="am-btn am-btn-default am-btn-success">
                                            <span class="am-icon-plus"></span> 
                                            <a href="index.php?r=adminPhoto/addPhoto" class="color">新增</a></button>
                                        <button type="button" onclick="delAllMessage();" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除全部</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                            <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                <input type="text" class="am-form-field ">
                                <span class="am-input-group-btn">
                                    <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
                                </span>
                            </div>
                        </div>

                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                    <tr>
                                        <th>图片</th>
                                        <th>图片名称</th>
                                        <th>作者</th>
                                        <th>时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($photos as $value):?>
                                    <tr class="gradeX">
                                        <td><img src="/images/photos/<?=$value['NAME']?>" class="tpl-table-line-img"></td>
                                        <td><?php $array=explode('.', $value['NAME']); echo $array[0];?></td>
                                        <td><?=$value['UNAME']?></td>
                                        <td><?=$value['CREATED_AT']?></td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:void(0);" onclick="delMessage(<?=$value['ID']?>)" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                        <div class="am-u-lg-12 am-cf">

                            <div class="am-fr">
                                <ul class="am-pagination tpl-pagination">
                                    <li><a href="index.php?r=adminPhoto/home&uid=<?=$uid?>">首页</a></li>
                                    <?php for ($i=0; $i<$endPage; $i++): ?>
                                        <li <?php if($page==$i){echo 'class="am-active"';}?>><a href="index.php?r=adminPhoto/home&uid=<?=$uid?>&page=<?=$i?>"><?=$i+1?></a></li>
                                    <?php endfor?> 
                                    <li><a href="index.php?r=adminPhoto/home&uid=<?=$uid?>&page=<?=$endPage-1?>">末页</a></li>
                                </ul>
                            </div>
                        </div>
<?php include('../view/admin/layout/foot.php');