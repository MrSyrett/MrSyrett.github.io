$(document).ready(function(){
    var photos = [
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Hannah.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/JampA1.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/liam.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Family.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/hands.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Moo2.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Fountain.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Marie.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Moo1.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Cake.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/298841_10150348941130983_2064631153_n.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Corrina1.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/13164442_10153632644335983_3243613793527685741_n.jpg",
    "http://i437.photobucket.com/albums/qq99/AnMsBucket/Photography/Tats.jpg"
    ]
    
    
    
    var position = 4;
    
    $("#left").click(function(){
      if (position === 0){
        $("img.Photo").replaceWith("<img class='Photo' src='"+ photos[13] +"'>");
        position = 13;
      } else {
          $("img.Photo").replaceWith("<img class='Photo' src='"+ photos[position - 1] +"'>");
          position -= 1;
      }
    });
    
        $("#right").click(function(){
      if (position === 13){
        $("img.Photo").replaceWith("<img class='Photo' src='"+ photos[0] +"'>");
        position = 0;
      } else {
          $("img.Photo").replaceWith("<img class='Photo' src='"+ photos[position + 1] +"'>");
          position += 1;
      }
    });
})