<script>
		$(document).ready(function(){
  
    $("select").blur(function(){
   
        var hora = parseInt($(this).val());
        hora++;
        $("input[name=fim[]").val(hora);
    });
});
</script>
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
						  
						  			  
				"<td><select class=form-control selectpicker name='inicio[]'>"+
							"<option value='07:00'>07:00</option>"+
							"<option value='08:00'>08:00</option>"+
							"<option value='09:00'>09:00</option>"+
							"<option value='10:00'>10:00</option>"+
							"<option value='11:00'>11:00</option>"+
							"<option value='12:00'>12:00</option>"+
							"<option value='13:00'>13:00</option>"+
							"<option value='14:00'>14:00</option>"+
							"<option value='15:00'>15:00</option>"+
							"<option value='16:00'>16:00</option>"+
							"<option value='17:00'>17:00</option>"+
							"<option value='18:00'>18:00</option>"+
							"<option value='19:00'>19:00</option>"+
							"<option value='20:00'>20:00</option>"+
							"<option value='21:00'>21:00</option>"+
							"<option value='22:00'>22:00</option>"+
							"<option value='23:00'>23:00</option>"+
							"</select></td>"+
							
                          "<td><input type='text' class='form-control' name='fim[]' id='fim' disable></td>"+
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