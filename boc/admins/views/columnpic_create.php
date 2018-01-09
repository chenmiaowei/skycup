<div class="btn-group">
	<a href="<?=site_urlc($this->class.'/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list') ?></a>
</div>

<?php include_once 'inc_form_errors.php'; ?>
<div class="boxed">

	<h3> <?php echo lang('create') ?> <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

		<div class="boxed-inner seamless">
			<div class="control-group">
				<label class="control-label" for="title"><?php echo lang('title') ?></label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title') ?>">
					<a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">SEO</a>
					<span class="help-inline"></span>
				</div>
			</div>
			
		<?php if($this->cid==13){ ?>
			<div class="control-group">
                <label class="control-label" for="title_en">英文标题</label>
                <div class="controls">
                    <input type="text" id="title_en" name="title_en">
                </div>
            </div>
        <?php } ?>


	<?php if($this->cid == 14 || $this->cid == 16){ ?>
			<div class="control-group">
				<label for="introduction"  class="control-label">简介内容</label>
				<div class="controls">
					<textarea name="introduction" rows='8' class='span4'> <?php echo set_value('introduction') ?> </textarea>
					<span class="help-inline"></span>
				</div>
			</div>		
	<?php } ?>        	
		
		<?php if($this->cid != 21){ ?>
			<div class="control-group">
                <label class="control-label" for="links">链接</label>
                <div class="controls">
                    <input type="text" id="links" name="links">
                </div>
            </div>
		<?php } ?>

			<?php if($this->cid==25 || $this->cid==27){ ?>
			<div class="control-group">
                <label class="control-label" for="mlinks">手机版链接</label>
                <div class="controls">
                    <input type="text" id="mlinks" name="mlinks">
                </div>
            </div>
			<?php } ?>

			<?php if($this->cid == 21){ ?>
				
				<!-- ctype -->
				<div class="control-group">
					<label class="control-label" for="status"> 所属分类:</label>
					<div class="controls">
						<?php
						echo ui_btn_select('ctype',set_value("ctype"),$alml);
						?>
						<span class="help-inline"></span>
					</div>
				</div>			

			<?php } ?>


			<!-- 弹出 -->
			<div id="seo-modal" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="fa fa-times"></i> </button>
					<h3> <i class="fa fa-info-circle"></i> <?php echo lang('seo') ?> </h3>
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
						<label class="control-label" for="tag"><?php echo lang('tag') ?></label>
						<div class="controls">
							<input type="text" id="tags" name="tags"  placeholder="tag1,tag2">
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

			<!-- 图片上传 -->
			<div class="control-group">
				<label for="img" class="control-label"><?php echo lang('photo') ?>：</label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="">
						</span>
						<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value("photo") ?>">
						<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value("thumb") ?>">
					</div>
					<?php if($this->cid==13){ ?>
						<span>图片尺寸[1920*1014]像素</span>
					<?php }elseif($this->cid==14){ ?>
						<span>图片尺寸[1021*588]像素</span>
					<?php }elseif($this->cid==15){ ?>
						<span>图片尺寸[480*490]像素</span>
					<?php }elseif($this->cid==16){ ?>
						<span>图片尺寸[960*490]像素</span>
					<?php }elseif($this->cid==21){ ?>
						<span>图片尺寸[1920*880]像素</span>					
					<?php } ?>

				</div>
			</div>
			<div id="js-photo-show" class="js-img-list-f">
			</div>
			<div class="clear"></div>
			<!-- 图片上传 -->




			<?php if ($this->cid==9 || $this->cid==25 || $this->cid==1): ?>
				<!-- 图片上传 -->
				<div class="control-group">
					<label for="img" class="control-label">手机版<?php echo lang('photo') ?>：</label>
					<div class="controls">
						<div class="btn-group">
							<span class="btn btn-success">
								<i class="fa fa-upload"></i>
								<span> <?php echo lang('upload_file') ?> </span>
								<input class="fileupload" type="file" accept="">
							</span>
							<input type="hidden" name="mphoto" class="form-upload" data-more="0" value="<?php echo set_value("mphoto") ?>">

						</div>
					<?php if($this->cid==9){ ?>
						<span>图片尺寸[750*1530]像素</span>
					<?php }elseif($this->cid==25){ ?>
						<span>图片尺寸[750*1030]像素</span>
					<?php }elseif($this->cid==1){ ?>
						<span>图片尺寸[750*800]像素</span>
					<?php } ?>
					</div>
				</div>
				<div id="js-mphoto-show" class="js-img-list-f">
				</div>
				<div class="clear"></div>
				<!-- 图片上传 -->
			<?php endif; ?>


		<?php if ($this->cid==13): ?>
			<!-- 图片上传 -->
			<div class="control-group">
				<label for="img" class="control-label">视频：</label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="">
						</span>
						<input type="hidden" name="video" class="form-upload" data-more="0" value="<?php echo set_value("video") ?>">
						
					</div>
					<span>MP4 视频不要超过2M</span>

				</div>
			</div>
			<div id="js-video-show" class="js-img-list-f">
			</div>
			<div class="clear"></div>
			<!-- 图片上传 -->			
		<?php endif; ?>



		</div>
		<!-- end less -->

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
	require(['adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function(ui,media){
	// media 上传
	media.init();
});

</script>
