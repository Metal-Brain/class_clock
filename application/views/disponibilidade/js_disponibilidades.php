<script type="text/javascript">
      $(document).ready(function() {
        var max_fields          = 10;   //max de 15 inscricoes de cada vez
        var x = 1;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < max_fields) {
                        $('#listas').append(
                          "<tr class='remove' + x + '' id=" + x + ">"+
                          "<td><select class='form-control selectpicker' name='periodo[]'>"+
                          "<option>Diurno</option>"+
                          "<option>Matutino</option>"+
                          "<option>Noturno</option>"+
                          "</select></td>"+
                          "<td><select class=form-control selectpicker name='dia[]'>"+
                          "<option>Segunda</option>"+
                          "<option>Terça</option>"+
                          "<option>Quarta</option>"+
                          "<option>Quinta</option>"+
                          "<option>Sexta</option>"+
                          "<option>Sábado</option>"+
                          "</select></td>"+
                          "<td><input type='time' class='form-control' step='1800 name='inicio[]' id='inicio'></td>"+
                          "<td><input type='time' class='form-control' step='1800' name='fim[]' id='fim'></td>"+
                          "<td><a class='btn btn-small btn-danger-alt' onclick=\"retirarItem(\'listas\'," + x + ")\">X</a></td>"
                        );
                   x++;
                }
        });

        //this is not the best move, because will create overhead...
        //but is for simplicity
        //damn users
});
        </script>
        <script>
            function retirarItem(idTabela, i) {
            var row = document.getElementById(i);
            var table = row.parentNode;
            while (table && table.tagName != 'TABLE')
                table = table.parentNode;
            if (!table)
                return;
            table.deleteRow(row.rowIndex);
            totalOrc(idTabela);
        }
            </script>
</body>
</html>