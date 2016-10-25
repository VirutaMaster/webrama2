  <div class="row productos">
  	<div class="jumbotron productos">
  		<h1>Productos</h1>
  		<p>Llevate todos los productos con la confianza de saber que pagas lo justo por la calidad.</p>
  	</div>
  </div>
  {foreach from=$productos item=producto}
  <div class="col-sm-4 col-md-3">
  	<div class="thumbnail well">
      <!-- METER LAS IMAGENES DE LOS PRODUCTOS ACA -->
  		<!-- <a class="prod-link" href="#"><img alt="" src="{$producto['imgsrc']}"></a> -->
      <a class="item-btn-desc" data-id-item="{$producto['id']}" href="#">
        {if $producto['imgsrc'] != ''}
          <img alt="" src="{$producto['imgsrc']}">
        {else}
          <img alt="" src="img/prods/default.jpg">
        {/if}
      </a>
  		<div class="caption">
  			<input class="compare-check" type="checkbox">
  			<a class="item-btn-desc" data-id-item="{$producto['id']}" href="#">
  			<!-- <a href="index.php?action=show_item&item={$producto['id']}"> -->
  				<p>{$producto['nombre']}</p>
  				<p>Precio: $ <span class="precio">{$producto['precio']}</span></p>
  			</a>
  		</div>
  	</div>
  </div>
  {/foreach}
