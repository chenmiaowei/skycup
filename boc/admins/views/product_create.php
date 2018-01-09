
<div class="btn-group">
    <a href="<?php echo site_urlc('product/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?></a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
    <h3> <i class="fa fa-pencil"></i> <span class="badge badge-success pull-right"><?php echo $title; ?></span> <?php echo lang('add') ?></h3>
    <?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

    <div class="boxed-inner seamless">
        <div class="control-group">
            <label class="control-label" for="title"> <?php echo lang('title') ?> </label>
            <div class="controls">
                <input type="text" id="title" name="title" class='span4'>
                <a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal"><?php echo lang('seo') ?></a>
            </div>
        </div>

        <!-- ctype -->
		<?php if ($ctype = list_coltypes($this->cid)) { ?>
		<div class="control-group">
			<label class="control-label" for="status"> 所属分类:</label>
			<div class="controls">
				<?php
				echo ui_btn_select('ctype',set_value("ctype"),$ctype);
				?>
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>


        <div class="control-group">
            <label class="control-label" for="size"> 产品尺寸 </label>
            <div class="controls">
                <input type="text" id="size" name="size" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="model"> 产品型号 </label>
            <div class="controls">
                <input type="text" id="model" name="model" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="speed"> 速度 </label>
            <div class="controls">
                <input type="text" id="speed" name="speed" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="age"> 适用年龄 </label>
            <div class="controls">
                <input type="text" id="age" name="age" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="color"> 颜色 </label>
            <div class="controls">
                <input type="text" id="color" name="color" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="maxbreden"> 最大承重 </label>
            <div class="controls">
                <input type="text" id="maxbreden" name="maxbreden" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="boxsize"> 包装箱尺寸 </label>
            <div class="controls">
                <input type="text" id="boxsize" name="boxsize" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="engine"> 发动机 </label>
            <div class="controls">
                <input type="text" id="engine" name="engine" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="charger"> 充电器 </label>
            <div class="controls">
                <input type="text" id="charger" name="charger" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="usetime"> 使用时间 </label>
            <div class="controls">
                <input type="text" id="usetime" name="usetime" class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="battery"> 电池 </label>
            <div class="controls">
                <input type="text" id="battery" name="battery" class='span3'>
            </div>
        </div>

        <div class="control-group">
			<label for="title" class="control-label">时间:</label>
			<div class="controls">
				<div class="input-append date timepicker">
					<input type="text" value="<?php echo date("Y-m-d H:i:s",set_value('timeline',now())); ?>" id="timeline" name="timeline" data-date-format="yyyy-mm-dd hh:ii:ss">
					<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</div>
		</div>

        <!-- 弹出 -->
        <div id="seo-modal" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3> <i class="fa fa-info-circle"></i><?php echo lang('seo') ?> </h3>
            </div>
            <div class="modal-body seamless">

                <div class="control-group">
                    <label for="title_seo" class="control-label"><?php echo lang('title_seo') ?></label>
                    <div class="controls">
                        <input type="text" id="title_seo" name="title_seo" x-webkit-speech>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="tags"><?php echo lang('tag') ?></label>
                    <div class="controls">
                        <input type="text" id="tags" name="tags">
                        <span class="help-inline">使用英文标点`,`隔开</span>
                    </div>
                </div>

                <div class="control-group">
                    <label for="intro"  class="control-label"><?php echo lang('intro') ?></label>
                    <div class="controls">
                        <textarea name="intro" rows='8' class='span4'></textarea>
                        <span class="help-inline"></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#"  data-dismiss="modal" aria-hidden="true" class="btn"><?php echo lang('close') ?></a>
            </div>
        </div>



        <div class="control-group uefull">
            <!-- <label class="control-label" for="content">内容</label> -->
            <!-- <textarea id="content" name="content" ></textarea> -->
            <!-- <span class="help-inline"></span> -->
        </div>

        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">pc版</a></li>
                <li><a href="#tab2" data-toggle="tab">手机版</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">列表<?php echo lang('photo') ?>：</label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="photo" class="form-upload" data-more="0" value="">
                                <input type="hidden" name="thumb" class="form-upload-thumb" value="">
                            </div>
                            <span>尺寸:280*280</span>
                        </div>
                    </div>
                    <div id="js-photo-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">大背景<?php echo lang('photo') ?>：</label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="bjimg" class="form-upload" data-more="1" value="">
                            </div>
                            <span>尺寸:1920*800</span>
                        </div>
                    </div>
                    <div id="js-bjimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">产品图展示<?php echo lang('photo') ?>：</label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="proimg" class="form-upload" data-more="0" value="">
                            </div>
                            <span>尺寸:977*910</span>
                        </div>
                    </div>
                    <div id="js-proimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">文字展示<?php echo lang('photo') ?>：</label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="wzimg" class="form-upload" data-more="0" value="">
                            </div>
                            <span>尺寸:338*189</span>
                        </div>
                    </div>
                    <div id="js-wzimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->
                </div>



                <!--第二屏-->
                <div class="tab-pane" id="tab2">

                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">列表<?php echo lang('photo') ?>：</label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="mphoto" class="form-upload" data-more="0" value="">

                            </div>
                            <span>尺寸:257*257</span>
                        </div>
                    </div>
                    <div id="js-mphoto-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->

                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">大背景<?php echo lang('photo') ?>：</label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="mbjimg" class="form-upload" data-more="1" value="">
                            </div>
                            <span>尺寸:750*907</span>
                        </div>
                    </div>
                    <div id="js-mbjimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">产品图展示<?php echo lang('photo') ?>：</label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="mproimg" class="form-upload" data-more="0" value="">
                            </div>
                            <span>尺寸:750*848</span>
                        </div>
                    </div>
                    <div id="js-mproimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->

                </div>
            </div>
        </div>



    </div>

    <div class="boxed-footer">
        <?php if ($this->ccid): ?>
            <input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
        <?php endif ?>
        <input type="hidden" name="cid" value="<?php echo $this->cid ?>">
        <input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
        <input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
    </div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
    require(['jquery','adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function($,ui,media){
        // timepick
    	$('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});
     // ui.editor_create('content');
      media.sort('bjimg');
  });
</script>
