<div class="btn-group"><a href="<?php echo site_urlc('article/index'); ?>" class="btn"> <i
                class="fa fa-arrow-left"></i> <?php echo lang('back_list') ?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
    <h3><i class="fa fa-pencil"></i> 编辑消息 <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
    <?php echo form_open(current_urlc(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

    <div class="boxed-inner seamless">

        <div class="control-group">
            <label for="title" class="control-label">标题:</label>
            <div class="controls">
                <input type="text" name="title" id="title" value="<?php echo set_value('title', $it['title']); ?>"
                       placeholder="栏目名称" required=1>
                <a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">SEO</a>
                <span class="help-inline"></span>
            </div>
        </div>

        <?php if ($this->cid == 22) { ?>
            <div class="control-group">
                <label class="control-label" for="titlef"> 底色 </label>
                <div class="controls">
                    <input type="text" id="titlef" name="titlef"
                           value="<?php echo set_value("titlef", $it['titlef']) ?>">
                </div>
            </div>
        <?php } ?>

        <?php if ($this->cid == 6) { ?>
            <div class="control-group">
                <label class="control-label" for="tel"> 电话 </label>
                <div class="controls">
                    <input type="text" id="tel" name="tel" value="<?php echo set_value("tel", $it['tel']) ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="addr"> 地址 </label>
                <div class="controls">
                    <input type="text" id="addr" name="addr" class='span4'
                           value="<?php echo set_value("addr", $it['addr']) ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="longitude"> 经纬度 </label>
                <div class="controls">
                    <input type="text" id="longitude" name="longitude"
                           value="<?php echo set_value("longitude", $it['longitude']) ?>">
                    <span class="help-inline"><a href="http://api.map.baidu.com/lbsapi/getpoint/index.html"
                                                 target="_blank">百度拾取经纬度系统</a></span>
                </div>
            </div>
        <?php } ?>


        <?php if ($this->cid == 4 || $this->cid == 23) { ?>
            <div class="control-group">
                <label class="control-label" for="color"> 底色 </label>
                <div class="controls">
                    <input type="text" id="color" name="color" value="<?php echo set_value("color", $it['color']) ?>">
                </div>
            </div>
        <?php } ?>

        <!-- 弹出 -->
        <div id="seo-modal" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i>
                </button>
                <h3><i class="fa fa-info-circle"></i> SEO优化</h3>
            </div>
            <div class="modal-body seamless">

                <div class="control-group">
                    <label for="title_seo" class="control-label"><?php echo lang('title_seo') ?></label>
                    <div class="controls">
                        <input type="text" id="title_seo" name="title_seo"
                               value="<?php echo set_value('title_seo', $it['title_seo']) ?>" x-webkit-speech>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="tag"><?php echo lang('tag') ?></label>
                    <div class="controls">
                        <input type="text" id="tags" name="tags" value="<?php echo set_value('tags', $it['tags']) ?>"
                               placeholder="tag1,tag2">
                        <span class="help-inline">使用英文标点`,`隔开</span>
                    </div>
                </div>

                <div class="control-group">
                    <label for="intro" class="control-label"><?php echo lang('intro') ?></label>
                    <div class="controls">
                        <textarea name="intro" rows='8'
                                  class='span4'><?php echo set_value('intro', $it['intro']) ?></textarea>
                        <span class="help-inline"></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Close</a>
            </div>
        </div>

        <div class="control-group">
            <label for="title" class="control-label">时间:</label>
            <div class="controls">
                <div class="input-append date timepicker">
                    <input type="text"
                           value="<?php echo date("Y/m/d H:i:s", set_value('timeline', $it['timeline'])); ?>"
                           id="timeline" name="timeline">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
        </div>

        <!-- switch demo -->
        <div class="control-group">
            <label class="control-label" for="status"><?php echo lang('status') ?>:</label>
            <div class="controls">
                <?php
                $status = array(
                    array(
                        'title' => "草稿"
                    , 'value' => '0'
                    )
                , array(
                        'title' => "发布"
                    , 'value' => '1'
                    )
                );
                echo ui_btn_switch('status', $it['status'], $status);
                ?>
                <span class="help-inline"></span>
            </div>
        </div>


        <!-- ctype -->
        <?php if ($ctype = list_coltypes($this->cid) and $this->cid != 1) { ?>
            <div class="control-group">
                <label class="control-label" for="status"> 所属分类:</label>
                <div class="controls">
                    <?php
                    echo ui_btn_select('ctype', set_value("ctype", $it['ctype']), $ctype);
                    ?>
                    <span class="help-inline"></span>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->cid == 18) { ?>
            <div class="control-group">
                <label for="shortint" class="control-label">短标签</label>
                <div class="controls">
                    <textarea name="shortint" rows='8'
                              class='span4'> <?php echo set_value('shortint', $it['shortint']) ?> </textarea>
                    <span class="help-inline"></span>
                </div>
            </div>
        <?php } ?>

        <?php if ($this->cid == 18 || $this->cid == 23 || $this->cid == 3 || $this->cid == 4 || $this->cid == 5 || $this->cid == 22) { ?>
            <div class="control-group">
                <label for="introduction" class="control-label">简介内容</label>
                <div class="controls">
                    <textarea name="introduction" rows='8'
                              class='span4'> <?php echo set_value('introduction', $it['introduction']) ?> </textarea>
                    <span class="help-inline"></span>
                </div>
            </div>
        <?php } ?>

        <?php if ($this->cid != 6 && $this->cid != 23) { ?>
            <div class="control-group uefull">
                <textarea id="content" name="content"> <?php echo set_value('content', $it['content']); ?></textarea>
            </div>
        <?php } ?>


        <?php if ($this->cid != 6) { ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label">图片：</label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>
						<input class="fileupload" type="file" accept="">
					</span>
                        <input type="hidden" name="photo" class="form-upload" data-more="0"
                               value="<?php echo set_value('photo', $it['photo']) ?>">
                        <input type="hidden" name="thumb" class="form-upload-thumb"
                               value="<?php echo set_value('thumb', $it['thumb']) ?>">
                    </div>
                    <?php if ($this->cid == 18) { ?>
                        <span>图片尺寸:960*480</span>
                    <?php } elseif ($this->cid == 8) { ?>
                        <span>图片尺寸:760*488</span>
                    <?php } elseif ($this->cid == 3) { ?>
                        <span>图片尺寸:960*490</span>
                    <?php } elseif ($this->cid == 4 || $this->cid == 23) { ?>
                        <span>图片尺寸:1260*990</span>
                    <?php } elseif ($this->cid == 5) { ?>
                        <span>图片尺寸:410*230</span>
                    <?php } elseif ($this->cid == 22) { ?>
                        <span>图片尺寸:480*490</span>
                    <?php } ?>
                </div>
            </div>
            <div id="js-photo-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php } ?>


        <?php if ($this->cid == 4) { ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label">小图片：</label>
                <div class="controls">
                    <div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="">
						</span>
                        <input type="hidden" name="xphoto" class="form-upload" data-more="0"
                               value="<?php echo set_value('xphoto', $it['xphoto']) ?>">

                    </div>
                    <span>图片尺寸:72*70</span>
                </div>
            </div>
            <div id="js-xphoto-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php } ?>


        <?php if ($this->cid == 4 || $this->cid == 3) { ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label">首页图片：</label>
                <div class="controls">
                    <div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="">
						</span>
                        <input type="hidden" name="pic" class="form-upload" data-more="0"
                               value="<?php echo set_value('pic', $it['pic']) ?>">

                    </div>
                    <span>图片尺寸:685*490</span>
                </div>
            </div>
            <div id="js-pic-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php } ?>


        <?php if ($this->cid == 1) { ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label">手机版图片：</label>
                <div class="controls">
                    <div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="">
						</span>
                        <input type="hidden" name="mphoto" class="form-upload" data-more="0"
                               value="<?php echo set_value('mphoto', $it['mphoto']) ?>">

                    </div>
                    <?php if ($this->cid == 1) { ?>
                        <span>图片尺寸:750*670</span>
                    <?php } ?>
                </div>
            </div>
            <div id="js-mphoto-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php } ?>

    </div>
    <div class="boxed-footer">
        <?php if ($this->ccid): ?>
            <input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
        <?php endif ?>
        <input type="hidden" name="cid" value="<?php echo $this->cid ?>">
        <input type="hidden" name="id" value="<?php echo $it['id'] ?>">
        <input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
        <input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
    </div>
    </form>
</div>

<!-- 注意加载顺序 -->
<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
    require(['adminer/js/ui', 'adminer/js/media', 'bootstrap-datetimepicker.zh'], function (ui, media) {
        $('.timepicker').datetimepicker({'language': 'zh-CN', 'format': 'yyyy/mm/dd hh:ii:ss', 'todayHighlight': true});
        <?php if($this->cid != 6 && $this->cid != 23 ){ ?>
        ui.editor_create('content');
        <?php } ?>
        media.init();

        var articles_photos = <?php echo json_encode(one_upload($it['photo'])) ?>;
        media.show(articles_photos, "photo");

        <?php if($this->cid == 4 || $this->cid == 23 || $this->cid == 3){ ?>
        var articles_pics = <?php echo json_encode(one_upload($it['pic'])) ?>;
        media.show(articles_pics, "pic");
        <?php } ?>

        <?php if($this->cid == 4 || $this->cid == 23){ ?>
        var articles_xphotos = <?php echo json_encode(one_upload($it['xphoto'])) ?>;
        media.show(articles_xphotos, "xphoto");
        <?php } ?>



        <?php if($this->cid == 1){ ?>
        var articles_mphotos = <?php echo json_encode(one_upload($it['mphoto'])) ?>;
        media.show(articles_mphotos, "mphoto");
        <?php } ?>

    });
</script>
