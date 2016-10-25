<div class="row">
  <div class="page-header">
    <h1>Administrador de Contenido</h1>
  </div>

<article class="noticia">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Categoria</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$productos item=producto}
        <tr>
          <td>{$producto['id']}</td>
          <td>{$producto['nombre']}</td>
          <td>{$producto['categoria']}</td>
          <td>{$producto['precio']}</td>
          <td>{$producto['stock']}</td>
          <td>
            <button class="btn btn-primary btn-xs edit-item glyphicon glyphicon-edit" type="button" data-id="{$producto['id']}"></button>
            <button class="btn btn-danger btn-xs del-item glyphicon glyphicon-trash" type="button" data-id="{$producto['id']}"></button>
          </td>
        </tr>
        {/foreach}
      </tbody>
    </table>
</article>

</div>
