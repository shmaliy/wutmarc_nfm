<?php $this->headTitle($this->item['title']); ?>
<?php $this->headTitle($this->category['title']); ?>
<?php $this->headTitle($this->root['title']); ?>
<div class="index-container">
	<div class="left">
		<h1>
			<?php echo $this->root['title']; ?> / 
			<?php echo $this->category['title']; ?> / 
			<?php echo $this->item['title']; ?>
		</h1>
		<div class="good-item-text">
			<?php if ($this->item['image'] != '') : ?>
				<img src = "<?php echo $this->item['image']?>" class="good-item-image">
			<?php endif; ?>
			<?php echo $this->item['fulltext']; ?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('last-news', 'new-index', 'content'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
	
</div>