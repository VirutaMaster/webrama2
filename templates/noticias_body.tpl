<div class="row">
  <div class="jumbotron home">
    <h1>Novedades</h1>
  </div>
{foreach from=$noticias item=noticia}
<article class="noticia col-md-6">
  <div class="art-head">
    <h2>{$noticia['titulo']}</h2>
    <p>{$noticia['fecha']}</p>
    <hr>
    <figure class="news-fig">
      <img src="{$noticia['imgsrc']}" alt="Carpa Doite" />
      <figcaption>Imagen Descriptiva</figcaption>
    </figure>
    <p>{$noticia['cuerpo']}</p>

  </div>
</article>
{/foreach}
</div>
