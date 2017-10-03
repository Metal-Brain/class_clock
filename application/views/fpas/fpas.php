<div class="col-md-10 col-lg-10">
   <div style="padding: 0 0 15px 0">

      <div class="row">
          <div class="col-md-12">
              <h2 class="page-header"><strong>FPA</strong></h2>
          </div>
      </div>

        <div class="row">
          <div class="container">
            <div class="col-md-12">
                <h4><strong>Selecione o método desejado:</strong></h4>
            </div>

              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width:171px; height:40px;">Selecionar
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Disponibilidade</a></li>
                    <li><a href="#">Indisponibilidade</a></li>
                </ul>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-1 col-md-10">
            <div class="table-responsive">
              @loop -> turno
              <table class="table">
                <thead>
                  <tr>
                    <!-- Abaixo ainda será decidido o que vai vir. add noturno como teste -->
                    <th colspan="7" class="text-center">Noturno</th>
                  </tr>
                  <tr>
                    <th>Horarios</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sabado</th>
                  </tr>
                </thead>
                <tbody>
                  @loop -> horarios
                  <tr>
                    <td></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                  </tr>
                </tbody>
              </table>
              @endloop
            </div>
          </div>

      </div>

    </div>
</div>
