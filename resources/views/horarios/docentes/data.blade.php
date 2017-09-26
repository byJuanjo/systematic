<section class="call-to-action featured featured-primary mb-xll" style="padding:15px">
  <input type="hidden" name="docentes_id" id="docentes_id" value="" readoly="true">
  <table class="table table-responsive" id="tbDocentes">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>CAPACIDAD</th>
      </tr>
    </thead>
    <tbody>
      @foreach($docentes as $docente)
      <tr>
        <td>{{$docente->id}}</td>
        <td>{{$docente->nombre}}</td>
        <td>{{$docente->apellido}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
