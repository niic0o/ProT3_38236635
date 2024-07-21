<!-- inicio de contenido-->
    <section>
        <div class="centrado">
            <p class="texto2">Comprometidos con el cuidado del medio ambiente. El menor precio del mercado y la mejor calidad.</p>
            <p class="supertitulo">Los mejores artículos para tu huerta o jardín</p>

        </div>
    </section>
    <!-- carrousel clase basic tiene estilos propios de imagen-->

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="<?php echo base_url('assets/img/vivero1carrusel.jpg');?>" class="d-block w-100 basic" alt="Imagen del vivero 1">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/persona2.jpg');?>" class="d-block w-100 basic" alt="Imagen de persona 2">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/vivero2carrusel.jpg');?>" class="d-block w-100 basic" alt="Imagen del vivero 2">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/persona1.jpg');?>" class="d-block w-100 basic" alt="Imagen de persona 1">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/contenido4.jpg');?>" class="d-block w-100 basic" alt="Imagen de vivero 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
 </div>

 <div class="text-center mb-5">
 <a href="<?php echo base_url('catalogo');?>">
  <button class="btn btn-success btn-lg btn-comprar supertitulo focus">Comprar</button>
</a>
</div>
<!-- fin de cuerpo-->