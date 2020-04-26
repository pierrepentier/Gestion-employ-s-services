
// nom, prenom, selection

function loadInfo(){
    $('#ptable').load("../CONTROLLER/displayTable.php", 
    {
        selection:  $('#select').val(),
        nom : $('#nom').val(),
        prenom : $('#prenom').val(),
        salmin : $('#salmin').val(),
        salmax : $('#salmax').val()
    }, 
    function(){
        $(".delete").click(function(e){
            var numero = $(this).data('noemp');
            e.preventDefault();
            $.ajax({
                url : 'remove.php?noemp=' + numero,
                success : function(data){
                    loadInfo();
                }, 
                error : function(xhr, message, status){
                    alert("Erreur !!");
                }
            })
        })
    })
}


window.onload=function() {
    loadInfo();

    $("#nom").keyup(function(e){
        nom = $(this).val();
        console.log(nom);
        loadInfo();
    });

}
