<script>
		$(document).ready(function(){

    $("select[name='inicio[]']").blur(function(){

        var hora = parseInt($(this).val());
        hora++;
				console.log(hora);
        $("input[name='fim[]'").val(hora+':00');
    });
});
</script>
<script type="text/javascript">

      $(document).ready(function() {
        var max_fields          = 10;   //max de 15 inscricoes de cada vez
        var x = 1;
        $('#add_field').click (function(e) {
      		e.preventDefault(); //prevenir novos clicks
					var element = $(".form-row").first().clone();
					$('.form-row').first().after(element);
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
