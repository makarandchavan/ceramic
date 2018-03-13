<span class="header__cart__indicator hidden-xs"></span>
<div class="dropdown pull-right"><a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown"><span class="icon icon-bag-alt"></span><span class="badge badge--menu"></span></a>
  <div class="dropdown-menu animated fadeIn shopping-cart" role="menu">
    <div class="shopping-cart__settings"><a href="#" class="icon icon-gear"></a></div>
    <div class="shopping-cart__top-done shopping-cart__top text-uppercase"></div>
    <div class="wrapper-done-header-cart">
      <?php if($rows) print $rows; ?>
    </div>
  </div>
</div>
