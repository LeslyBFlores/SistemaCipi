require('./bootstrap');

$(document).ready(function(){
	$("select[name=categoria]").change(function(){
        let categoria = $("select[name=categoria]").val();
        let url = `/users/documents/fase/${categoria}`;
        $("select[name=proceso] option").remove();
        $("select[name=proceso]").append(`<option value=" ">Seleccione...</option>`);
        axios.get(url).then(res => {
            for (let i = 0; i < res.data.procesos.length; i++){
                $("select[name=proceso]").append(`<option value="${res.data.procesos[i].id}">${res.data.procesos[i].proceso}</option>`);
            }
        });
    });
});
