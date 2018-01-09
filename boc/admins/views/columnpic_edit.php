
<div class="btn-group">
	<a href="<?=site_urlc($this->class.'/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
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

		<?php if($this->cid==13){ ?>
			<div class="control-group">
                <label class="control-label" for="title_en">英文标题</label>
                <div class="controls">
                    <input type="text" id="title_en" name="title_en" value="<?php echo set_value('title_en',$it['title_en']) ?>">
                </div>
            </div>						
		<?php } ?>

		<?php if($this->cid != 21){ ?>
			<div class="control-group">
                <label class="control-label" for="links">链接</label>
                <div class="controls">
                    <input type="text" id="links" name="links" value="<?php echo set_value('links',$it['links']) ?>">
                </div>
            </div>			
		<?php } ?>

			<?php if($this->cid == 21){ ?>
				
				<!-- ctype -->
				<div class="control-group">
					<label class="control-label" for="status"> 所属分类:</label>
					<div class="controls">
						<?php
						echo ui_btn_select('ctype',set_value("ctype",$it['ctype']),$alml);
						?>
						<span class="help-inline"></span>
					</div>
				</div>			

			<?php } ?>	


	<?php if($this->cid == 14 || $this->cid == 16){ ?>
			<div class="control-group">
				<label for="introduction"  class="control-label">简介内容</label>
				<div class="controls">
					<textarea name="introduction" rows='8' class='span4'> <?php echo set_value('introduction',$it['introduction']) ?> </textarea>
					<span class="help-inline"></span>
				</div>
			</div>		
	<?php } ?>		

			


			<?php if($this->cid==25 || $this->cid==27){ ?>
			<div class="control-group">
                <label class="control-label" for="mlinks">手机版链接</label>
                <div class="controls">
                    <input type="text" id="mlinks" name="mlinks" value="<?php echo set_value('mlinks',$it['mlinks']) ?>">
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

			<!-- 图片上传 -->
			<div class="control-group">
				<label for="img" class="control-label">图片：</label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> 图片尺寸 </span>
							<input class="fileupload" type="file" accept="">
							<!-- <input class="fileupload" type="file"  accept="" multiple=""> -->
						</span>
						<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo $it['photo'] ?>">
						<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
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
				<!-- 模板 #tpl-img-list -->
			</div>
			<div class="clear"></div>



			<?php if ($this->cid==9 || $this->cid==25 || $this->cid==1): ?>
				<!-- 图片上传 -->
				<div class="control-group">
					<label for="img" class="control-label">手机端图片：</label>
					<div class="controls">
						<div class="btn-group">
							<span class="btn btn-success">
								<i class="fa fa-upload"></i>
								<span> 图片尺寸 </span>
								<input class="fileupload" type="file" accept="">
								<!-- <input class="fileupload" type="file"  accept="" multiple=""> -->
							</span>
							<input type="hidden" name="mphoto" class="form-upload" data-more="0" value="<?php echo $it['mphoto'] ?>">

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
					<!-- 模板 #tpl-img-list -->
				</div>
				<div class="clear"></div>

			<?php endif; ?>




		<!-- 图片上传 -->
		<?php if ($this->cid==13): ?>
			<div class="control-group">
				<label for="img" class="control-label">视频：</label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<input class="fileupload" type="file" accept="">
							<!-- <input class="fileupload" type="file"  accept="" multiple=""> -->
						</span>
						<input type="hidden" name="video" class="form-upload" data-more="0" value="<?php echo $it['video'] ?>">
					</div>
					<span>MP4 视频不要超过2M</span>
				</div>
			</div>

			<div id="js-video-show" class="js-img-list-f">
				<!-- 模板 #tpl-img-list -->
			</div>
			<div class="clear"></div>		
		<?php endif; ?>	




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
<script type="text/javascript">
	require(['adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function(ui,media){
		media.init();

		var articles_photos = <?php echo json_encode(one_upload($it['photo'])) ?>;
		media.show(articles_photos,"photo");

		var articles_pics = <?php echo json_encode(one_upload($it['pic'])) ?>;
		media.show(articles_pics,"pic");

		var articles_mphotos = <?php echo json_encode(one_upload($it['mphoto'])) ?>;
		media.show(articles_mphotos,"mphoto");

		var articles_videos = <?php echo json_encode(one_upload($it['video'])) ?>;
		media.show(articles_videos,"video");		

	});
</script>
