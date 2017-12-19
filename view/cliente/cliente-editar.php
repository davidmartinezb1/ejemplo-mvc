<h1 class="page-header">
    <?php print $cl->Id != null ? $cl->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Cliente">Cliente</a></li>
  <li class="active"><?php print $cl->Id != null ? $cl->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="Id" value="<?php print $cl->Id; ?>" />
    
    <div class="form-group">
        <label>Cedula</label>
        <input type="number" name="Cedula" value="<?php print $cl->Cedula; ?>" class="form-control" placeholder="Ingrese la cédula del cliente" data-validacion-tipo="requerido|min:3|max:10" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php print $cl->Nombre; ?>" class="form-control" placeholder="Ingrese nombre del cliente" data-validacion-tipo="requerido|min:3|max:10" />
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="Apellidos" value="<?php print $cl->Apellidos; ?>" class="form-control" placeholder="Ingrese apellidos del cliente" data-validacion-tipo="requerido|min:5|max:20" />
    </div>
    
    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="Direccion" value="<?php print $cl->Direccion; ?>" class="form-control" placeholder="Ingrese la dirección del cliente" data-validacion-tipo="requerido|min:5||max:20" />
    </div>
   
    <div class="form-group">
        <label>País</label>
        <?php //print_r($clPais);  ?>
        <select name="Pais" class="form-control">
            <?php foreach($clPais as $p){ ?>            
                <option <?php //print $p->id == 1 ? 'selected' : ''; ?> value="<?php print $p->Id ?>"><?php print $p->Nombre; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label>Departamento</label>
        <select name="Departamento" class="form-control">
            <?php foreach($clDpto as $d){ ?>            
                <option <?php //print $p->id == 1 ? 'selected' : ''; ?> value="<?php print $d->Id ?>"><?php print $d->Nombre; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label>Ciudad</label>
        <select name="Ciudad" class="form-control">
            <?php foreach($clCiudad as $c){ ?>            
                <option <?php //print $p->id == 1 ? 'selected' : ''; ?> value="<?php print $c->Id ?>"><?php print $c->Nombre; ?></option>
            <?php } ?>
        </select>
    </div>
        
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>