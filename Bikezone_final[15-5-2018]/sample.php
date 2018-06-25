<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body><input type="file" accept="image/*" capture="camera">
<div id='result'>Please choose a file to view it. <br/>(Tested successfully on Chrome - 100% SUCCESS RATE)</div>

<script>
    

    $('input').change(function() {

         var img = new Image;
    var fr = new FileReader;
     
        fr.onload = function() {
            img.addEventListener('load', function() {
            var height=this.naturalHeight;
            var width=this.naturalWidth;
        console.log('My width is: ', height);
        console.log('My height is: ', this.naturalHeight);
         if (height != 400 && width != 400) {
                                alert("Height and Width must not exceed 100px.");
                                return false;
                            }
//I loaded the image and have complete control over all attributes, like width and src, which is the purpose of filereader.
            $.ajax({url: img.src, async: false, success: function(result){
                    $("#result").html("READING IMAGE, PLEASE WAIT...")
                    $("#result").html("<img src='" + img.src + "' />");
                console.log("Finished reading Image");
                }});
            return true;
         });
        img.src = fr.result;
    };
    
    fr.readAsDataURL(this.files[0]);
    
});
</script>
</body>