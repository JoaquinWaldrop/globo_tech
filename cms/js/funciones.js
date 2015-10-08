var HOST = "http://ve.wktapp.com/pentech-cms/index.php";


function goBack() {
    window.history.back();
}

$(document).ready(function(){

        $(".limpiar").click(function(){
            $("#NivelEducativo_instruccion").val("");
            $("#Curso_nombre").val("");
            $("#Programa_nombre").val("");
            $("#ProyectoRelevante_posicion").val("");
            $("#NivelEducativo_area").val("");
            $("#ProyectoRelevante_actividades").val("");
            $("#Experiencia_area_negocio").val("");
            $("#Certificacion_nombre").val("");
            $("#idioma").val("");
            $("#picker_timestamp1").val("");
            $("#picker_timestamp2").val("");
        });

        $(".aceptar").click(function(){
            var id = $(this).attr("id");
            var status = $("#status_usuario").val();
            window.location.assign(HOST+"?r=usuario/status&id="+id+"&status="+status);
        });

	    $(".menos").click(function(){
            var r = confirm("¿Está seguro que desea eliminar este valor?");
            if (r == true) {
                var x = $(this).attr('id');
                var y = "."+x;
                $(y).toggle(500);
                var z = '<input type="text" name="viejos[]" style="display:none" value="'+x+'"/>';
                $("#informacion").append(z);   
            }
        });

        $(".exportar").click(function(){
            var url=HOST+'?r=usuario/exportar';
            $(".Seleccionar").each(function(key,value){
                if($(this).is(':checked'))
                {
                    url += "&Ids%5B%5D="+$(this).attr('id');
                }
            });
            window.open(url,'_blank');
        });

        $(".search-form span.idiomas_button").click(function(){
            $(".search-form span.active").removeClass("active");
            $(this).addClass("active");
            if($(this).attr("id") == "es")
            {
                $("#NivelEducativo_instruccion").val("");
                $("#Curso_nombre").val("");
                $("#Programa_nombre").val("");
                $("#ProyectoRelevante_posicion").val("");
                $("#NivelEducativo_area").val("");
                $("#ProyectoRelevante_actividades").val("");
                $("#Experiencia_area_negocio").val("");
                $("#Certificacion_nombre").val("");
                $(".opt_en").css("display","none");
                $(".opt_es").css("display","block");
            }
            else if($(this).attr("id") == "en")
            {
                $("#NivelEducativo_instruccion").val("");
                $("#Curso_nombre").val("");
                $("#Programa_nombre").val("");
                $("#ProyectoRelevante_posicion").val("");
                $("#NivelEducativo_area").val("");
                $("#ProyectoRelevante_actividades").val("");
                $("#Experiencia_area_negocio").val("");
                $("#Certificacion_nombre").val("");
                $(".opt_es").css("display","none");
                $(".opt_en").css("display","block");
            }
        });
});