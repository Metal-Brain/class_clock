<script type="text/javascript">
	

	$(document).ready(function () {
		   $('select').select2();
		$('#formCurso').validate({
			ignore: [],
				rules: {

					codigo_curso: { required: true, minlength: 1,maxlength: 5,min: 1},
					nome_curso: { required: true, minlength: 5,maxlength: 75},
					sigla_curso: { required: true,minlength: 3,maxlength: 3},
					qtd_semestre: { required: true, number: true, min: 1, max: 20},
					modalidade_id: {required: true, min: 1}
				},
				messages: {
					codigo_curso:
                        { required: 'Campo obrigatório',
                         minlength: 'O campo codigo deve ter no mínimo 1 caracter',
                         maxlength:'O campo codigo deve ter no maximo 5 caracteres',
                         min: 'Digite um valor maior ou igual a 1'
                        },

					nome_curso:
                        { required: 'Campo obrigatório',
                         minlength: 'O campo nome deve ter no mínimo 5 caracteres',
                         maxlength:'O campo nome deve ter no maximo 75 caracteres'
                        },

					sigla_curso:
                        { required: 'Campo obrigatório',
                         minlength: 'O campo sigla deve ter no mínimo 3 caracteres',
                         maxlength: 'O campo sigla deve ter no máximo 3 caracteres'
                        },

					qtd_semestre:
                        { required: 'Campo obrigatório',
                         number: 'Digite apenas números',
                         min: 'Digite um valor maior ou igual a 1',
                         max: 'Digite um valor menor ou igual a 20'
                        },

					modalidade_id:
                        {required: 'Campo obrigatório'}
				}
			});




	});



//$("#formCurso").validate();

</script>
<script type="text/javascript">
$(document).ready(function () {

    //Transforms the listbox visually into a Select2.
    $("select").select2({
     
    });

    //Initialize the validation object which will be called on form submit.
    var validobj = $("#frm").validate({
        onkeyup: false,
        errorClass: "myErrorClass",

        //put error message behind each form element
        errorPlacement: function (error, element) {
            var elem = $(element);
            error.insertAfter(element);
        },

        //When there is an error normally you just add the class to the element.
        // But in the case of select2s you must add it to a UL to make it visible.
        // The select element, which would otherwise get the class, is hidden from
        // view.
        highlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-offscreen")) {
                $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
            } else {
                elem.addClass(errorClass);
            }
        },

        //When removing make the same adjustments as when adding
        unhighlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-offscreen")) {
                $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        }
    });

    //If the change event fires we want to see if the form validates.
    //But we don't want to check before the form has been submitted by the user
    //initially.
    $(document).on("change", ".select2-offscreen", function () {
        if (!$.isEmptyObject(validobj.submitted)) {
            validobj.form();
        }
    });

    //A select2 visually resembles a textbox and a dropdown.  A textbox when
    //unselected (or searching) and a dropdown when selecting. This code makes
    //the dropdown portion reflect an error if the textbox portion has the
    //error class. If no error then it cleans itself up.
    $(document).on("select2-opening", function (arg) {
        var elem = $(arg.target);
        if ($("#s2id_" + elem.attr("id") + " ul").hasClass("myErrorClass")) {
            //jquery checks if the class exists before adding.
            $(".select2-drop ul").addClass("myErrorClass");
        } else {
            $(".select2-drop ul").removeClass("myErrorClass");
        }
    });
});
  $(document).ready(function () {
        $('#cursoTable').DataTable();
    });
</script>
<script>
function myFunction() {
    alert("Hello! I am an alert box!");
}
</script>

<script type="text/javascript">
   	function confirmDelete(id, msg, funcao) {
			bootbox.confirm({
    		message: msg,
    		buttons: {
        	confirm: {
            label: 'Sim',
            className: 'btn-success'
        	},
        	cancel: {
            label: 'Não',
            className: 'btn-danger'
        	}
    		},
    		callback: function (result) {
        	if (result == true)
						  window.location.href = '<?= site_url("curso/") ?>' + funcao + '/' + id;
    		}
			});
		}

</script>


<script>
    function exclude(id) {
        bootbox.confirm({
            message: "Realmente deseja desativar esse curso?",
            buttons: {
                confirm: {
                    label: 'Sim',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Não',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result)
                    window.location.href = '<?= base_url('index.php/Curso/deletar/') ?>' + id
            }
        });
    }
    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja ativar esse curso?",
            buttons: {
                confirm: {
                    label: 'Sim',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Não',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result)
                    window.location.href = '<?= base_url("index.php/Curso/ativar/") ?>' + id
            }
        });
    }
</script>



</body>
</html>
