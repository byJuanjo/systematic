<section class="call-to-action featured featured-primary mb-xll" style="padding:15px">
  <input type="hidden" name="laboratorios_id" id="laboratorios_id" value="" readoly="true">
  <table class="table table-responsive" id="tbLaboratorios">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>CAPACIDAD</th>
      </tr>
    </thead>
    <tbody>
      @foreach($laboratorios as $laboratorio)
      <tr>
        <td>{{$laboratorio->id}}</td>
        <td>{{$laboratorio->titulo}}</td>
        <td>{{$laboratorio->capacidad}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
