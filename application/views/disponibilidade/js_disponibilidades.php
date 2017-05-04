<script>
		$(document).ready(function(){
    $("select[name='inicio[]']").change(function(){
				next = $(this);
        var hora = parseInt($(this).val());
        hora++;
				
    });
});
</script>
<script type="text/javascript">
      $(document).ready(function() {
        var max_fields          = 10;   //max de 15 inscricoes de cada vez
        var x = 1;
        $('#add_field').click (function(e) {
      		e.preventDefault(); //prevenir novos clicks
					var element = $(".form-row").first().clone(true);
					$('.form-row').last().after(element);
        });
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
