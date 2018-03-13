
<?php if($view->current_display == 'fashion_shop_catalog'){ ?>
<?php 
	$products_listing = theme_get_setting('fashion_products_listing', 'done');
	if(empty($products_listing)){
		$products_listing = 'style1';
	}
	if($products_listing == 'style1'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style2'){
		$class_add = 'two-in-row';
	}elseif($products_listing == 'style3'){
		$class_add = 'three-in-row';
	}elseif($products_listing == 'style4'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style5'){
		$class_add = 'five-in-row';
	}elseif($products_listing == 'style6'){
		$class_add = 'six-in-row';
	}
	$filter = theme_get_setting('fashion_filter', 'done');
	if(empty($filter)){
		$filter = 'off';
	}
	if($filter == 'on'){
		$filter_class = ' open';
	}else{
		$filter_class = '';
	}
 ?>

<div class="filters-row row">
	<div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
	<div class="col-sm-8 col-md-7 col-lg-6 col-2">
	</div>
	<div class="col-lg-3 visible-lg col-3">
		<?php if($pager) print $pager; ?>
	</div>
</div>
<div class="outer<?php print $filter_class; ?>">
	<div id="leftCol">
		<div id="filtersCol" class="filters-col">
			<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
			
			<?php print $exposed; ?>

		</div>
	</div>
	<div id="centerCol">
		<div class="products-grid products-listing products-col products-isotope <?php print $class_add; ?>">
			<?php if($rows) print $rows; ?>
		</div>
	</div>
</div>
<div class="hidden-lg text-center">
	<div class="divider divider--sm"></div>
	<?php if($pager) print $pager; ?>
</div>

<?php }elseif($view->current_display == 'flowers_shop_catalog'){ ?>
<?php 
	$products_listing = theme_get_setting('flower_products_listing', 'done');
	if(empty($products_listing)){
		$products_listing = 'style1';
	}
	if($products_listing == 'style1'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style2'){
		$class_add = 'two-in-row';
	}elseif($products_listing == 'style3'){
		$class_add = 'three-in-row';
	}elseif($products_listing == 'style4'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style5'){
		$class_add = 'five-in-row';
	}elseif($products_listing == 'style6'){
		$class_add = 'six-in-row';
	}
	$filter = theme_get_setting('flower_filter', 'done');
	if(empty($filter)){
		$filter = 'off';
	}
	if($filter == 'on'){
		$filter_class = ' open';
	}else{
		$filter_class = '';
	}
 ?>


<div class="filters-row row">
	<div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
	<div class="col-sm-8 col-md-7 col-lg-6 col-2">
	</div>
	<div class="col-lg-3 visible-lg col-3">
		<?php if($pager) print $pager; ?>
	</div>
</div>
<div class="outer<?php print $filter_class ?>">
	<div id="leftCol">
		<div id="filtersCol" class="filters-col">
			<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
			
			<?php print $exposed; ?>

		</div>
	</div>
	<div id="centerCol">
		<div class="products-grid products-listing products-col products-isotope <?php print $class_add; ?>">
			<?php if($rows) print $rows; ?>
		</div>
	</div>
</div>
<div class="hidden-lg text-center">
	<div class="divider divider--sm"></div>
	<?php if($pager) print $pager; ?>
</div>

<?php }elseif($view->current_display == 'ishop_shop_catalog'){ ?>
<?php 
	$products_listing = theme_get_setting('ishop_products_listing', 'done');
	if(empty($products_listing)){
		$products_listing = 'style1';
	}
	if($products_listing == 'style1'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style2'){
		$class_add = 'two-in-row';
	}elseif($products_listing == 'style3'){
		$class_add = 'three-in-row';
	}elseif($products_listing == 'style4'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style5'){
		$class_add = 'five-in-row';
	}elseif($products_listing == 'style6'){
		$class_add = 'six-in-row';
	}
	$filter = theme_get_setting('ishop_filter', 'done');
	if(empty($filter)){
		$filter = 'off';
	}
	if($filter == 'on'){
		$filter_class = ' open';
	}else{
		$filter_class = '';
	}
 ?>

<div class="filters-row row">
	<div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
	<div class="col-sm-8 col-md-7 col-lg-6 col-2">
	</div>
	<div class="col-lg-3 visible-lg col-3">
		<?php if($pager) print $pager; ?>
	</div>
</div>
<div class="outer<?php print $filter_class; ?>">
	<div id="leftCol">
		<div id="filtersCol" class="filters-col">
			<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
			
			<?php print $exposed; ?>

		</div>
	</div>
	<div id="centerCol">
		<div class="products-grid products-listing products-col products-isotope <?php print $class_add; ?>">
			<?php if($rows) print $rows; ?>
		</div>
	</div>
</div>
<div class="hidden-lg text-center">
	<div class="divider divider--sm"></div>
	<?php if($pager) print $pager; ?>
</div>

<?php }elseif($view->current_display == 'toys_shop_catalog'){ ?>
<?php 
	$products_listing = theme_get_setting('toys_products_listing', 'done');
	if(empty($products_listing)){
		$products_listing = 'style1';
	}
	if($products_listing == 'style1'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style2'){
		$class_add = 'two-in-row';
	}elseif($products_listing == 'style3'){
		$class_add = 'three-in-row';
	}elseif($products_listing == 'style4'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style5'){
		$class_add = 'five-in-row';
	}elseif($products_listing == 'style6'){
		$class_add = 'six-in-row';
	}
	$filter = theme_get_setting('toys_filter', 'done');
	if(empty($filter)){
		$filter = 'off';
	}
	if($filter == 'on'){
		$filter_class = ' open';
	}else{
		$filter_class = '';
	}
 ?>

<div class="filters-row row">
	<div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
	<div class="col-sm-8 col-md-7 col-lg-6 col-2">
	</div>
	<div class="col-lg-3 visible-lg col-3">
		<?php if($pager) print $pager; ?>
	</div>
</div>
<div class="outer<?php print $filter_class; ?>">
	<div id="leftCol">
		<div id="filtersCol" class="filters-col">
			<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
			
			<?php print $exposed; ?>

		</div>
	</div>
	<div id="centerCol">
		<div class="products-grid products-listing products-col products-isotope <?php print $class_add; ?>">
			<?php if($rows) print $rows; ?>
		</div>
	</div>
</div>
<div class="hidden-lg text-center">
	<div class="divider divider--sm"></div>
	<?php if($pager) print $pager; ?>
</div>

<?php }elseif($view->current_display == 'swimwear_shop_catalog'){ ?>
<?php 
	$products_listing = theme_get_setting('swimwear_products_listing', 'done');
	if(empty($products_listing)){
		$products_listing = 'style1';
	}
	if($products_listing == 'style1'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style2'){
		$class_add = 'two-in-row';
	}elseif($products_listing == 'style3'){
		$class_add = 'three-in-row';
	}elseif($products_listing == 'style4'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style5'){
		$class_add = 'five-in-row';
	}elseif($products_listing == 'style6'){
		$class_add = 'six-in-row';
	}
	$filter = theme_get_setting('swimwear_filter', 'done');
	if(empty($filter)){
		$filter = 'off';
	}
	if($filter == 'on'){
		$filter_class = ' open';
	}else{
		$filter_class = '';
	}
 ?>


<div class="filters-row row">
	<div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
	<div class="col-sm-8 col-md-7 col-lg-6 col-2">
	</div>
	<div class="col-lg-3 visible-lg col-3">
		<?php if($pager) print $pager; ?>
	</div>
</div>
<div class="outer<?php print $filter_class; ?>">
	<div id="leftCol">
		<div id="filtersCol" class="filters-col">
			<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
			
			<?php print $exposed; ?>

		</div>
	</div>
	<div id="centerCol">
		<div class="products-grid products-listing products-col products-isotope <?php print $class_add; ?>">
			<?php if($rows) print $rows; ?>
		</div>
	</div>
</div>
<div class="hidden-lg text-center">
	<div class="divider divider--sm"></div>
	<?php if($pager) print $pager; ?>
</div>

<?php }elseif($view->current_display == 'sport_shop_catalog'){ ?>
<?php 
	$products_listing = theme_get_setting('sport_products_listing', 'done');
	if(empty($products_listing)){
		$products_listing = 'style1';
	}
	if($products_listing == 'style1'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style2'){
		$class_add = 'two-in-row';
	}elseif($products_listing == 'style3'){
		$class_add = 'three-in-row';
	}elseif($products_listing == 'style4'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style5'){
		$class_add = 'five-in-row';
	}elseif($products_listing == 'style6'){
		$class_add = 'six-in-row';
	}
	$filter = theme_get_setting('sport_filter', 'done');
	if(empty($filter)){
		$filter = 'off';
	}
	if($filter == 'on'){
		$filter_class = ' open';
	}else{
		$filter_class = '';
	}
 ?>


<div class="filters-row row">
	<div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
	<div class="col-sm-8 col-md-7 col-lg-6 col-2">
	</div>
	<div class="col-lg-3 visible-lg col-3">
		<?php if($pager) print $pager; ?>
	</div>
</div>
<div class="outer<?php print $filter_class; ?>">
	<div id="leftCol">
		<div id="filtersCol" class="filters-col">
			<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
			
			<?php print $exposed; ?>

		</div>
	</div>
	<div id="centerCol">
		<div class="products-grid products-listing products-col products-isotope <?php print $class_add; ?>">
			<?php if($rows) print $rows; ?>
		</div>
	</div>
</div>
<div class="hidden-lg text-center">
	<div class="divider divider--sm"></div>
	<?php if($pager) print $pager; ?>
</div>

<?php }elseif($view->current_display == 'medicine_shop_catalog'){ ?>
<?php 
	$products_listing = theme_get_setting('medicine_products_listing', 'done');
	if(empty($products_listing)){
		$products_listing = 'style1';
	}
	if($products_listing == 'style1'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style2'){
		$class_add = 'two-in-row';
	}elseif($products_listing == 'style3'){
		$class_add = 'three-in-row';
	}elseif($products_listing == 'style4'){
		$class_add = 'four-in-row';
	}elseif($products_listing == 'style5'){
		$class_add = 'five-in-row';
	}elseif($products_listing == 'style6'){
		$class_add = 'six-in-row';
	}
	$filter = theme_get_setting('medicine_filter', 'done');
	if(empty($filter)){
		$filter = 'off';
	}
	if($filter == 'on'){
		$filter_class = ' open';
	}else{
		$filter_class = '';
	}
 ?>

<div class="filters-row row">
	<div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
	<div class="col-sm-8 col-md-7 col-lg-6 col-2">
	</div>
	<div class="col-lg-3 visible-lg col-3">
		<?php if($pager) print $pager; ?>
	</div>
</div>
<div class="outer<?php print $filter_class; ?>">
	<div id="leftCol">
		<div id="filtersCol" class="filters-col">
			<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
			
			<?php print $exposed; ?>

		</div>
	</div>
	<div id="centerCol">
		<div class="products-grid products-listing products-col products-isotope <?php print $class_add; ?>">
			<?php if($rows) print $rows; ?>
		</div>
	</div>
</div>
<div class="hidden-lg text-center">
	<div class="divider divider--sm"></div>
	<?php if($pager) print $pager; ?>
</div>

<?php } ?>