<?php 
    if(!isset( $_SESSION))
    { session_start();}
;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
  $(function(){

    $('#effacer').click(function(){
sessionStorage.clear();
location.reload();
    
  })

    if (sessionStorage.getItem(0) >0){
    i=sessionStorage.getItem(0);
    }else {
      i=0;
    }
$('#submit').click(function(){
  let genre="";
  nom=$('#nom').val();
  prenom=$('#prenom').val();
  nn=$('#nn').val();
  tabnn = [];
  for ( j=i; j >= 0; j--) {
         tabnn.push( sessionStorage.getItem('nn'+j));
           
         }
        
         if (tabnn.indexOf(nn)>=0){
           alert('Ce numéro national éxiste déjà');
           return;
         }
        
  sessionStorage.setItem('nn'+i, nn);
  
  if (nom==""){
      alert("Entrez un nom");
      return;
  }
  else{
   sessionStorage.setItem('nom'+i, nom) 
  }
  if (prenom==""){
      alert("Entrez un prénom");
      return;
  }
  else{
    sessionStorage.setItem('pr'+i,prenom)
  }
  if (nn=="" || nn.length !=11 || isNaN(nn) ){
      alert("Entrez un numéro de registre national de 11 chiffres");
    return;
  }
  else {
     nn1=nn.split("");
     fillegars=parseInt( nn1[6]+nn1[7]+nn1[8]);
    if (fillegars%2==0){
        genre="fille";
        sessionStorage.setItem('genre'+i,genre)
    }
    else{
        genre="garçon";
        sessionStorage.setItem('genre'+i,genre)
    }
  }
        $("tbody").append("<tr><td>"+nom+"</td><td>"+prenom+"</td><td>"+nn+"</td><td>"+genre+"</td></tr>");
        i++;
  sessionStorage.setItem(0,i);
  });



  if (sessionStorage.getItem(0)>0){
    for ( k=sessionStorage.getItem(0)-1; k>=0; k--) {
      $("tbody").append("<tr><td>"+sessionStorage.getItem("nom"+k)+"</td><td>"+sessionStorage.getItem("pr"+k)+"</td><td>"+sessionStorage.getItem("nn"+k)+"</td><td>"+sessionStorage.getItem("genre"+k)+"</td></tr>");
      
    }
  }

})  

</script>
</head>
<body>

    <div class="form-group">
    <label for="formGroupExampleInput">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
    </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom">
    </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Entrez votre numéro de registre national</label>
    <input type="text" class="form-control" id="nn" type="number" name="nn" min="11" max="11" placeholder="Entrez votre numéro de registre national">
    </div>
    <button type="submit" id="submit">OK</button>
    <button id="effacer">Tout effacer ?</button>
    <table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro national</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>

