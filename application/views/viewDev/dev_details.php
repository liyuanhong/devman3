<?php
    $defInfo = $params["defInfo"];
?>

<style type="text/css">
    table tbody tr td {
        border-style: solid;
        border-width: 1px;
        padding:2px;
    }
    table tbody tr td label {
        font-size: 16px;
    }
</style>

<?php if(count($defInfo) == 0): ?>
<div class="content-wrapper" style="_background-color: #FFCCCC;">
    <div style="width:100%;_background: #00c0ef;padding-top:200px;">
        <div style="margin:auto;width:200px;">
            <h3 style="margin-top:0px;display: inline;">没有选择任何设备</h3>
            <button type="button" class="btn btn-block btn-success" style="width:auto;margin:auto;margin-top:30px;">返回首页</button>
        </div>
    </div>
</div>
<?php else: ?>
<div class="content-wrapper" style="_background-color: #FFCCCC;">
    <div style="width:50%;margin:auto;_background: yellow;">
        <div class="box-body" style="_background: lightblue;">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for($i = 0;$i < count($defInfo[0]["imgs"]);$i++): ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php if($i == 0){echo 'class="active"';}else{echo 'class=""';}?> ></li>
                    <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php for($i = 0;$i < count($defInfo[0]["imgs"]);$i++): ?>
                    <div <?php if($i == 0){echo 'class="item active"';}else{echo 'class="item"';}?>>
                        <img style="height:550px;margin:auto;" src="<?php echo  base_url()."files/".str_replace(" ","",$defInfo[0]["imgs"][$i]["path"]); ?>" alt="">

                        <div class="carousel-caption">
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div>
    </div>
    <div style="width:100%;margin:auto;_background: yellow;">
        <table style="width:70%;margin:auto;">
            <tbody>
                <tr>
                    <td><label>id：<?php echo $defInfo[0]["id"]?></label></td>
                    <td><label>设备名：<?php echo $defInfo[0]["device_name"]?></label></td>
                    <td><label>型号：<?php echo $defInfo[0]["model"]?></label></td>
                    <td><label>平台：<?php echo $defInfo[0]["plateform"]?></label></td>
                    <td><label>品牌：<?php echo $defInfo[0]["brand"]?></label></td>
                </tr>
                <tr>
                    <td><label>版本：<?php echo $defInfo[0]["version"]?></label></td>
                    <td><label>所有者：<?php echo $defInfo[0]["owner"]?></label></td>
                    <td><label>借阅者：<?php echo $defInfo[0]["borrower"]?></label></td>
                    <td><label>添加时间：<?php echo $defInfo[0]["add_time"]?></label></td>
                    <td><label>借出时间：<?php echo $defInfo[0]["borrow_time"]?></label></td>
                </tr>
                <tr>
                    <td colspan="5"><label>描述：<?php echo $defInfo[0]["comments"]?></label></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
