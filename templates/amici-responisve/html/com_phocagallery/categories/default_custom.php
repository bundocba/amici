<div id="phocagallery-categories">
	<div id='span_height'></div>
	<h1 class='page_heading'>Gallery</h1>
	<div class='wrap_slider'>
		<div class='bound_center_min'>
			<div class='slider_cate_gallery'>

<div class="wrap_slide_outclient">

	<div id="slide_outclient">
		<ul>
			
						<?php 
						for ($i = 0; $i < $this->tmpl['countcategories']; $i=$i+4) {
						?>							
							<li>
								<table class="tb_phoca">
									<tr>
										<td>
											<div class='bound'>
												<a href="<?php echo $this->categories[$i]->link; ?>">
												<img src='<?php echo  JURI::root().'images/phocagallery/'.$this->categories[$i]->filename; ?>' /></a>
												<a class='title' href="<?php echo $this->categories[$i]->link; ?>"><?php echo $this->categories[$i]->title_self; ?></a>
											</div>
										</td>
										<td>
										<?php if($this->categories[$i+1]): ?>
											<div class='bound'>
												<a href="<?php echo $this->categories[$i+1]->link; ?>">
												<img src='<?php echo  JURI::root().'images/phocagallery/'.$this->categories[$i+1]->filename; ?>' /></a>
												<a class='title' href="<?php echo $this->categories[$i+1]->link; ?>"><?php echo $this->categories[$i+1]->title_self; ?></a>
											</div>
										<?php endif;?>
										</td>
									</tr>
								</table>
								<table class="tb_phoca">
									<tr>
										<td>
										<?php if($this->categories[$i+2]): ?>
											<div class='bound'>
												<a href="<?php echo $this->categories[$i+2]->link; ?>">
												<img src='<?php echo  JURI::root().'images/phocagallery/'.$this->categories[$i+2]->filename; ?>' /></a>
												<a class='title' href="<?php echo $this->categories[$i+2]->link; ?>"><?php echo $this->categories[$i+2]->title_self; ?></a>
											</div>
										<?php endif;?>
										</td>
										<td>
											<?php if($this->categories[$i+3]): ?>
											<div class='bound'>
												<a href="<?php echo $this->categories[$i+3]->link; ?>">
												<img src='<?php echo  JURI::root().'images/phocagallery/'.$this->categories[$i+3]->filename; ?>' /></a>
												<a class='title' href="<?php echo $this->categories[$i+3]->link; ?>"><?php echo $this->categories[$i+3]->title_self; ?></a>
											</div>
											<?php endif;?>	
										</td>
									</tr>
								</table>								
							</li>							
					<?php 
					} ?>
			
		</ul>
	</div>
	<button class="prev button"></button>
	<button class="next button"></button>
	<div class="clear">
		&nbsp;</div>
</div>
			</div>
		</div>
	</div>
</div>
