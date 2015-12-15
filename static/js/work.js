$(document).ready(function(){

    $("#id_category").change(function(){
        var html = "";
        if(this.value != ""){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'search_course.php',
                data: {
                    "id": $(this).val()
                },
                success: function(data){
                    console.log("success");
                    console.log(data);
                    // for(index in data){
                    //     html += "<tr>";
                    //     html += "<td>" + data[index].codigo + data[index].codigo_turno + "</td>";
                    //     html += "<td>" + data[index].descricao + "</td>";
                    //     html += "<td>" + data[index].credito + "</td>";
                    //     html += "<td>" + data[index].carga_horaria + "</td>";
                    //     html += "<td>" + data[index].horario + "</td>";
                    //     html += "</tr>";
                    // }
                    // $("#id_resultado_matricula tbody").html(html);
                },
                error: function(error){
                    console.log("error");
                    console.log(error);
                }
            });
        }
        $("#id_resultado_curso tbody").html(html);
    });

});
