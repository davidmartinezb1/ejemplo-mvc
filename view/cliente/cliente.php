
<section id="gr-ciudad">  
    <h2>Estadísticas</h2> 
    <hr>
    <?php 
        require_once 'grafica-pais.php'; 
        require_once 'grafica-departamento.php'; 
        require_once 'grafica-ciudad.php'; 
    ?>
</section>

<section id="table">

    <h1 class="page-header">Cliente</h1>

    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="?c=Cliente&a=Crud">Nuevo cliente</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th id="id_cliente">Id</th>
                <th id="cc">Cédula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th id="clsPais" >País</th>
                <th id="clsDpto" >Departamento</th>
                <th id="clsCiudad" >Ciudad</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($this->model->Listar() as $r){ ?>
            <tr>
                <td><?php print $r->Id; ?></td>
                <td><?php print $r->Cedula; ?></td>
                <td><?php print $r->Nombre; ?></td>
                <td><?php print $r->Apellidos; ?></td>
                <td><?php print $r->Direccion; ?></td>
                <td><?php print $r->Pais; ?></td>
                <td><?php print $r->Departamento; ?></td>
                <td><?php print $r->Ciudad; ?></td>
                <td>
                    <a href="?c=Cliente&a=Crud&Id=<?php print $r->Id; ?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Desea eliminar este cliente?');" href="?c=Cliente&a=Eliminar&Id=<?php print $r->Id; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</section> 
 
