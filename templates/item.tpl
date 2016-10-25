{foreach from=$producto item=product}
  <div class="row productos">
  	<div class="jumbotron productos">
  		<h1>Productos</h1>
  		<p>{$product['nombre']}</p>
  	</div>
  </div>
  <div class="row">
          {foreach from=$imagenes item=imagen}
          <div class="col-sm-3 col-md-3">
            <img src="{$imagen['imgsrc']}" alt="" class="img-thumbnail"/>
          </div>
          {/foreach}
  </div>
  <div class="row">
    <div class="well well-lg" style="margin-top:30px;">
  				<p>{$product['nombre']}</p>
  				<p>Precio: $ <span class="precio">{$product['precio']}</span></p>
          <p>Descripcion: {$product['descripcion']}</p>
    </div>
  </div>
  {/foreach}
