
<div class="btn-group"><a href="<?php echo site_urlc('product/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
    <h3> <i class="fa fa-pencil"></i> <?php echo lang('edit') ?> <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
    <?php echo form_open(current_urlc(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

    <div class="boxed-inner seamless">

        <div class="control-group">
            <label for="title" class="control-label"><?php echo lang('title') ?>:</label>
            <div class="controls">
                <input type="text" name="title" id="title" value="<?php echo set_value('title',$it['title']); ?>"  class='span4'>
                <a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal"><?php echo lang('seo') ?></a>
                <span class="help-inline"></span>
            </div>
        </div>


        <!-- ctype -->
		<?php if ($ctype = list_coltypes($this->cid)) { ?>
		<div class="control-group">
			<label class="control-label" for="status"> 所属分类:</label>
			<div class="controls">
				<?php
				echo ui_btn_select('ctype',set_value("ctype",$it['ctype']),$ctype);
				?>
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>


        <div class="control-group">
            <label for="size" class="control-label">产品尺寸:</label>
            <div class="controls">
                <input type="text" name="size" id="size" value="<?php echo set_value('size',$it['size']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
            <label for="model" class="control-label">产品型号:</label>
            <div class="controls">
                <input type="text" name="model" id="model" value="<?php echo set_value('model',$it['model']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
            <label for="speed" class="control-label">速度:</label>
            <div class="controls">
                <input type="text" name="speed" id="speed" value="<?php echo set_value('speed',$it['speed']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
            <label for="age" class="control-label">适用年龄:</label>
            <div class="controls">
                <input type="text" name="age" id="age" value="<?php echo set_value('age',$it['age']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
            <label for="color" class="control-label">颜色:</label>
            <div class="controls">
                <input type="text" name="color" id="color" value="<?php echo set_value('color',$it['color']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
            <label for="maxbreden" class="control-label">最大承重:</label>
            <div class="controls">
                <input type="text" name="maxbreden" id="maxbreden" value="<?php echo set_value('maxbreden',$it['maxbreden']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
            <label for="boxsize" class="control-label">包装箱尺寸:</label>
            <div class="controls">
                <input type="text" name="boxsize" id="boxsize" value="<?php echo set_value('boxsize',$it['boxsize']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
            <label for="engine" class="control-label">发动机:</label>
            <div class="controls">
                <input type="text" name="engine" id="engine" value="<?php echo set_value('engine',$it['engine']); ?>"  class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label for="charger" class="control-label">充电器:</label>
            <div class="controls">
                <input type="text" name="charger" id="charger" value="<?php echo set_value('charger',$it['charger']); ?>"  class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label for="usetime" class="control-label">使用时间:</label>
            <div class="controls">
                <input type="text" name="usetime" id="usetime" value="<?php echo set_value('usetime',$it['usetime']); ?>"  class='span3'>
            </div>
        </div>

        <div class="control-group">
            <label for="battery" class="control-label">电池:</label>
            <div class="controls">
                <input type="text" name="battery" id="battery" value="<?php echo set_value('battery',$it['battery']); ?>"  class='span3'>
            </div>
        </div>


        <div class="control-group">
			<label for="title" class="control-label">时间:</label>
			<div class="controls">
				<div class="input-append date timepicker">
					<input type="text" value="<?php echo date("Y/m/d H:i:s",set_value('timeline',$it['timeline'])); ?>" id="timeline" name="timeline">
					<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</div>
		</div>

        <!-- 弹出 -->
        <div id="seo-modal" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3> <i class="fa fa-info-circle"></i> <?php echo lang('seo') ?></h3>
            </div>
            <div class="modal-body seamless">

                <div class="control-group">
                    <label for="title_seo" class="control-label"><?php echo lang('title_seo') ?></label>
                    <div class="controls">
                        <input type="text" id="title_seo" name="title_seo" value="<?php echo set_value('title_seo',$it['title_seo']) ?>" x-webkit-speech>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="tag"><?php echo lang('tag') ?></label>
                    <div class="controls">
                        <input type="text" id="tags" name="tags" value="<?php echo set_value('tags',$it['tags']) ?>" placeholder="tag1,tag2">
                        <span class="help-inline">使用英文标点`,`隔开</span>
                    </div>
                </div>

                <div class="control-group">
                    <label for="intro"  class="control-label"><?php echo lang('intro') ?></label>
                    <div class="controls">
                        <textarea name="intro" rows='8' class='span4'><?php echo set_value('intro',$it['intro']) ?></textarea>
                        <span class="help-inline"></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#"  data-dismiss="modal" aria-hidden="true" class="btn">Close</a>
            </div>
        </div>


        <!-- <div class="control-group uefull">
            <textarea id="editor_id" name="content"> <?php //echo set_value('content',$it['content']); ?></textarea>
        </div> -->



        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">pc版</a></li>
                <li><a href="#tab2" data-toggle="tab">手机版</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">列表<?php echo lang('photo') ?></label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo $it['photo'] ?>">
                                <input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
                            </div>
                            <span>尺寸:280*280</span>
                        </div>
                    </div>
                    <div id="js-photo-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">大背景<?php echo lang('photo') ?></label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="bjimg" class="form-upload" data-more="1" value="<?php echo $it['bjimg'] ?>">
                            </div>
                            <span>尺寸:1920*800</span>
                        </div>
                    </div>
                    <div id="js-bjimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">产品图展示<?php echo lang('photo') ?></label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="proimg" class="form-upload" data-more="0" value="<?php echo $it['proimg'] ?>">
                            </div>
                            <span>尺寸:977*910</span>
                        </div>
                    </div>
                    <div id="js-proimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">文字展示<?php echo lang('photo') ?></label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="wzimg" class="form-upload" data-more="0" value="<?php echo $it['wzimg'] ?>">
                            </div>
                            <span>尺寸:338*189</span>
                        </div>
                    </div>
                    <div id="js-wzimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->
                </div>
                <div class="tab-pane" id="tab2">

                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">列表<?php echo lang('photo') ?></label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="mphoto" class="form-upload" data-more="0" value="<?php echo $it['mphoto'] ?>">

                            </div>
                            <span>尺寸:257*257</span>
                        </div>
                    </div>
                    <div id="js-mphoto-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->

                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">大背景<?php echo lang('photo') ?></label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="mbjimg" class="form-upload" data-more="1" value="<?php echo $it['mbjimg'] ?>">
                            </div>
                            <span>尺寸:750*907</span>
                        </div>
                    </div>
                    <div id="js-mbjimg-show" class="js-img-list-f"></div>
                    <div class="clear"></div>
                    <!-- 图片上传 -->


                    <!-- 图片上传 -->
                    <div class="control-group">
                        <label for="img" class="control-label">产品图展示<?php echo lang('photo') ?></label>
                        <div class="controls">
                            <div class="btn-group">
                                <span class="btn btn-success">
                                    <i class="fa fa-upload"></i>
                                    <span> <?php echo lang('upload_file') ?> </span>
                                    <input class="fileupload" type="file"  accept="" multiple="">
                                </span>
                                <input type="hidden" name="mproimg" class="form-upload" data-more="0" value="<?php echo $it['mproimg'] ?>">
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
        <input type="hidden" name="id" value="<?php echo $it['id']?>">
        <input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
        <input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
    </div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
    require(['jquery','adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function($,ui,media){
        //ui.editor_create('editor_id');
        $('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});
		//console.log(ui);
        media.init();
        var product_photos = <?php echo json_encode(one_upload(set_value('photo',$it['photo']))) ?>;
        media.show(product_photos,'photo');

        var product_bjimgs = <?php echo json_encode(list_upload(set_value('bjimg',$it['bjimg']))) ?>;
        media.show(product_bjimgs,'bjimg');
        media.sort('bjimg');

        var product_proimgs = <?php echo json_encode(one_upload(set_value('proimg',$it['proimg']))) ?>;
        media.show(product_proimgs,'proimg');

        var product_wzimgs = <?php echo json_encode(one_upload(set_value('wzimg',$it['wzimg']))) ?>;
        media.show(product_wzimgs,'wzimg');

        var product_mphotos = <?php echo json_encode(one_upload(set_value('mphoto',$it['mphoto']))) ?>;
        media.show(product_mphotos,'mphoto');

        var product_mbjimgs = <?php echo json_encode(list_upload(set_value('mbjimg',$it['mbjimg']))) ?>;
        media.show(product_mbjimgs,'mbjimg');
        media.sort('mbjimg');

        var product_mproimgs = <?php echo json_encode(one_upload(set_value('mproimg',$it['mproimg']))) ?>;
        media.show(product_mproimgs,'mproimg');
    });
</script>
