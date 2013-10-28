<ul id="menu" class="sf-menu">
    <li><a href="/">Inicio</a></li>
    <?php if ($this->Session->read('Auth.User')) { ?>
        <li>
            <a href="/admin/barcodes">Códigos de barra</a>
            <ul>
                <li><a href="/admin/barcodes/add">Agregar</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/names">Colores</a>
            <ul>
                <li><a href="/admin/names/add">Agregar</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/sizes">Tamaños</a>
            <ul>
                <li><a href="/admin/sizes/add">Agregar</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/logs">Registros</a>
        </li>
        <li><a href="/admin/users/logout">Cerrar Sesión</a></li>
    <?php } else { ?>
        <li><a href="/admin/users/login">Iniciar Sesión</a></li>
    <?php } ?>
</ul>