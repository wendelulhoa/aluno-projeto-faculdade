<script>
    $('#input-avatar').change(function(){
        var files = $(this)[0].files[0];

        const fileReader = new FileReader();
        fileReader.onloadend = function(){
           $('#img-modify').attr('src', fileReader.result)
        }; 
        fileReader.readAsDataURL(files)
    })
</script>