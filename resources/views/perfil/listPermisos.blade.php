<hr>
<div class="row">
  <div class="col-lg-4 col-md-6 col-xs-12">
    <section class="call-to-action featured featured-primary mb-xll" style="padding:15px">
      <ul class="list list-icons" style="list-style:none;">
        <li><label for="check1"><i class="fa fa-hand-paper-o" aria-hidden="true"></i>Administrador de Usuario.</label>      <input type="checkbox" class="check_user" name="check1" id="check1" <?php if($userId->check1=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
        <li><label for="check2"><i class="fa fa-user" aria-hidden="true"></i>               Conceder Permisos</label>       <input type="checkbox" class="check_user" name="check2" id="check2" <?php if($userId->check2=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
        <li><label for="check10"><i class="fa fa-comments" aria-hidden="true"></i>           Consultas       </label>       <input type="checkbox" class="check_user" name="check10" id="check10" <?php if($userId->check10=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
        <li><label for="check3"><i class="fa fa-pencil" aria-hidden="true"></i>          Editar Secciones de Pagina</label> <input type="checkbox" class="check_user" name="check3" id="check3" <?php if($userId->check3=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
        <li><label for="check4"><i class="fa fa-plus-circle" aria-hidden="true"></i>     Creación de Cursos</label>         <input type="checkbox" class="check_user" name="check4" id="check4" <?php if($userId->check4=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
        <li><label for="check5"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edición de Cursos</label>          <input type="checkbox" class="check_user" name="check5" id="check5" <?php if($userId->check5=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
        <li><label for="check6"><i class="fa fa-clock-o" aria-hidden="true"></i>ADMIN Horarios                              <input type="checkbox" class="check_user" name="check6" id="check6" <?php if($userId->check6=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></label>
          <ul>
            <li><label for="check7"><i class="fa fa-building" aria-hidden="true"></i>    Laboratorios</label>               <input type="checkbox" class="check_user" name="check7" id="check7" <?php if($userId->check7=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
            <li><label for="check8"><i class="fa fa-users" aria-hidden="true"></i>      Docentes</label>                    <input type="checkbox" class="check_user" name="check8" id="check8" <?php if($userId->check8=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
            <li><label for="check9"><i class="fa fa-clock-o" aria-hidden="true"></i>          Horario</label>               <input type="checkbox" class="check_user" name="check9" id="check9" <?php if($userId->check9=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></li>
          </ul>
        </li>
        <li><label for="check11"><i class="fa fa-user-plus" aria-hidden="true"></i>Suscritos                                <input type="checkbox" class="check_user" name="check11" id="check11" <?php if($userId->check11=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></label>
        <li><label for="check12"><i class="fa fa-file" aria-hidden="true"></i>Reportes                                      <input type="checkbox" class="check_user" name="check12" id="check12" <?php if($userId->check12=='1'){ ?> checked="true" <?php } ?> onclick="conceder_permiso(this)"></label>
      </ul>
    </section>
  </div>
</div>
