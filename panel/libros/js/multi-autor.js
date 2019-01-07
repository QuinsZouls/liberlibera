jQuery(document).ready(function($) {
    $(document).on('click', '#add-autor', function() {
        ma++;
        multi_autor(ma);
    });
    //detectamos un cambio en los valores de los values, si hay cambios volvemos a calcular el inventario
    $("#autorl").change(function() {
        obtener_copia($("#titulol").val());
        var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
        $("#inventariol").val(cp);
    });
    $("#no_librol").change(function() {
        obtener_copia($("#titulol").val());
        var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
        $("#inventariol").val(cp);
    });
    $("#no_copial").change(function() {
        obtener_copia($("#titulol").val());
        var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
        $("#inventariol").val(cp);
    });
    $("#titulol").change(function() {
        obtener_copia($("#titulol").val());
        var cp="CL-PQ5-"+$("#autorl").val()+"-"+$("#no_librol").val()+"-"+$("#no_copial").val();
        $("#inventariol").val(cp);
    });
});