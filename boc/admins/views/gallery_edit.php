
<div class="btn-group">
	<a href="<?php echo site_urlc($this->class.'/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">

	<h3> 添加 <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

		<div class="boxed-inner seamless">
			<div class="control-group">
				<label class="control-label" for="title">标题</label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title',$it['title']) ?>" x-webkit-speech>
					<a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">SEO</a>
					<span class="help-inline"></span>
				</div>
			</div>



			<?php if($this->cid==20){ ?>
			<div class="control-group">
				<label class="control-label" for="position">职位</label>
				<div class="controls">
					<input type="text" id="position" name="position" value="<?php echo set_value('position',$it['position']) ?>" placeholder="职位">
				</div>
			</div>
			<?php } ?>

            <?php if ($this->cid == 24) {
                $CI = get_instance();
                $CI->load->model('article_model', 'marticle');
                $newslist = $CI->marticle->get_list(1000, 0, false, array( 'cid' => 23), 'id,photo,title,timeline,ctype,introduction');
                ?>
                <div class="control-group">
                    <label class="control-label" for="status"> 所属图片文章:</label>
                    <div class="controls">
                        <?php
                        echo ui_btn_select('aid',set_value("aid"),$newslist);
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
            <?php } ?>

			<?php if($this->cid==26){ ?>
			<div class="control-group">
				<label class="control-label" for="title_en">英文名称</label>
				<div class="controls">
					<input type="text" id="title_en" name="title_en" value="<?php echo set_value('title_en',$it['title_en']) ?>" placeholder="英文名称" required>
				</div>
			</div>
			<?php } ?>


			<!-- ctype -->
			<?php if ($this->cid==26) { ?>
			<div class="control-group">
				<label class="control-label" for="status"> 所属分类:</label>
				<div class="controls">
					<?php
					echo ui_btn_select('ctype',set_value("ctype",$it['ctype']),$ctypex);
					?>
					<span class="help-inline"></span>
				</div>
			</div>
			<?php } ?>

			<!-- 弹出 -->
			<div id="seo-modal" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					<h3> <i class="fa fa-info-circle"></i> SEO优化</h3>
				</div>
				<div class="modal-body seamless">

					<div class="control-group">
						<label for="title_seo" class="control-label">标题优化</label>
						<div class="controls">
							<input type="text" id="title_seo" name="title_seo" value="<?php echo set_value('title_seo',$it['title_seo']) ?>" x-webkit-speech>
							<span class="help-inline"></span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="tag">标签</label>
						<div class="controls">
							<input type="text" id="tags" name="tags" value="<?php echo set_value('tags',$it['tags']) ?>" >
							<span class="help-inline">使用英文标点`,`隔开</span>
						</div>
					</div>

					<div class="control-group">
						<label for="intro"  class="control-label">简介</label>
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


	<?php if($this->cid == 20){ ?>
		<div class="control-group uefull">
			<textarea id="content" name="content"> <?php echo set_value('content',$it['content']); ?></textarea>
		</div>
	<?php } ?>			

			<!-- 图片上传 -->
			<div class="control-group">
				<label for="img" class="control-label"> 图片： </label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="" data-for="photo" multiple="multiple" >
						</span>
						<input type="hidden" id="photo" name="photo" class="form-upload" <?php if($this->cid==1){ ?>data-more='1'<?php }else{ ?>data-more='0'<?php } ?> value="<?php echo set_value('photo', $it['photo']) ?>">
						<input type="hidden" id="thumb" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb',$it['thumb']) ?>">
					</div>
					<?php if($this->cid==1){ ?>
						<span>尺寸:720*720 (可多图)</span>
					<?php }elseif($this->cid==20){ ?>
						<span>尺寸:480×510</span>
					<?php } ?>

				</div>
			</div>

			<div id="js-photo-show" class="js-img-list-f">
				<!-- 模板 #tpl-img-list -->
			</div>
			<div class="clear"></div>




			<?php if($this->cid==20){ ?>

				<!-- 图片上传 -->
				<div class="control-group">
					<label for="img" class="control-label"> 详情页图片 </label>
					<div class="controls">
						<div class="btn-group">
							<span class="btn btn-success">
								<i class="fa fa-upload"></i>
								<span> <?php echo lang('upload_file') ?> </span>
								<input class="fileupload" type="file" accept="" data-for="pic" multiple="multiple" >
							</span>
							<input type="hidden" id="pic" name="pic" class="form-upload" data-more='0' value="<?php echo set_value('pic', $it['pic']) ?>">
						</div>
						<span>尺寸:高度24像素，宽度不超过296像素</span>

					</div>
				</div>

				<div id="js-pic-show" class="js-img-list-f">
					<!-- 模板 #tpl-img-list -->
				</div>
				<div class="clear"></div>

			<?php } ?>


			<?php if($this->cid==1 || $this->cid==26){ ?>

				<!-- 图片上传 -->
				<div class="control-group">
					<label for="img" class="control-label"> 手机版图片： </label>
					<div class="controls">
						<div class="btn-group">
							<span class="btn btn-success">
								<i class="fa fa-upload"></i>
								<span> <?php echo lang('upload_file') ?> </span>
								<input class="fileupload" type="file" accept="" data-for="mphoto" multiple="multiple" >
							</span>
							<input type="hidden" id="mphoto" name="mphoto" class="form-upload" <?php if($this->cid==1){ ?>data-more='1'<?php }else{ ?>data-more='0'<?php } ?> value="<?php echo set_value('mphoto', $it['mphoto']) ?>">

						</div>
						<?php if($this->cid==1){ ?>
							<span>尺寸:319*319 (可多图)</span>
						<?php }elseif($this->cid==26){ ?>
							<span>尺寸:319*319 </span>
						<?php } ?>

					</div>
				</div>

				<div id="js-mphoto-show" class="js-img-list-f">
					<!-- 模板 #tpl-img-list -->
				</div>
				<div class="clear"></div>

			<?php } ?>




		</div>

		<div class="boxed-footer">
			<?php if ($this->ccid): ?>
			<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
			<?php endif ?>
			<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
			<input type="hidden" name="id" value="<?php echo $it['id'] ?>">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>

	</form>
</div>

<!-- 注意加载顺序 -->
<?php include_once 'inc_ui_media.php'; ?>
<script charset="utf-8">
require(['adminer/js/ui','adminer/js/media','tools'],function(ui,media){
	// 表单规则
	var rules = {
			title: {
					required:true,
					minlength:1
			}
	};
	console.log(ui);
	<?php if( $this->cid == 20){ ?>
	ui.editor_create('content');
	<?php } ?>


	media.init();
	var gallery_photos = <?php echo json_encode(one_upload(set_value('photo',$it['photo']))) ?>;
	media.show(gallery_photos,"photo");
	media.sort('photo');

	var gallery_pics = <?php echo json_encode(one_upload(set_value('pic',$it['pic']))) ?>;
	media.show(gallery_pics,"pic");
	

	
});
</script>
