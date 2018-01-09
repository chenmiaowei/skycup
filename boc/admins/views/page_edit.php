<?php include_once 'inc_modules_path.php'; ?>

<h3>  <i class="fa fa-pencil"></i>  <?php echo $title; ?></h3>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<?php echo form_open(site_urlc($this->class.'/edit'), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

		<input class="hide" type="text" id="p-title" name="title" value="<?php echo set_value('title',$seo['title']) ?>">
		<input class="hide" type="text" id="p-title_seo" name="title_seo" value="<?php echo set_value('title_seo',$seo['title_seo']) ?>">
		<input class="hide" type="text" id="p-tags" name="tags" value="<?php echo set_value('tags',$seo['tags']) ?>">
		<textarea class="hide" id='p-intro' name="intro" rows='8' class='span4'><?php echo set_value('intro',$seo['intro']) ?></textarea>

		<?php if ($this->cid == 19): ?>
			<div class="control-group">
				<label class="control-label" for="title">标题</label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title',$it['title']) ?>">
				</div>
			</div>			
		<?php endif ?>

		<div class="boxed-inner seamless">
			<div class="control-group uefull">
				<textarea id="editor_id" name="content" > <?php echo set_value('content',$it['content']); ?></textarea>
			</div>
	
	<?php if($this->cid != 17 and $this->cid != 19){ ?>
		<!-- 图片上传 -->
			<div class="control-group">
				<label for="img" class="control-label">图片：</label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="" data-for="photo" multiple="multiple">
						</span>
						<input type="hidden" name="photo" class="form-upload" data-more="1" value="<?php echo $it['photo'] ?>">
						<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
					</div>
					<?php if($this->cid==12){ ?>
						<span>尺寸:47*47</span>
					<?php }elseif($this->cid==21){ ?>
						<span>尺寸:400*545</span>
					<?php }elseif($this->cid==22){ ?>
						<span>尺寸:440*300</span>
					<?php } ?>
				</div>
			</div>

			<div id="js-photo-show" class="js-img-list-f">
				<!-- 模板 #tpl-img-list -->
			</div>

			<div class="clear"></div>

		</div>
	<?php } ?>

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
require(['jquery','adminer/js/ui','adminer/js/media'],function($,ui,media){
	ui.editor_create('editor_id');
	media.init();
	var page_photos = <?php echo json_encode(list_upload($it['photo'])) ?>;
	media.show(page_photos,'photo');
	media.sort('photo');

	$("#js-photo-show" ).sortable().disableSelection();
});
</script>
<?php //echo static_file('adminer/js/page.js'); ?>
